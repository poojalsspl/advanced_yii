<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentAdvocateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-advocate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'judgment_code') ?>

    <?= $form->field($model, 'advocate_name') ?>

    <?= $form->field($model, 'advocate_flag') ?>

    <?php // echo $form->field($model, 'doc_id') ?>

    <?php // echo $form->field($model, 'exam_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
