<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentRefSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-ref-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'judgment_code') ?>

    <?= $form->field($model, 'doc_id') ?>

    <?= $form->field($model, 'judgment_title') ?>

    <?php // echo $form->field($model, 'judgment_code_ref') ?>

    <?php // echo $form->field($model, 'court_code') ?>

    <?php // echo $form->field($model, 'court_name') ?>

    <?php // echo $form->field($model, 'doc_id_ref') ?>

    <?php // echo $form->field($model, 'judgment_title_ref') ?>

    <?php // echo $form->field($model, 'court_code_ref') ?>

    <?php // echo $form->field($model, 'court_name_ref') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <?php // echo $form->field($model, 'exam_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
