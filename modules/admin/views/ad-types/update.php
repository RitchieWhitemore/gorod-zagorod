<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeAdvert */

$this->title = "Редактировать тип объявления: {$model->name}";
$this->params['breadcrumbs'][] = ['label' => 'Типы объявлений', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Редактировать');
?>
<div class="type-advert-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
