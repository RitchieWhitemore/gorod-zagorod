<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = Yii::t('app','NAV_CONTACT');
$this->params['breadcrumbs'][] = $this->title;
$this->params['h1'] = 'Раздел находится в разработке';
?>
<?= \app\widgets\Filter::widget()?>
<div class="container">
    <p>Раздел находится в разработке</p>
</div>
