<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JcatgMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jcatg-mast-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jcatg_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jcatg_id1')->textInput() ?>

    <?= $form->field($model, 'jcatg_description1')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
