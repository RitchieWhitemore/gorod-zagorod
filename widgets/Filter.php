<?php


namespace app\widgets;

use app\models\Property;
use app\models\TypeAdvert;
use yii\base\Widget;

class Filter extends Widget
{
    public function init()
    {

    }

    public function run()
    {
        $property = Property::find()->select(['name', 'id'])->indexBy('id')->column();

        $typeAdvert = TypeAdvert::find()->select(['name', 'id'])->indexBy('id')->column();

        return $this->render('filter', ['property' => $property, 'typeAdvert' => $typeAdvert]);
    }
}