<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-mast-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pan_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gst_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activation_date')->textInput() ?>

    <?= $form->field($model, 'exp_date')->textInput() ?>

    <?= $form->field($model, 'user_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profession')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_of_laywers')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'practise_area')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_pic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sign_date')->textInput() ?>

    <?= $form->field($model, 'bar_reg_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dob')->textInput() ?>

    <?= $form->field($model, 'mobile_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'landline_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'landline_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alt_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grad_yr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'practice_since')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_code')->textInput() ?>

    <?= $form->field($model, 'city_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state_code')->textInput() ?>

    <?= $form->field($model, 'state_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_code')->textInput() ?>

    <?= $form->field($model, 'country_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pin_code')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
