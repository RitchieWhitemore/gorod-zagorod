<?php
/* @var $this yii\web\View */

$this->params['h1'] = 'Поиск недвижимости';

use yii\widgets\ListView; ?>
<section class="properties container">
    <header class="properties__header">
        <h2 class="properties__title">Найдено 156789 предложений по запросу:<br> <span class="properties__request">"Купить квартиру в Александрове"</span>
        </h2>
        <div class="properties__view-wrapper">
            <button id="view-list" class="properties__view-button properties__view-button--list">Список</button>
            <button id="view-table"
                    class="properties__view-button properties__view-button--table properties__view-button--table-active">
                Таблица
            </button>
        </div>
    </header>
    <div class="properties__control-wrapper">
        <div class="properties__select-wrapper">Упорядочены
            <select class="properties__select">
                <option>от новых к старым</option>
                <option>от старых к новым</option>
            </select>
        </div>
        <div class="properties__select-wrapper">Отображать по
            <select class="properties__select">
                <option>15</option>
                <option>30</option>
                <option>60</option>
                <option>100</option>
            </select>
        </div>
    </div>

    <?= ListView::widget([
        'dataProvider' => $model,
        'itemView' => '_advertItem',
        'itemOptions' => ['class' => 'module__item properties__item property-item'],
        'options' => ['id' => 'property-list', 'class' => 'properties__list'],
        'summary' => '',
    ])

    ?>
    <div class="properties__pagination pagination">
        <ul class="pagination__list">
            <li class="pagination__item pagination__item--disabled"><span>Назад</span></li>
            <li class="pagination__item pagination__item--active"><a href="#" class="link pagination__link">1</a></li>
            <li class="pagination__item"><a href="#" class="link pagination__link">2</a></li>
            <li class="pagination__item"><a href="#" class="link pagination__link">3</a></li>
            <li class="pagination__item"><a href="#" class="link pagination__link">4</a></li>
            <li class="pagination__item"><a href="#" class="link pagination__link">Вперед</a></li>
        </ul>
    </div>
</section>