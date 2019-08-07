<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BareactMastSearch */
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

    <?php // echo $form->field($model, 'act_group_desc') ?>

    <?php // echo $form->field($model, 'act_catg_code') ?>

    <?php // echo $form->field($model, 'act_catg_desc') ?>

    <?php // echo $form->field($model, 'act_status') ?>

    <?php // echo $form->field($model, 'enact_date') ?>

    <?php // echo $form->field($model, 'ref_doc_id') ?>

    <?php // echo $form->field($model, 'act_sub_catg_code') ?>

    <?php // echo $form->field($model, 'act_sub_catg_desc') ?>

    <?php // echo $form->field($model, 'tot_section') ?>

    <?php // echo $form->field($model, 'tot_chap') ?>

    <?php // echo $form->field($model, 'country_code') ?>

    <?php // echo $form->field($model, 'country_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
