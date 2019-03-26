<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TypeAdvert;
use app\models\Location;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_advert_id')->dropDownList(TypeAdvert::find()->select(['name', 'id'])->indexBy('id')->column())?>

    <?= $form->field($model, 'property_id')->textInput() ?>

    <?= $form->field($model, 'location_id')->dropDownList(Location::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'coordinates')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
