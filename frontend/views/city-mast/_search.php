<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CityMastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-mast-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'city_code') ?>

    <?= $form->field($model, 'city_name') ?>

    <?= $form->field($model, 'shrt_name') ?>

    <?= $form->field($model, 'state_code') ?>

    <?= $form->field($model, 'state_name') ?>

    <?php // echo $form->field($model, 'state_shrt_name') ?>

    <?php // echo $form->field($model, 'country_code') ?>

    <?php // echo $form->field($model, 'country_name') ?>

    <?php // echo $form->field($model, 'country_shrt_name') ?>

    <?php // echo $form->field($model, 'court_stat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
