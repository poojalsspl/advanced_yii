<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentCitedBySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-cited-by-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'judgment_code') ?>

    <?= $form->field($model, 'judgment_source_code') ?>

    <?= $form->field($model, 'judgment_code_ref') ?>

    <?= $form->field($model, 'judgment_source_code_ref') ?>

    <?php // echo $form->field($model, 'judgment_title_ref') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
