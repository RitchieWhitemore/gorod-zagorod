<?php

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>

<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <script src="/node_modules/@webcomponents/webcomponentsjs/webcomponents-loader.js"></script>
    <script src="/node_modules/web-animations-js/web-animations-next.min.js"></script>
    <script type="module">
        import "../../node_modules/paper-range-slider/paper-range-slider.js";
    </script>
</head>
<body>
<?php $this->beginBody() ?>
<header class="page-header">
    <div class="page-header__top-row">
        <div class="page-header__top-row-wrapper container">
            <span class="page-header__phone">+7 (800) 123-45-67</span>
            <span class="page-header__address">г. Александров, ул. Красный переулок, д. 10, офис 5</span>
        </div>
    </div>
    <div class="page-header__wrapper container">
        <div class="page-header__logo"><a href="<?= Url::home()?>" class="link page-header__logo-link"><span>агенство недвижимости</span>город <b>загород</b></a></div>
        <nav id="main-menu" class="page-header__menu main-menu">
            <button id="main-menu-button" class="main-menu__button">Меню</button>
            <ul class="main-menu__list">
                <a href="<?= Url::home()?>" class="main-menu__link">
                    <li class="main-menu__item">Главная</li>
                </a>
                <a href="<?= Url::to(['/adverts'])?>" class="main-menu__link">
                    <li class="main-menu__item">Объявления</li>
                </a>
                <a href="<?= Url::to(['/site/about'])?>" class="main-menu__link">
                    <li class="main-menu__item">О компании</li>
                </a>
                <a href="<?= Url::to(['/site/contact'])?>" class="main-menu__link">
                    <li class="main-menu__item">Контакты</li>
                </a>
            </ul>
        </nav>
    </div>
</header>
<div>
    <?php if ($this->context->id === 'site' && $this->context->action->id === 'index') : ?>
    <section class="main-heading">
        <div class="main-heading__wrapper">
            <div class="container">
                <h1 class="main-heading__title"><?= $this->params['h1']?></h1>
            </div>
        </div>
    </section>
    <?php else : ?>
        <section class="page-heading">
            <div class="page-heading__wrapper">
                <div class="container">
                    <h1 class="page-heading__title"><?= $this->params['h1']?></h1>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?= \app\widgets\Filter::widget()?>

    <?= Alert::widget() ?>
    <?= $content ?>
</div>
<footer class="page-footer">
    <div class="page-footer__wrapper container">
        <nav class="page-footer__menu footer-menu">
            <ul class="footer-menu__list">
                <li class="footer-menu__item">
                    <a href="index.html" class="footer-menu__link">
                        Главная
                    </a></li>
                <li class="footer-menu__item">
                    <a href="#" class="footer-menu__link">
                        Объявления
                    </a>
                </li>
                <li class="footer-menu__item">
                    <a href="#" class="footer-menu__link">

                        О Компании

                    </a></li>
                <li class="footer-menu__item">
                    <a href="#" class="footer-menu__link">

                        Контакты

                    </a></li>
            </ul>
        </nav>
        <div class="page-footer__row">
            <span class="page-footer__company">Агентство Недвижимости "Город Загород"</span>
            <span class="page-footer__right">©2019 Все права защищены</span>
        </div>
    </div>

</footer>
<script>
    'use strict'

    /* Меню */
    const mainMenu = document.querySelector('#main-menu');
    const mainMenuButton = document.querySelector('#main-menu-button');

    mainMenuButton.addEventListener('click', function (e) {
        mainMenu.classList.toggle('main-menu--active')
    });

    /* Фильтр */

    const buttonFilterToggle = document.querySelector('#button-toggle-filter');
    const formSearchElement = document.querySelector('#form-search');

    buttonFilterToggle.addEventListener('click', function () {
        formSearchElement.classList.toggle('form-search--open');

        if (formSearchElement.classList.contains('form-search--open')) {
            buttonFilterToggle.innerHTML = 'Закрыть фильтр';
        } else {
            buttonFilterToggle.innerHTML = 'Открыть фильтр';
        }
    });



    /* переключение вида списка объявлений */
    const viewListButton = document.querySelector('#view-list');
    const viewTableButton = document.querySelector('#view-table');
    const propertyListElement = document.querySelector('#property-list');

    if (viewListButton) {
        viewListButton.addEventListener('click', function () {
            viewListButton.classList.add('properties__view-button--list-active');
            viewTableButton.classList.remove('properties__view-button--table-active');

            propertyListElement.classList.add('properties__list--list');
        });

        viewTableButton.addEventListener('click', function () {
            viewTableButton.classList.add('properties__view-button--table-active');
            viewListButton.classList.remove('properties__view-button--list-active');

            propertyListElement.classList.remove('properties__list--list');
        });
    }

</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>