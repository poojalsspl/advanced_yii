<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BareactCatgMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bareact-catg-mast-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'act_catg_code')->textInput() ?>

    <?= $form->field($model, 'act_catg_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_group_code')->textInput() ?>

    <?= $form->field($model, 'country_code')->textInput() ?>

    <?= $form->field($model, 'country_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
