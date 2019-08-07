<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentParties */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-parties-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judgment_code')->textInput() ?>

    <?= $form->field($model, 'party_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'party_flag')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
