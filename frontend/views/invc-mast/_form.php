<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InvcMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invc-mast-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'invc_date')->textInput() ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <?= $form->field($model, 'custid')->textInput() ?>

    <?= $form->field($model, 'invc_amt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GST')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invc_disc')->textInput() ?>

    <?= $form->field($model, 'invoice_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paid_amount')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
