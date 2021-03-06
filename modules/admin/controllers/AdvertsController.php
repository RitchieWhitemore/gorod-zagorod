<?php

namespace app\modules\admin\controllers;

use app\models\Characteristic;
use app\models\CharacteristicValue;
use Yii;
use app\models\Advert;
use app\modules\admin\models\AdvertSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdvertsController implements the CRUD actions for Advert model.
 */
class AdvertsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Advert models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdvertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advert model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Advert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advert();

        $values = $this->initValues($model);

        $post = Yii::$app->request->post();

        if ($model->load($post) && $model->save() && Model::loadMultiple($values, $post)) {
            $this->processValues($values, $model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'values' => $values,
        ]);
    }

    /**
     * Updates an existing Advert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $values = $this->initValues($model);

        $post = Yii::$app->request->post();

        if ($model->load($post) && $model->save() && Model::loadMultiple($values, $post)) {
            $this->processValues($values, $model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'values' => $values,
        ]);
    }

    /**
     * Deletes an existing Advert model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Advert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advert::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    private function initValues(Advert $model)
    {
        /** @var CharacteristicValue[] $values */
        $values = $model->getCharacteristicValues()->with('advert')->indexBy('characteristic_id')->all();
        $characteristics = Characteristic::find()->indexBy('id')->all();

        $arr = array_diff_key($characteristics, $values);
        foreach ($arr as $characteristic) {
            $values[$characteristic->id] = new CharacteristicValue(['characteristic_id' => $characteristic->id]);
        }

        uasort($values, function ($a, $b) {
            return $a->characteristic->name > $b->characteristic->name;
        });

        foreach ($values as $value) {
            $value->setScenario(CharacteristicValue::SCENARIO_TABULAR);
        }

        return $values;
    }

    private function processValues($values, Advert $model)
    {
        foreach ($values as $value) {
            $value->advert_id = $model->id;
            if ($value->validate()) {
                if (!empty($value->value)) {
                    $value->save(false);
                }
                else {
                    $value->delete();
                }
            }
        }
    }
}
