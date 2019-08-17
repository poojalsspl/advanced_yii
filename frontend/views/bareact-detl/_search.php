<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BareactDetlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bareact-detl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'level') ?>

    <?= $form->field($model, 'sno') ?>

    <?= $form->field($model, 'doc_id') ?>

    <?= $form->field($model, 'bareact_code') ?>

    <?php // echo $form->field($model, 'bareact_desc') ?>

    <?php // echo $form->field($model, 'act_group_code') ?>

    <?php // echo $form->field($model, 'act_group_desc') ?>

    <?php // echo $form->field($model, 'act_catg_code') ?>

    <?php // echo $form->field($model, 'act_catg_desc') ?>

    <?php // echo $form->field($model, 'act_sub_catg_code') ?>

    <?php // echo $form->field($model, 'act_sub_catg_desc') ?>

    <?php // echo $form->field($model, 'act_title') ?>

    <?php // echo $form->field($model, 'enact_date') ?>

    <?php // echo $form->field($model, 'act_status_mast') ?>

    <?php // echo $form->field($model, 'act_status_detl') ?>

    <?php // echo $form->field($model, 'pdoc_id') ?>

    <?php // echo $form->field($model, 'pdoc_txt') ?>

    <?php // echo $form->field($model, 'sdoc_id') ?>

    <?php // echo $form->field($model, 'sdoc_txt') ?>

    <?php // echo $form->field($model, 'cdoc_id') ?>

    <?php // echo $form->field($model, 'act_state') ?>

    <?php // echo $form->field($model, 'sec_id') ?>

    <?php // echo $form->field($model, 'chapt_no') ?>

    <?php // echo $form->field($model, 'chapt_title') ?>

    <?php // echo $form->field($model, 'sec_title') ?>

    <?php // echo $form->field($model, 'ref_doc_id') ?>

    <?php // echo $form->field($model, 'body') ?>

    <?php // echo $form->field($model, 'docid_ind') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
