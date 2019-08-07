<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentJurisdiction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-jurisdiction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judgment_jurisdiction_id')->textInput() ?>

    <?= $form->field($model, 'judgment_jurisdiction_text')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
