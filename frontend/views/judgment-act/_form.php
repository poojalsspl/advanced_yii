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
    <div class="col-md-6 col-xs-12">
    <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    'disabled'=>true,
    'initValueText' => $jcode,     
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],

]); ?>
</div>
<div class="col-md-6 col-xs-12">
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

                        $('.act_row').html(data);
                        var x = $('.model_array').text();
                        alert(x);
                        $('.test').val(x);
                        $('#judgmentact-doc_id').val(x.doc_id);
                     // console.log(data.doc_id)
                                }                                             
                      });
             }"
            ]
            ]); ?>        
    </div>
    <div class="act_row">
        
    </div>

 <div class="col-md-4 col-xs-12">

    <?= $form->field($model, 'j_doc_id')->hiddenInput(['maxlength' => true ,'readonly'=>true,'value' => $doc_id])->label(false) ?>
    <?= $form->field($model, 'judgment_code')->textInput(['readonly'=>true,'value' => $jcode])->label(false) ?>
    <?= $form->field($model, 'bareact_code')->hiddenInput(['maxlength' => true])->label(false) ?>
    <?= $form->field($model, 'doc_id[]')->textInput(['maxlength' => true,'class'=>'test'])->label(false) ?>

</div>
 <div class="col-md-4 col-xs-12">
 
    
   

</div>

</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
