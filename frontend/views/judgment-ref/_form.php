<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentRef */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-ref-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'judgment_code')->textInput() ?>

    <?= $form->field($model, 'doc_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judgment_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judgment_code_ref')->textInput() ?>

    <?= $form->field($model, 'court_code')->textInput() ?>

    <?= $form->field($model, 'court_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_id_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judgment_title_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_code_ref')->textInput() ?>

    <?= $form->field($model, 'court_name_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flag')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
