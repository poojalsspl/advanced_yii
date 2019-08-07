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
     <?= $form->field($model, 'country_name')->dropDownList($country, ['prompt' => 'Select Country',"onchange"=>"
                                                   var code = $('#statemast-country_name').val();
                                                    $.ajax({
                                                          //type     :'GET',
                                                            url      : '/cjadmin/state-mast/country?id='+code,
                                                            dataType: 'json',
                                                            success  : function(data) {
                                                   console.log(data); 

                                                              $('#statemast-country_shrt_name').val(data.shrt_name);
                                                              $('#statemast-country_code').val(data.country_code);
                                                          }
                                                         
                                                          });"]) ?>
    <?= $form->field($model, 'country_shrt_name')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'country_code')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'state_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shrt_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zone')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'cr_date')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
