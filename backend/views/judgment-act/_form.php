<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentAct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-act-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'j_doc_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judgment_code')->textInput() ?>

    <?= $form->field($model, 'judgment_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_id')->textInput() ?>

    <?= $form->field($model, 'act_group_code')->textInput() ?>

    <?= $form->field($model, 'act_group_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_catg_code')->textInput() ?>

    <?= $form->field($model, 'act_catg_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_sub_catg_code')->textInput() ?>

    <?= $form->field($model, 'act_sub_catg_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_code')->textInput() ?>

    <?= $form->field($model, 'country_shrt_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bareact_code')->textInput() ?>

    <?= $form->field($model, 'bareact_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_code')->textInput() ?>

    <?= $form->field($model, 'court_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_shrt_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bench_code')->textInput() ?>

    <?= $form->field($model, 'bench_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
