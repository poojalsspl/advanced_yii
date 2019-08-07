<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CourtMastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="court-mast-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'court_code') ?>

    <?= $form->field($model, 'court_name') ?>

    <?= $form->field($model, 'court_shrt_name') ?>

    <?= $form->field($model, 'court_type') ?>

    <?= $form->field($model, 'bench_status') ?>

    <?php // echo $form->field($model, 'court_status') ?>

    <?php // echo $form->field($model, 'city_code') ?>

    <?php // echo $form->field($model, 'city_name') ?>

    <?php // echo $form->field($model, 'state_code') ?>

    <?php // echo $form->field($model, 'state_name') ?>

    <?php // echo $form->field($model, 'country_code') ?>

    <?php // echo $form->field($model, 'country_name') ?>

    <?php // echo $form->field($model, 'court_remark') ?>

    <?php // echo $form->field($model, 'court_address') ?>

    <?php // echo $form->field($model, 'bench_code') ?>

    <?php // echo $form->field($model, 'court_type_shrt_name') ?>

    <?php // echo $form->field($model, 'court_group_code') ?>

    <?php // echo $form->field($model, 'court_group_name') ?>

    <?php // echo $form->field($model, 'court_type_name') ?>

    <?php // echo $form->field($model, 'bench_name') ?>

    <?php // echo $form->field($model, 'court_flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
