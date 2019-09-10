<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentElementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-element-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'judgment_code') ?>

    <?= $form->field($model, 'element_code') ?>

    <?= $form->field($model, 'element_name') ?>

    <?= $form->field($model, 'element_text') ?>

    <?php // echo $form->field($model, 'weight_perc') ?>

    <?php // echo $form->field($model, 'element_word_length') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
