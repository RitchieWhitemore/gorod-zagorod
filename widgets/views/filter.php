<?php

use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$bundle = \app\assets\WebComponentsAsset::register($this);

$this->registerJsFile("$bundle->baseUrl/search-location/search-location.js", ['type' => 'module']);

$queryParams = Yii::$app->request->queryParams;

if (ArrayHelper::getValue($queryParams, 'AdvertSearch.type_advert_id')) {
    $typeAdvertId = ArrayHelper::getValue($queryParams, 'AdvertSearch.type_advert_id');
} else {
    $typeAdvertId = 1;
}

?>

<section id="form-search" class="form-search">
    <button type="button" id="button-toggle-filter" class="btn form-search__button-toggle">Открыть фильтр</button>
    <?php $form = ActiveForm::begin([
        'method'  => 'get',
        'action'  => ['adverts/index'],
        'options' => [
            'class' => 'container'
        ]
    ]); ?>
    <div class="form-search__property-type-wrapper">
        <?php foreach ($typeAdvert as $key => $item) : ?>
            <label class="form-search__property-type"><input type="radio" name="AdvertSearch[type_advert_id]"
                                                             value="<?= $key ?>" <?= $typeAdvertId == $key ? 'checked' : '' ?>><span></span><?= $item ?>
            </label>
        <?php endforeach; ?>
    </div>
    <div class="form-search__group form-search__city-wrapper">
        <label for="cityField">Место нахождения</label>
        <search-location>
            <input id="cityField" type="text" name="AdvertSearch[location]" placeholder="Наберите город..." class="form-search__input" autocomplete="off" value="<?=ArrayHelper::getValue($queryParams, 'AdvertSearch.location')?>">
        </search-location>
    </div>
    <div class="form-search__group form-search__property-wrapper">
        <label>Недвижимость</label>
        <select class="form-search__input" name="AdvertSearch[property_id]">
            <option value="">Выберите тип недвижимости</option>
            <?php foreach ($property as $key => $item): ?>
                <option value="<?= $key ?>" <?= ArrayHelper::getValue($queryParams, 'AdvertSearch.property_id') == $key ? 'selected' : '' ?>><?= $item ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-search__group form-search__range">
        <label>Площадь</label>
        <paper-range-slider></paper-range-slider>
        <span class="form-search__range-result">100 м2</span> - <span
                class="form-search__range-result">200 м2</span>
    </div>
    <div class="form-search__group form-search__range">
        <label>Стоимость</label>
        <paper-range-slider></paper-range-slider>
        <span class="form-search__range-result">1000 Р</span> - <span
                class="form-search__range-result">10000000 Р</span>
    </div>
    <button type="submit" class="btn form-search__button-search">Найти</button>
    <?php ActiveForm::end(); ?>
</section>