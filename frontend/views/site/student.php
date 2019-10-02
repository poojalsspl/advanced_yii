<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Student */
/* @var $form ActiveForm */
?>
<div class="site-student">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'userid') ?>
        <?= $form->field($model, 'course_fees') ?>
        <?= $form->field($model, 'country_code') ?>
        <?= $form->field($model, 'enrol_no') ?>
        <?= $form->field($model, 'regs_date') ?>
        <?= $form->field($model, 'completion_date') ?>
        <?= $form->field($model, 'dob') ?>
        <?= $form->field($model, 'student_name') ?>
        <?= $form->field($model, 'college_name') ?>
        <?= $form->field($model, 'course_name') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'college_code') ?>
        <?= $form->field($model, 'city_code') ?>
        <?= $form->field($model, 'state_code') ?>
        <?= $form->field($model, 'course_code') ?>
        <?= $form->field($model, 'course_status') ?>
        <?= $form->field($model, 'gender') ?>
        <?= $form->field($model, 'mobile') ?>
        <?= $form->field($model, 'qual_desc') ?>
        <?= $form->field($model, 'photo_url') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-student -->
