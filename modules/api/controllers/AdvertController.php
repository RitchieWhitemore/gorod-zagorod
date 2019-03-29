<?php
/**
 * Created by PhpStorm.
 * User: Lexx
 * Date: 27.03.2019
 * Time: 16:33
 */

namespace app\modules\api\controllers;


use Yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

class AdvertController extends ActiveController
{
    public $modelClass = 'app\models\Advert';

    public function actions()
    {
        $actions = parent::actions();

        // отключить действия "delete" и "create"
        unset($actions['delete']);

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

        $query = $modelClass::find()->with(['images']);
        if (!empty($requestParams)) {
            $query->andWhere($requestParams);
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