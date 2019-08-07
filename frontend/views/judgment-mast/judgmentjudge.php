<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\JudgmentMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\judgmentjudge */
/* @var $form yii\widgets\ActiveForm */

$judgment = ArrayHelper::map(JudgmentMast::find()->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });



?>





<div class="judgment-judge-form">


<div class="box box-danger col-md-12">
        <?php $form = ActiveForm::begin(['action' =>['judgment-mast/judgmentjudge']]); ?>

   
            <div class="box-header with-border">
              <h3 class="box-title">Advocate</h3>
            </div>

  <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code'],

]); ?>
    <div class="dynamic-rows rows col-xs-12">   
      <div class="dynamic-rows-field row">
    
        <div class="col-xs-6">
                <?= $form->field($model, (!$model->isNewRecord) ? 'judge_name' : 'judge_name[]' )->textInput(['maxlength' => true,
                'class'=>'judgmentjudge-judge_name form-control']) ?> 
        </div>
        <div class="col-xs-2">
            
        </div>
       
     </div>
    </div>
    <div class="row form-group">
    <div class="col-xs-4">
        <?= Html::button($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>

    </div>
    <?php if($model->isNewRecord) { ?>
    <div class="col-xs-8">
    <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
    <?= Html::button('Delete row', ['name' => 'Delete', 'value' => 'true', 'class' => 'btn btn-danger deleted-row']) ?>
    <?= Html::button('Generate Data', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info generate-row']) ?>
    </div>
     <?php } ?>
    </div>
    <?php ActiveForm::end(); ?>
    </div>

</div>
<?php 
if($model->isNewRecord){
    $customScript = <<< SCRIPT
    $('.addr-row').on('click',function(){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-6"><div class="col-xs-6"><div class="form-group field-judgmentjudge-judge_name has-success"><label class="control-label" for="judgmentjudge-judge_name">Judge Name</label><input type="text" id="judgmentjudge-judge_name" class="form-control judgmentjudge-judge_name" name="judgmentjudge[judge_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
        console.log('test');
        $('.dynamic-rows-field').last().remove();
    });
    $('#submit-button').on("click",function(){
        console.log('test');
    $('.judgmentjudge-judge_name').each(function(){   
        if($(this).val()=='')
        {
            alert('Judge Name Can not be Empty');
            $(this).focus();
            return false;   
        }
        
    });     
     $('#submit-button').attr('type','submit');
 });


SCRIPT;
}
else{
        $customScript = <<< SCRIPT
    $('.addr-row').on('click',function(){
        $('.judgmentjudge-judge_name').attr('name','judgmentjudge[judge_name][]')
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-6"><div class="col-xs-6"><div class="form-group field-judgmentjudge-judge_name has-success"><label class="control-label" for="judgmentjudge-judge_name">Judge Name</label><input type="text" id="judgmentjudge-judge_name" class="form-control judgmentjudge-judge_name" name="judgmentjudge[judge_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
        console.log('test');
        $('.dynamic-rows-field').last().remove();
    });
    $('#submit-button').on("click",function(){
        console.log('test');
    $('.judgmentjudge-judge_name').each(function(){
        if($(this).val()=='')
        {
            alert('Judge Name Can not be Empty');
            $(this).focus();
            return false;   
        }
        
    });     
     $('#submit-button').attr('type','submit');
 });


SCRIPT;


}
    $this->registerJs($customScript, \yii\web\View::POS_READY);
 ?>
<?php 
$customScript = <<< SCRIPT
$('.generate-row').on('click', function(){
 var judge =  $('#judgmentjudge-judgment_code').val();
 console.log(judge);
 if(judge=='')
 {
    alert('Please Select Judgement code');
 }
 else
$.ajax({
//type     :'GET',
url        : '/cjadmin/judgment-judge/judge?id='+judge,
dataType   : 'json',
success    : function(data){
        console.log(data);
        $('.dynamic-rows div').html('');    

         var res = (data.judges_name).split(";");
         console.log(res.length);
         for(i=0;i<res.length;i++){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-6"><div class="form-group field-judgmentjudge-judge_name has-success"><label class="control-label" for="judgmentjudge-judge_name">Judge Name</label><input type="text" id="judgmentjudge-judge_name" class="form-control judgmentjudge-judge_name" name="judgmentjudge[judge_name][]" maxlength="50" aria-invalid="false" value="'+res[i]+'"><div class="help-block"></div></div></div></div></div>');
            }
    },
        error: function(xhr, textStatus, errorThrown){
        //alert('No states for this contry');
    }                                                         
    });
//console.log(advocate);
}); 
SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);

?>


