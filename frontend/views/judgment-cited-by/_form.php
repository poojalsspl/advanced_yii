<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentCitedBy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-cited-by-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judgment_code')->textInput() ?>

    <?= $form->field($model, 'judgment_source_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judgment_code_ref')->textInput() ?>

    <?= $form->field($model, 'judgment_source_code_ref')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judgment_title_ref')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
