<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\BareactCatgMast;
use frontend\models\BareactSubcatgMast;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model frontend\models\BareactMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bareact-mast-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
    <?= $form->field($model, 'bareact_desc')->textInput(['readonly' => true]) ?>
        </div>
        <div class="col-md-4">
    <?= $form->field($model, 'act_group_desc')->textInput(['readonly' => true]) ?>  
        </div>
        <div class="col-md-4">
            <?php $catg = ArrayHelper::map(BareactCatgMast::find()->all(),'act_catg_code','act_catg_desc')?>
    <?= $form->field($model, 'act_catg_desc')->widget(Select2::classname(), [
            'data' => $catg,           
            'options' => ['placeholder' => 'Select Bareact Category','value' => ($model->act_catg_code != "") ? $model->act_catg_code : ''],
      'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();                
              $('#bareactmast-act_catg_code').val(val);
                    $.ajax({
                      url      : '/advanced_yii/bareact-mast/bsubcatg?id='+val,
                      dataType : 'json',
                      success  : function(data) {                                 
                       $('#bareactmast-act_sub_catg_desc').empty();    
                       $('#bareactmast-act_sub_catg_desc').append('<option> </option>');
                        $.each(data, function(i, item){
                        $('#bareactmast-act_sub_catg_desc').append('<option value='+item.act_sub_catg_code+'>'+item.act_sub_catg_desc+'</option>');
                      });
                          },
                      error: function(xhr, textStatus, errorThrown){
                           alert('No Sub Category found');
                        }                                                         
                      });
             }"
            ]

             ]); ?>
       </div>
       <div class="col-md-4">
             <?php 
      $act_sub_catg_desc = ($model->act_sub_catg_code != "") ?  ArrayHelper::map(BareactSubcatgMast::find()->where(["act_sub_catg_code"=>$model->act_sub_catg_code])->all(), 'act_sub_catg_code', 'act_sub_catg_desc') : "" ; ?>
    
      <?= $form->field($model, 'act_sub_catg_desc')->dropDownList([
        'data' => $act_sub_catg_desc,
        //'prompt' => 'Select sub category'
        ]);?>
    
       </div>    

    <?php $form->field($model, 'act_catg_code')->textInput() ?>
    <?php $form->field($model, 'act_sub_catg_code')->textInput() ?>
    <?php $form->field($model, 'act_group_code')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
