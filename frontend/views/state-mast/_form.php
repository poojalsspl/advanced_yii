<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\CountryMast;

/* @var $this yii\web\View */
/* @var $model app\models\StateMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="state-mast-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $country = ArrayHelper::map(CountryMast::find()->all(), 'country_code', 'country_name'); ?>
     <?= $form->field($model, 'country_code')->dropDownList($country, ['prompt' => 'Select Country']) ?>
    

    

    <?= $form->field($model, 'state_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shrt_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zone')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'crdt')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
