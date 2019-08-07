<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\InvcMastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invc-mast-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'invc_numb') ?>

    <?= $form->field($model, 'invc_date') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'custid') ?>

    <?= $form->field($model, 'invc_amt') ?>

    <?php // echo $form->field($model, 'GST') ?>

    <?php // echo $form->field($model, 'invc_disc') ?>

    <?php // echo $form->field($model, 'invoice_status') ?>

    <?php // echo $form->field($model, 'paid_amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
