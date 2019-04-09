<section class="module container">
    <h2 class="module__title">Новые объявления</h2>
    <div class="module__list">
        <?= \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView'     => '@app/views/adverts/_advertItem',
            'itemOptions'  => ['class' => 'module__item properties__item property-item'],
            'layout'       => "{items}",
            'options'      => ['id' => 'property-list', 'class' => 'properties__list'],
        ])?>
    </div>
</section>