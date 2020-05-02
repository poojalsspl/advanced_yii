<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnivMastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="univ-mast-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'univ_code') ?>

    <?= $form->field($model, 'univ_name') ?>

    <?= $form->field($model, 'city_code') ?>

    <?= $form->field($model, 'state_code') ?>

    <?= $form->field($model, 'country_code') ?>

    <?php // echo $form->field($model, 'univ_desc') ?>

    <?php // echo $form->field($model, 'univ_type') ?>

    <?php // echo $form->field($model, 'univ_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
