<?php


namespace app\widgets;


use app\models\Advert;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class SimilarAdverts extends Widget
{
    /**
     * @var Advert $model
     *
     */

    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $dataProvider = new ActiveDataProvider([
            'query' =>  Advert::find()->where([
                'type_advert_id' => $this->model->type_advert_id,
                'location_id' => $this->model->location_id,
                'property_id' => $this->model->property_id,
            ])->andWhere(['!=', 'id', $this->model->id])->orderBy(['id' => SORT_DESC])->limit('8'),
        ]);

        return $this->render('similar_adverts', ['dataProvider' => $dataProvider]);
    }
}