<section class="container page-property__module module">
    <h2 class="module__title">Похожие объявления</h2>
        <?= \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView'     => '@app/views/adverts/_advertItem',
            'itemOptions'  => ['class' => 'module__item properties__item property-item'],
            'layout'       => "{items}",
            'options'      => ['class' => 'module__list'],
        ])?>
</section>