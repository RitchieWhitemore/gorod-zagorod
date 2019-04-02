<?php
/**
 * @var $model \app\models\Advert;
 *
 */
?>

<a class="link" href="<?= \yii\helpers\Url::to(['adverts/view', 'id' => $model->id]) ?>">
    <div class="property-item__image-wrapper">
        <img src="<?= Yii::$app->thumbnail->url($model->mainImagePath, [
            'thumbnail' => [
                'width' => 320,
                'height' => 230,
            ],
            'placeholder' => [
                'width' => 320,
                'height' => 230
            ]
        ]);

        ?>" >
        <span class="property-item__label property-item__label--buy">Продается</span>
    </div>
    <div class="property-item__content">
        <h3 class="property-item__title"><?= $model->address ?></h3>
        <p class="property-item__category"><?= $model->property->name ?></p>
        <p class="property-item__description"><?= $model->description ?></p>
        <footer class="property-item__footer">
            <span class="property-item__area"><?= $model->area ?> м2</span>
            <span class="property-item__price"><?= $model->price ?> P</span>
        </footer>
    </div>
</a>
