<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TypeAdvert;
use app\models\Location;
use app\models\Property;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_advert_id')->dropDownList(TypeAdvert::find()->select(['name', 'id'])->indexBy('id')->column())?>

    <?= $form->field($model, 'property_id')->dropDownList(Property::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'location_id')->dropDownList(Location::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'street')->textInput() ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'house')->textInput() ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'apartment')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link_map')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList($model::getStatusesArray()) ?>

    <h2>Характеристики объявления</h2>
    <?php foreach ($values as $value): ?>
        <?= $form->field($value, '[' . $value->characteristic->id . ']value')->label($value->characteristic->name); ?>
    <?php endforeach; ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
