<?php


namespace app\widgets;


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
        $dataProvider = new ActiveDataProvider([
           'query' => Location::find(),
        ]);

        return $this->render('locations', compact('dataProvider'));
    }
}