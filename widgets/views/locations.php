<section class="category-nav">
    <h3 class="category-nav__title">Категории</h3>
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_itemLocation',
        'itemOptions'  => ['class' => 'category-nav__item', 'tag' => 'li'],
        'layout'       => "{items}",
        'options'      => ['class' => 'category-nav__list', 'tag' => 'ul'],
    ])?>
</section>