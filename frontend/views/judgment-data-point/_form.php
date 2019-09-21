<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentDataPoint */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-data-point-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judgment_code')->textInput() ?>

    <?= $form->field($model, 'element_code')->textInput() ?>

    <?= $form->field($model, 'element_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_point')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
