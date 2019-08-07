<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CouponCodeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coupon-code-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'coupon_id') ?>

    <?= $form->field($model, 'rand_code') ?>

    <?= $form->field($model, 'gen_date') ?>

    <?= $form->field($model, 'exp_date') ?>

    <?= $form->field($model, 'use_limit') ?>

    <?php // echo $form->field($model, 'used') ?>

    <?php // echo $form->field($model, 'discount_type') ?>

    <?php // echo $form->field($model, 'discount_val') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
