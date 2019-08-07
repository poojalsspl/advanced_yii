<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CouponCode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupon-code-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rand_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gen_date')->textInput() ?>

    <?= $form->field($model, 'exp_date')->textInput() ?>

    <?= $form->field($model, 'use_limit')->textInput() ?>

    <?= $form->field($model, 'used')->textInput() ?>

    <?= $form->field($model, 'discount_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount_val')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
