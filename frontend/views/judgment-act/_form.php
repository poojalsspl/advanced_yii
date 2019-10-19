<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\BareactMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAct */
/* @var $form yii\widgets\ActiveForm */
?>

<!---code for tabs------->
<?= $this->render("/judgment-mast/view_tabs") ?>
<!---end of code for tabs------->

<!------start of form------>

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
foreach ($judgment as $key => $judgment_value) {
    $judgment_value;
}

?>

    <?php $form = ActiveForm::begin(); ?>
    <hr>
 <div class="row">  
 <div class="col-md-2 col-xs-12">
    <label>Judgment Title</label>
 </div>
  
    <div class="col-md-6 col-xs-12">

 <?= $form->field($model, 'judgment_title')->textInput(['maxlength' => true ,'readonly'=>true,'value' => $judgment_value])->label(false) ?>
</div>
<div class="col-md-4 col-xs-12">
 </div> 
</div>
<?php
/*$array = ['type' => 'A', 'options' => [1, 2]];
echo $type = ArrayHelper::getValue($array, 'type');
$data = [
    ['id' => '123', 'data' => 'abc'],
    ['id' => '345', 'data' => 'def'],
];
$ids = ArrayHelper::getColumn($data, 'id');
print_r($ids);*/
?>

 <div class="row">  
<div class="col-md-3 col-xs-12">

     <?php  $bareactmast  = ArrayHelper::map(BareactMast::find()->all(), 'bareact_code', 'bareact_desc'); ?>
    

      <?= $form->field($model, 'bareact_desc')->widget(Select2::classname(), [            
            'data' => $bareactmast,

            'options' => ['placeholder' => 'Select Barect', 'value' => $model->bareact_code, ],
            'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();                
              $('#judgmentact-bareact_code').val(val);

                    $.ajax({
                      url      : '/advanced_yii/judgment-act/bareact?id='+val,
                      
                      success  : function(data) {  
                       console.log('data',data);
                        $('.act_row').html(data);
                        //var x = $('.model_array').text();
                        //alert(x);
                        $('.test').val(x);
                        $('#judgmentact-doc_id').val(x.doc_id);
                     // console.log(data.doc_id)
                                }                                             
                      });
             }"
            ]
            ]); ?>        
    </div>
    <div class="col-md-3 col-xs-12">
        <?= $form->field($model, 'act_catg_desc')->textInput(['maxlength' => true ,'value' => ''])->label('Main Act Category') ?>
    </div>
    <div class="col-md-3 col-xs-12">
        <?= $form->field($model, 'act_sub_catg_desc')->textInput(['maxlength' => true ,'value' => ''])->label('Act SubCategory') ?>
    </div>  
    <div class="col-md-3 col-xs-12">
        <?= $form->field($model, 'act_group_desc')->textInput(['maxlength' => true ,'value' => ''])->label('Group') ?>
    </div>  
    <div class="act_row">
      
    </div>

 <div class="col-md-4 col-xs-12">

    <?= $form->field($model, 'j_doc_id')->hiddenInput(['maxlength' => true ,'readonly'=>true,'value' => $doc_id])->label(false) ?>
    <?php //echo $form->field($model, 'judgment_code')->textInput(['readonly'=>true,'value' => $jcode])->label(false) ?>
    <?= $form->field($model, 'bareact_code')->hiddenInput(['maxlength' => true])->label(false) ?>
    <?php //echo  $form->field($model, 'doc_id[]')->textInput(['maxlength' => true,'class'=>'test'])->label(false) ?>

</div>
 <div class="col-md-4 col-xs-12">
 
    
   

</div>

</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<!------end of form------>
<!------add judgment text------>
<?= $this->render("/judgment-mast/judgment_text_add") ?>
<!------judgment text------>
