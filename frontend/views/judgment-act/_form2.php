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
<div class="col-md-6 col-md-offset-3" id="all_sublist">

        
    </div>
</div>

 <div class="col-md-4 col-xs-12">

    <?= $form->field($model, 'j_doc_id')->textInput(['maxlength' => true ,'readonly'=>true,'value' => $doc_id]) ?>

    <?= $form->field($model, 'act_group_code')->textInput() ?>

    <?php /*$form->field($model, 'judgment_title')->textInput(['maxlength' => true]) */?>

    <?= $form->field($model, 'doc_id')->textInput(['maxlength' => true]) ?>
</div>
 <div class="col-md-4 col-xs-12">
 
    
    <?= $form->field($model, 'judgment_code')->textInput(['readonly'=>true,'value' => $jcode]) ?>

    <?= $form->field($model, 'act_group_desc')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'act_catg_code')->textInput() ?>
</div>
  <div class="col-md-4 col-xs-12">
    
    <?= $form->field($model, 'act_catg_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_sub_catg_code')->textInput() ?>

    <?= $form->field($model, 'act_sub_catg_desc')->textInput(['maxlength' => true]) ?>
</div>
 <div class="col-md-4 col-xs-12">

    
        <?= $form->field($model, 'act_title[]')->textInput(['maxlength' => true]) ?>
  

    <?= $form->field($model, 'country_code')->textInput() ?>

    <?= $form->field($model, 'country_shrt_name')->textInput(['maxlength' => true]) ?>
</div>
 <div class="col-md-4 col-xs-12">
    <?= $form->field($model, 'bareact_code')->textInput(['maxlength' => true]) ?>

    <?php  $bareactdtlmast  = ArrayHelper::map(BareactDetl::find()->all(), 'bareact_code', 'bareact_desc'); ?>
    
<!-- /advanced_yii/judgment-act/bareact?id -->
      <?= $form->field($model, 'bareact_desc')->widget(Select2::classname(), [            
            'data' => $bareactdtlmast,

            'options' => ['placeholder' => 'Select Barect', 'value' => $model->bareact_code, ],
            'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();                
              $('#judgmentact-bareact_code').val(val);

                    $.post('/advanced_yii/judgment-act/bareact?id='+val, {'val': val}, function(data) {
                        data = JSON.parse(data);
                $('#all_sublist').html(data);
                /*$('#list').dataTable({
            
           
          });*/
   
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
