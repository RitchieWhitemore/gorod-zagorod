<?php


namespace app\modules\api\controllers;


use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class LocationController extends ActiveController
{
    public $modelClass = 'app\models\Location';

    public function actions()
    {
        $actions = parent::actions();

        // отключить действия "delete" и "create"
        unset($actions['delete'], $actions['create']);

        // настроить подготовку провайдера данных с помощью метода "prepareDataProvider()"
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        $requestParams = Yii::$app->getRequest()->getBodyParams();
        if (empty($requestParams)) {
            $requestParams = Yii::$app->getRequest()->getQueryParams();
        }

        if (isset($requestParams['expand'])) {
            unset($requestParams['expand']);
        }

        /* @var $modelClass \yii\db\BaseActiveRecord */
        $modelClass = new $this->modelClass;

        $query = $modelClass::find();

        if (!empty($requestParams['name'])) {
            $query->andWhere(['like', 'name', $requestParams['name']]);
        }

        return Yii::createObject([
            'class' => ActiveDataProvider::className(),
            'query' => $query,
            'pagination' => [
                'params' => $requestParams,
            ],
            'sort' => [
                'params' => $requestParams,
            ],
        ]);
    }
}