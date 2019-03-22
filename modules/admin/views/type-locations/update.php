<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeLocation */

$this->title = "Редактировать тип локации: {$model->name}";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Типы локации'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Редактировать');
?>
<div class="type-location-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
