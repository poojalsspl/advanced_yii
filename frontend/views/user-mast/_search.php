<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserMastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-mast-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'pan_no') ?>

    <?= $form->field($model, 'gst_no') ?>

    <?php // echo $form->field($model, 'activation_date') ?>

    <?php // echo $form->field($model, 'exp_date') ?>

    <?php // echo $form->field($model, 'user_type') ?>

    <?php // echo $form->field($model, 'company_name') ?>

    <?php // echo $form->field($model, 'profession') ?>

    <?php // echo $form->field($model, 'no_of_laywers') ?>

    <?php // echo $form->field($model, 'practise_area') ?>

    <?php // echo $form->field($model, 'user_ip') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'user_pic') ?>

    <?php // echo $form->field($model, 'sign_date') ?>

    <?php // echo $form->field($model, 'bar_reg_no') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'mobile_1') ?>

    <?php // echo $form->field($model, 'mobile_2') ?>

    <?php // echo $form->field($model, 'landline_1') ?>

    <?php // echo $form->field($model, 'landline_2') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'alt_email') ?>

    <?php // echo $form->field($model, 'grad_yr') ?>

    <?php // echo $form->field($model, 'practice_since') ?>

    <?php // echo $form->field($model, 'city_code') ?>

    <?php // echo $form->field($model, 'city_name') ?>

    <?php // echo $form->field($model, 'state_code') ?>

    <?php // echo $form->field($model, 'state_name') ?>

    <?php // echo $form->field($model, 'country_code') ?>

    <?php // echo $form->field($model, 'country_name') ?>

    <?php // echo $form->field($model, 'user_address') ?>

    <?php // echo $form->field($model, 'pin_code') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
