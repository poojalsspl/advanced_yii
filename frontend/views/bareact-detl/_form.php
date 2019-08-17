<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BareactDetl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bareact-detl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_id')->textInput() ?>

    <?= $form->field($model, 'bareact_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bareact_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_group_code')->textInput() ?>

    <?= $form->field($model, 'act_group_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_catg_code')->textInput() ?>

    <?= $form->field($model, 'act_catg_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_sub_catg_code')->textInput() ?>

    <?= $form->field($model, 'act_sub_catg_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enact_date')->textInput() ?>

    <?= $form->field($model, 'act_status_mast')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_status_detl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pdoc_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pdoc_txt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sdoc_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sdoc_txt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cdoc_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chapt_no')->textInput() ?>

    <?= $form->field($model, 'chapt_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ref_doc_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'docid_ind')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
