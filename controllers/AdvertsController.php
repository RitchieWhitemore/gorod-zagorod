<?php

namespace app\controllers;

use app\models\Advert;
use yii\data\ActiveDataProvider;

class AdvertsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new ActiveDataProvider([
           'query' => Advert::find(),
           'pagination' => ['pageSize' => 15],
        ]);
        return $this->render('index', ['model' => $model]);
    }

    public function actionView($id)
    {
        return $this->render('view');
    }

}
