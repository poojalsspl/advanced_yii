<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentCitation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-citation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judgment_code')->textInput() ?>

    <?= $form->field($model, 'journal_code')->textInput() ?>

    <?= $form->field($model, 'journal_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shrt_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judgment_date')->textInput() ?>

    <?= $form->field($model, 'citation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_volume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_pno')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
