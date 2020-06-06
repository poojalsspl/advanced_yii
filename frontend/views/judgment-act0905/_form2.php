<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\BareactDetl;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-act-form">
    <?php
    if($_GET)
{
    $jcode = $_GET['jcode'];
   
    $doc_id = $_GET['doc_id'];
}
$judgment = ArrayHelper::map(JudgmentMast::find()->where(['judgment_code'=>$jcode])->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });
?>

    <?php $form = ActiveForm::begin(); ?>
 <div class="row">    
    <div class="col-md-12">
    <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    'disabled'=>true,
    'initValueText' => $jcode,     
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],

]); ?>
</div>

 <div class="col-md-4 col-xs-12">

    <?= $form->field($model, 'j_doc_id')->hiddenInput(['maxlength' => true ,'readonly'=>true,'value' => $doc_id])->label(false) ?>

    <?= $form->field($model, 'act_group_code')->textInput() ?>

    <?php /*$form->field($model, 'judgment_title')->textInput(['maxlength' => true]) */?>

    <?= $form->field($model, 'doc_id')->textInput(['maxlength' => true]) ?>

</div>
 <div class="col-md-4 col-xs-12">
 
    
    <?= $form->field($model, 'judgment_code')->hiddenInput(['readonly'=>true,'value' => $jcode])->label(false) ?>

    <?= $form->field($model, 'act_group_desc')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'act_catg_code')->textInput() ?>
</div>
  <div class="col-md-4 col-xs-12">
     <?= $form->field($model, 'act_sub_catg_code')->hiddenInput()->label(false) ?>
    
    <?= $form->field($model, 'act_catg_desc')->textInput(['maxlength' => true]) ?>

       <?= $form->field($model, 'act_sub_catg_desc')->textInput(['maxlength' => true]) ?>
</div>
 <div class="col-md-4 col-xs-12">

    <div class="my_dropdown">
        <?= $form->field($model, 'act_title[]')->textInput(['maxlength' => true]) ?>
    </div>

    <?= $form->field($model, 'country_code')->textInput() ?>

    <?= $form->field($model, 'country_shrt_name')->textInput(['maxlength' => true]) ?>
</div>
 <div class="col-md-4 col-xs-12">
    <?= $form->field($model, 'bareact_code')->textInput(['maxlength' => true]) ?>

    <?php  $bareactdtlmast  = ArrayHelper::map(BareactDetl::find()->all(), 'bareact_code', 'bareact_desc'); ?>
    

      <?= $form->field($model, 'bareact_desc')->widget(Select2::classname(), [            
            'data' => $bareactdtlmast,

            'options' => ['placeholder' => 'Select Barect', 'value' => $model->bareact_code, ],
            'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();                
              $('#judgmentact-bareact_code').val(val);

                    $.ajax({
                      url      : '/advanced_yii/judgment-act/bareact?id='+val,
                      
                      success  : function(data) {  
                        $('.judgment-act-form').html(data);
                      //console.log(data)
                                }                                             
                      });
             }"
            ]
            ]); ?>        


    <?= $form->field($model, 'court_code')->textInput() ?>
</div>
 <div class="col-md-4 col-xs-12">

    <?= $form->field($model, 'court_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'court_shrt_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bench_code')->textInput() ?>
</div>
 <div class="col-md-4 col-xs-12">

    <?= $form->field($model, 'bench_name')->textInput(['maxlength' => true]) ?>
</div>
 <div class="col-md-4 col-xs-12">
    <?= $form->field($model, 'level')->textInput(['maxlength' => true]) ?>
</div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
