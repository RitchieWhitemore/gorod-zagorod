<?php
/**
 *
 * @var $this yii\web\View
 * @var $model \app\models\Advert
 */

$bundle = \app\assets\WebComponentsAsset::register($this);

$this->registerJsFile("$bundle->baseUrl/image-gallery/image-gallery.js", ['type' => 'module']);

$this->params['h1'] = $model->fullAddress;
$this->title = 'Объявление: ' . $model->fullAddress;
?>

<?= \app\widgets\Filter::widget() ?>
<section class="page-property container">
    <div class="page-property__content-wrapper">
        <div class="page-property__content">
            <image-gallery owner-id="<?=$model->id?>" thumbnails-url="<?= Yii::$app->thumbnail->url($model->mainImagePath, [
                'thumbnail'   => [
                    'width'  => 855,
                    'height' => 570,
                ],
                'placeholder' => [
                    'width'  => 855,
                    'height' => 570
                ]
            ]) ?>" type-advert="<?= $model->typeAdvert->name_type_offer ?>">

            </image-gallery>

            <h2 class="page-property__title"><?= $model->property->name ?>, <?= $model->area ?> м<sup>2</sup></h2>
            <div class="page-property__row">
                <p class="page-property__address"><?= $model->fullAddress ?></p>
                <span class="page-property__price"><?= $model->price ?> Р</span>
            </div>

            <?php
            $characteristics = $model->getCharacteristicValues()->all();
            ?>

            <table class="page-property__table">
                <thead>
                <tr>
                    <?php foreach ($characteristics as $characteristic) : ?>

                        <th>
                            <?=$characteristic->characteristic->name?>
                        </th>

                    <?php endforeach; ?>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php foreach ($characteristics as $characteristic) : ?>

                        <td>
                            <?=$characteristic->value?>
                        </td>

                    <?php endforeach; ?>
                </tr>
                </tbody>
            </table>
            <p class="page-property__description"><?= $model->description ?></p>
        </div>

        <div class="page-property__map">
            <iframe src="<?= $model->linkMapForWidget ?>" frameborder="0"
                    allowfullscreen="true"></iframe>
        </div>
        <div class="page-property__content">
            <p>Позвонить нам <a href="" class="link page-property__link">+7 (456) 456-78-89</a></p>
        </div>

    </div>
    <?= \app\widgets\SimilarAdverts::widget([
        'model' => $model,
    ]) ?>
    <aside class="page-property__aside">
        <?= \app\widgets\Locations::widget() ?>
    </aside>
</section>