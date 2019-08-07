<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JsubCatgMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jsub-catg-mast-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jcatg_id')->textInput() ?>

    <?= $form->field($model, 'jsub_catg_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
