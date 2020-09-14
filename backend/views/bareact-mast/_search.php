<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BareactMastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bareact-mast-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'doc_id') ?>

    <?= $form->field($model, 'bareact_code') ?>

    <?= $form->field($model, 'bareact_desc') ?>

    <?= $form->field($model, 'act_group_code') ?>

    <?php // echo $form->field($model, 'bareact_catg_name') ?>

    <?php // echo $form->field($model, 'tot_section') ?>

    <?php // echo $form->field($model, 'tot_chap') ?>

    <?php // echo $form->field($model, 'Enactment_date') ?>

    <?php // echo $form->field($model, 'bareact_text') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
