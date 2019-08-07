<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JournalMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-mast-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'journal_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shrt_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pub_freq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_code')->textInput() ?>

    <?= $form->field($model, 'court_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_code')->textInput() ?>

    <?= $form->field($model, 'state_code')->textInput() ?>

    <?= $form->field($model, 'country_code')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
