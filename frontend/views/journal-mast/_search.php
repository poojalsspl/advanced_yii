<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JournalMastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-mast-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'journal_code') ?>

    <?= $form->field($model, 'journal_name') ?>

    <?= $form->field($model, 'shrt_name') ?>

    <?= $form->field($model, 'pub_freq') ?>

    <?= $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'court_code') ?>

    <?php // echo $form->field($model, 'court_name') ?>

    <?php // echo $form->field($model, 'city_code') ?>

    <?php // echo $form->field($model, 'state_code') ?>

    <?php // echo $form->field($model, 'country_code') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
