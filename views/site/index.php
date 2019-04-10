<?php

/* @var $this yii\web\View */

$this->title = 'Агенство недвижимости Город-Загород';
$this->params['h1'] = 'Найдем ваш новый дом из тысячи и продадим старый';
?>
<?= \app\widgets\Filter::widget()?>
<?= \app\widgets\LatestAdverts::widget()?>
<section class="module contact">
    <h2 class="module__title">Контакты</h2>
    <div class="contact__map">
        <iframe src="https://yandex.ru/map-widget/v1/-/CCUTF8ZY" class="contact__iframe" frameborder="0"
                allowfullscreen="true"></iframe>
        <div class="contact__info-wrapper">
            <div class="contact__info">
                <p class="contact__address">Владимирская область, г. Александров, ул. Красный переулок, д. 10А</p>
                <p class="contact__email">info@gorod-zagorod.ru</p>
                <a href="tel:+77891234578" class="link contact__phone">+7 (789) 123-45-78</a>
            </div>
        </div>
    </div>

</section>