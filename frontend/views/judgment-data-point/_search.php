<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentDataPointSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-data-point-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'doc_id') ?>

    <?= $form->field($model, 'element_code') ?>

    <?= $form->field($model, 'element_name') ?>

    <?= $form->field($model, 'data_point') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
