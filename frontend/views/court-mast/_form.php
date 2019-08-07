<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CourtMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="court-mast-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'court_code')->textInput() ?>

    <?= $form->field($model, 'court_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_shrt_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bench_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_code')->textInput() ?>

    <?= $form->field($model, 'city_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state_code')->textInput() ?>

    <?= $form->field($model, 'state_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_code')->textInput() ?>

    <?= $form->field($model, 'country_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_type_shrt_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_group_code')->textInput() ?>

    <?= $form->field($model, 'court_group_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_type_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bench_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_flag')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
