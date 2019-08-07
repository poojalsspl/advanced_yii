<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pooja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pooja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'court_code')->textInput() ?>

    <?= $form->field($model, 'judgment_date')->textInput() ?>

    <?= $form->field($model, 'jyear')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
