<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Characteristic */

$this->title = 'Создать характеристику';
$this->params['breadcrumbs'][] = ['label' => 'Характеристики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characteristic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
