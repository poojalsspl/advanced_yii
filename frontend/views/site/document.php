<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Documents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-form">
	<h2>Please Upload the relevant document to complete the profile.</h2>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    

                   <?= $form->field($model, 'doc_tenth')->fileInput()->label('10th Marksheet') ?>

                    <?= $form->field($model, 'doc_twelve')->fileInput()->label('12th Marksheet') ?>

                    <?= $form->field($model, 'doc_id_proof')->fileInput()->label('Any of ID poof like Aadhar Card/Voter Card/Driving Licence') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>