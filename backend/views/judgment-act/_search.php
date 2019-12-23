<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentActSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-act-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'j_doc_id') ?>

    <?= $form->field($model, 'judgment_code') ?>

    <?= $form->field($model, 'judgment_title') ?>

    <?php // echo $form->field($model, 'doc_id') ?>

    <?php // echo $form->field($model, 'act_group_code') ?>

    <?php // echo $form->field($model, 'act_group_desc') ?>

    <?php // echo $form->field($model, 'act_catg_code') ?>

    <?php // echo $form->field($model, 'act_catg_desc') ?>

    <?php // echo $form->field($model, 'act_sub_catg_code') ?>

    <?php // echo $form->field($model, 'act_sub_catg_desc') ?>

    <?php // echo $form->field($model, 'act_title') ?>

    <?php // echo $form->field($model, 'country_code') ?>

    <?php // echo $form->field($model, 'country_shrt_name') ?>

    <?php // echo $form->field($model, 'bareact_code') ?>

    <?php // echo $form->field($model, 'bareact_desc') ?>

    <?php // echo $form->field($model, 'court_code') ?>

    <?php // echo $form->field($model, 'court_name') ?>

    <?php // echo $form->field($model, 'court_shrt_name') ?>

    <?php // echo $form->field($model, 'bench_code') ?>

    <?php // echo $form->field($model, 'bench_name') ?>

    <?php // echo $form->field($model, 'level') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
