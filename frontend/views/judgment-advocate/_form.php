<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAdvocate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-advocate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judgment_code')->textInput() ?>

    <?= $form->field($model, 'advocate_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'advocate_flag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
