<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentOverrules */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-overrules-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judgment_code')->textInput() ?>

    <?= $form->field($model, 'over_rules_code')->textInput() ?>

    <?= $form->field($model, 'over_rules_title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
