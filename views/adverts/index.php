<?php

use yii\widgets\ListView;

$bundle = \app\assets\WebComponentsAsset::register($this);

$this->registerJsFile("$bundle->baseUrl/selection-dropdown-list/selection-dropdown-list.js", ['type' => 'module']);

$request = Yii::$app->request;

/* @var $this yii\web\View */

$this->params['h1'] = 'Поиск недвижимости';

?>
<?= \app\widgets\Filter::widget()?>
<section class="properties container">
    <header class="properties__header">
        <?php if ($requestString == '') : ?>
            <h2 class="properties__title">Найдено <?= count($model->getTotalCount()) ?> предложений.
            </h2>
        <?php else : ?>
            <h2 class="properties__title">Найдено <?= count($model->getTotalCount()) ?> предложений по запросу:<br>
                <span class="properties__request">"<?= $requestString ?>"</span>
            </h2>
        <?php endif; ?>
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
            <selection-dropdown-list type="sort">
                <select class="properties__select">
                    <option data-sort="desc" <?= $request->get('sort') == 'desc' ? 'selected' : '' ?>>от старых к новым</option>
                    <option data-sort="asc" <?= $request->get('sort') == 'asc' ? 'selected' : '' ?>>от новых к старым</option>
                </select>
            </selection-dropdown-list>
        </div>
        <div class="properties__select-wrapper">Отображать по
            <selection-dropdown-list>
                <select class="properties__select">
                    <option <?= $request->get('page-size') == 15 ? 'selected' : '' ?>>15</option>
                    <option <?= $request->get('page-size') == 30 ? 'selected' : '' ?>>30</option>
                    <option <?= $request->get('page-size') == 60 ? 'selected' : '' ?>>60</option>
                    <option <?= $request->get('page-size') == 100 ? 'selected' : '' ?>>100</option>
                </select>
            </selection-dropdown-list>
        </div>
    </div>

    <?= ListView::widget([
        'dataProvider' => $model,
        'itemView'     => '_advertItem',
        'itemOptions'  => ['class' => 'module__item properties__item property-item'],
        'layout'       => "{items}\n{pager}",
        'options'      => ['id' => 'property-list', 'class' => 'properties__list'],
        'pager'        => [
            'activePageCssClass'   => 'pagination__item--active',
            'disabledPageCssClass' => 'pagination__item--disabled',
            'linkContainerOptions' => ['class' => 'pagination__item'],
            'linkOptions'          => ['class' => 'link pagination__link'],
            'nextPageLabel'        => 'Вперед',
            'prevPageLabel'        => 'Назад',
            'options'              => [
                'class' => 'properties__pagination pagination__list'
            ]
        ],
    ])

    ?>
</section>