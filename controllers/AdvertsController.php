<?php

namespace app\controllers;

use app\models\Advert;
use Yii;
use yii\data\ActiveDataProvider;

class AdvertsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;

        $query =  Advert::find();

        if ($request->get('property')) {
            $query->andWhere(['property_id' => $request->get('property')]);
        }

        if ($request->get('type-advert')) {
            $query->andWhere(['type_advert_id' => $request->get('type-advert')]);
        }

        $model = new ActiveDataProvider([
           'query' => $query,
           'pagination' => ['pageSize' => 15],
           'sort' => [
               'defaultOrder' => [
                   'id' => SORT_DESC,
               ]
           ]
        ]);
        return $this->render('index', ['model' => $model]);
    }

    public function actionView($id)
    {
        return $this->render('view');
    }

}
