<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\StateMastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="state-mast-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'state_code') ?>

    <?= $form->field($model, 'state_name') ?>

    <?= $form->field($model, 'shrt_name') ?>

    <?= $form->field($model, 'zone') ?>

    <?= $form->field($model, 'country_code') ?>

    <?php // echo $form->field($model, 'country_name') ?>

    <?php // echo $form->field($model, 'country_shrt_name') ?>

    <?php // echo $form->field($model, 'cr_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
