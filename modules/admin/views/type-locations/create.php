<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeLocation */

$this->title = 'Создать тип локации';
$this->params['breadcrumbs'][] = ['label' => 'Типы локации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-location-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
