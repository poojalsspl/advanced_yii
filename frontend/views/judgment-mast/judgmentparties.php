<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\JudgmentMast;
use backend\models\JudgmentParties;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentParties */
/* @var $form yii\widgets\ActiveForm */
$judgmentAdvocate = JudgmentParties::find()->select('judgment_code')->groupBy('judgment_code')->all();
$j_code[] = "";
foreach ($judgmentAdvocate as $code) {
    $j_code[]= $code->judgment_code; 
}


$judgment = ArrayHelper::map(JudgmentMast::find()->where(['not in','judgment_code',$j_code])
    ->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });
?>

<div class="judgment-parties-form">


<div class="box box-danger col-md-12">
 <?php if($model->isNewRecord) { ?>

        <?php $form = ActiveForm::begin(['action' =>['judgment-mast/judgmentparties']]); ?>

   
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
    
        <div class="col-xs-4">  
            <?= $form->field($model, (!$model->isNewRecord) ? 'party_flag' : 'party_flag[]')->dropDownList(["1"=>"Appellant","2"=>"Respondent","3"=>"intervener"]) ?>
        </div>
        <div class="col-xs-6">
                <?= $form->field($model, (!$model->isNewRecord) ? 'party_name' : 'party_name[]' )->textInput(['maxlength' => true,
                'class'=>'judgmentparties-party_name form-control']) ?> 
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
      <?php } ?>

       <?php  if(!$model->isNewRecord) {  ?>

        <?php $form = ActiveForm::begin(); ?>
            <div class="box-header with-border">
              <h3 class="box-title">Advocate</h3>
            </div>
    <?= $form->field($model, 'judgment_code')->hiddenInput(); ?>
    <?php $parties = JudgmentParties::find()->where(['judgment_code'=>$model->judgment_code])->all(); ?>
    <div class="dynamic-rows rows col-xs-12">

    <?php foreach ($parties as $adv) {

            $flag = ($adv->party_flag == '1' ? 'selected' : $adv->party_flag == '2'  ? 'selected' : '' );  ?>
            <div class="dynamic-rows-field row" data-id="<?= $adv->judgment_party_id ?>"><div class="col-xs-4"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag">Party Flag</label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1" <?= ($adv->party_flag == '1' ? 'slected' : '') ?>>Appellant</option><option value="2" <?= ($adv->party_flag == '2' ? 'slected' : '') ?>>Respondent</option><option value="3" <?= ($adv->party_flag == '3' ? 'slected' : '') ?>>intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name">Party Name</label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false" value="<?= $adv->party_name ?>"><div class="help-block"></div></div>
            <input type="hidden" name="JudgmentParties[judgment_party_id][]" value="<?= $adv->judgment_party_id ?>"></div></div>   
     <?php } ?>
     </div>
    </div>
    <div class="row form-group">
    <div class="col-xs-4">
        <?= Html::button($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>
    </div>
    <div class="col-xs-8">
        <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
        <?= Html::button('Delete row', ['name' => 'Delete', 'value' => 'true', 'class' => 'btn btn-danger deleted-row']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>
      <?php } ?>
    </div>

</div>
<?php
if($model->isNewRecord){
    $customScript = <<< SCRIPT
    $('.addr-row').on('click',function(){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag">Party Flag</label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name">Party Name</label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
        console.log('test');
        $('.dynamic-rows-field').last().remove();
    });
    $('#submit-button').on("click",function(){
        console.log('test');
    $('.judgmentparties-party_name').each(function(){   
        if($(this).val()=='')
        {
            alert('Party Name Can not be Empty');
            $(this).focus();
            $(this).parent().class('required has-error');


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
        $('.judgmentparties-party_name').attr('name','JudgmentParties[party_name][]')
        $('.dynamic-rows').append('<div class="dynamic-rows-field row" data-id=""><div class="col-xs-4"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag">Party Flag</label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name">Party Name</label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div><input type="hidden" name="JudgmentParties[judgment_party_id][]" value=""></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
            var data_id = $('.dynamic-rows-field').last().attr('data-id');
            if(data_id == "")
            { 
                $('.dynamic-rows-field').last().remove();
            }
            else{
                alert('Sorry! Can not delete existing record')
        }

           });
    $('#submit-button').on("click",function(){
        console.log('test');
    $('.judgmentparties-party_name').each(function(){
        if($(this).val()=='')
        {
            alert('Party Name Can not be Empty');
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
 var parties =  $('#judgmentparties-judgment_code').val();
 if(parties=='')
 {
    alert('Please Select Judgement code');
 }
 else
$.ajax({
//type     :'GET',
url        : '/cjadmin/judgment-parties/party?id='+parties,
dataType   : 'json',
success    : function(data){
        console.log(data);
        $('.dynamic-rows div').html('');    

         var res = (data.respondant_name).split(";");
         var res1 = (data.appellant_name).split(";");
          for(i=0;i<res1.length;i++){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag">Party Flag</label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name">Party Name</label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false" value="'+res1[i]+'"><div class="help-block"></div></div></div></div></div>');
            }

         //console.log(res.length);
         for(i=0;i<res.length;i++){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag">Party Flag</label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2" selected="selected">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name">Party Name</label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false" value="'+res[i]+'"><div class="help-block"></div></div></div></div></div>');
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
