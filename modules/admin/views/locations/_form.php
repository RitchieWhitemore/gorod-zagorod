<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TypeLocation;

/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'type_location_id')->dropDownList(TypeLocation::find()->select(['name', 'id'])->indexBy('id')->column()) ?>
        </div>
        <div class="col-sm-8">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
