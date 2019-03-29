<?php

use app\components\grid\SetColumn;
use app\models\Advert;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Location;
use app\models\Property;
use app\models\TypeAdvert;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объявления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advert-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать объявление', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'type_advert_id',
                'content' => function ($data) {
                    return $data->typeAdvert->name;
                },
                'filter' => TypeAdvert::find()->select(['name', 'id'])->indexBy('id')->column()
            ],
            [
                'attribute' => 'property_id',
                'content' => function ($data) {
                    return $data->property->name;
                },
                'filter' => Property::find()->select(['name', 'id'])->indexBy('id')->column()
            ],
            [
                'attribute' => 'location_id',
                'content' => function ($data) {
                    return $data->location->name;
                },
                'filter' => Location::find()->select(['name', 'id'])->indexBy('id')->column()
            ],
            'address',
            'price',
            [
                'class' => SetColumn::className(),
                'filter' => Advert::getStatusesArray(),
                'attribute' => 'status',
                'name' => 'statusName',
                'cssCLasses' => [
                    Advert::STATUS_ACTIVE => 'success',
                    Advert::STATUS_INACTIVE => 'warning',
                ],
            ],
            //'description:ntext',
            //'coordinates',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
