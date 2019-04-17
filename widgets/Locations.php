<?php


namespace app\widgets;


use app\models\Advert;
use app\models\Location;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class Locations extends Widget
{
    public function init()
    {

    }

    public function run()
    {
        $advert = Advert::find()->select('location_id')->distinct('location_id')->asArray()->column();

        $dataProvider = new ActiveDataProvider([
           'query' => Location::find()->where(['IN', 'id', $advert]),
        ]);

        return $this->render('locations', compact('dataProvider'));
    }
}