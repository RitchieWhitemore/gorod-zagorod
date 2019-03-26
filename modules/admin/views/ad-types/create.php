<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeAdvert */

$this->title = 'Создать тип объявления';
$this->params['breadcrumbs'][] = ['label' => 'Типы объявлений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-advert-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
