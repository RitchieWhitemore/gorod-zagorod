<?php


namespace app\widgets;

use app\models\Advert;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class LatestAdverts extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {

        $dataProvider = new ActiveDataProvider([
           'query' =>  Advert::find()->active()->orderBy(['id' => SORT_DESC])->limit('8'),
        ]);

        return $this->render('latest_adverts', ['dataProvider' => $dataProvider]);
    }
}