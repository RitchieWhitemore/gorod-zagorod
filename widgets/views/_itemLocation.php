<?php
/**
 *
 * @var \app\models\Location $model
 *
 */
?>

<a href="<?= \yii\helpers\Url::to(['/adverts', 'AdvertSearch[location]' => $model->name])?>" class="link category-nav__link">
    <span class="category-nav__name"><?= $model->name ?></span>
    <span class="category-nav__qty">(<?= $model->getAdverts()->active()->count()?>)</span>
</a>
