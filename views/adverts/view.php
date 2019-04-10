<?php
/**
 *
 * @var $this yii\web\View
 * @var $model \app\models\Advert
 */

$this->params['h1'] = $model->fullAddress;
$this->title = 'Объявление: ' .  $model->fullAddress;
?>

<?= \app\widgets\Filter::widget()?>
<section class="page-property container">
    <div class="page-property__content-wrapper">
        <div class="page-property__content">
            <div class="page-property__image-gallery image-gallery">
                <div class="image-gallery__main-image">
                    <img src="<?= Yii::$app->thumbnail->url($model->mainImagePath, [
                        'thumbnail' => [
                            'width' => 855,
                            'height' => 570,
                        ],
                        'placeholder' => [
                            'width' => 855,
                            'height' => 570
                        ]
                    ])?>" >
                    <span class="image-gallery__label image-gallery__label--buy"><?= $model->typeAdvert->name_type_offer ?></span>
                    <div class="image-gallery__control">
                        <button type="button" class="image-gallery__button image-gallery__button--prev"></button>
                        <button type="button" class="image-gallery__button image-gallery__button--next"></button>
                    </div>
                </div>
                <ul class="image-gallery__list">
                    <li class="image-gallery__item image-gallery__item--active"><img src="images/property1.jpg"></li>
                    <li class="image-gallery__item"><img src="images/property2.jpg"></li>
                    <li class="image-gallery__item"><img src="images/property3.jpg"></li>
                    <li class="image-gallery__item"><img src="images/property1.jpg"></li>
                    <li class="image-gallery__item"><img src="images/property2.jpg"></li>
                    <li class="image-gallery__item"><img src="images/property3.jpg"></li>
                </ul>
            </div>
            <h2 class="page-property__title"><?= $model->property->name?>, <?= $model->area ?> м2</h2>
            <div class="page-property__row">
                <p class="page-property__address"><?= $model->fullAddress?></p>
                <span class="page-property__price"><?= $model->price?> Р</span>
            </div>

            <table class="page-property__table">
                <thead>
                <tr>
                    <th>
                        Общая
                    </th>
                    <th>
                        Жилая
                    </th>
                    <th>
                        Кухня
                    </th>
                    <th>
                        Этаж
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        99 м2
                    </td>
                    <td>
                        52 м2
                    </td>
                    <td>
                        15 м2
                    </td>
                    <td>
                        5 из 6
                    </td>
                </tr>
                </tbody>
            </table>
            <p class="page-property__description"><?= $model->description ?></p>
        </div>

        <div class="page-property__map">
            <iframe src="<?= $model->linkMapForWidget?>" frameborder="0"
                    allowfullscreen="true"></iframe>
        </div>
        <div class="page-property__content">
            <p>Позвонить нам <a href="" class="link page-property__link">+7 (456) 456-78-89</a></p>
        </div>

    </div>
    <?= \app\widgets\SimilarAdverts::widget([
            'model' => $model,
    ])?>
    <aside class="page-property__aside">
        <?= \app\widgets\Locations::widget() ?>
    </aside>
</section>