<?php


namespace app\widgets;

use app\models\Advert;
use app\models\CharacteristicValue;
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
        $property = Property::find()->select(['name', 'id'])->orderBy('name')->indexBy('id')->column();

        $typeAdvert = TypeAdvert::find()->select(['name', 'id'])->indexBy('id')->column();

        $area = [];
        $area['min'] = CharacteristicValue::find()->where(['characteristic_id' => 1])->orderBy(['value' => SORT_ASC])->limit(1)->one();
        $area['max'] = CharacteristicValue::find()->where(['characteristic_id' => 1])->orderBy(['value' => SORT_DESC])->limit(1)->one();

        $price = [];
        $price['min'] = Advert::find()->orderBy(['price' => SORT_ASC])->limit(1)->one();
        $price['max'] = Advert::find()->orderBy(['price' => SORT_DESC])->limit(1)->one();

        return $this->render('filter', ['property' => $property, 'typeAdvert' => $typeAdvert, 'area' => $area, 'price' => $price]);
    }
}