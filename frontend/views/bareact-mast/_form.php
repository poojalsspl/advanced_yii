<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BareactMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bareact-mast-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'doc_id')->textInput() ?>

    <?= $form->field($model, 'bareact_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bareact_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_group_code')->textInput() ?>

    <?= $form->field($model, 'act_group_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_catg_code')->textInput() ?>

    <?= $form->field($model, 'act_catg_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enact_date')->textInput() ?>

    <?= $form->field($model, 'ref_doc_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_sub_catg_code')->textInput() ?>

    <?= $form->field($model, 'act_sub_catg_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tot_section')->textInput() ?>

    <?= $form->field($model, 'tot_chap')->textInput() ?>

    <?= $form->field($model, 'country_code')->textInput() ?>

    <?= $form->field($model, 'country_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
