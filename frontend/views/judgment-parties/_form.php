<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentParties;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentParties */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
?>

<!---code for tabs------->
<?= $this->render("/judgment-mast/view_tabs") ?>
<!---end of code for tabs------->

<!------start of form------>
<?php

  //$jcode  = '';
   $doc_id = ''; 
  if($_GET)
{
    //$jcode = $_GET['jcode'];
     $doc_id = $_GET['doc_id'];
  
}


$judgment = ArrayHelper::map(JudgmentMast::find()->where(['doc_id'=>$doc_id])->all(),
    'doc_id',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });
?>

<div class="judgment-parties-form">
	<div class="box box-blue">
		 <?php if($model->isNewRecord) { ?>


    <?php $form = ActiveForm::begin(); ?>
    <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
<?= $form->field($model, 'doc_id')->widget(Select2::classname(), [
    'disabled'=>true,
    'data' => $judgment,
     'initValueText' => $doc_id,    
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code','value'=>$doc_id],

])->label('Judgment Title'); ?>
<?php echo $form->field($model, 'doc_id')->hiddenInput(['value' => $doc_id])->label(false);?>
 <p id="demo"></p>
<?php echo $form->field($modeljmast, 'remark')->textarea(['rows'=>6])->label();?>
     <div class="dynamic-rows rows col-xs-12">   
      <div class="dynamic-rows-field row">

        <div class="col-xs-2">  
            <?= $form->field($model, (!$model->isNewRecord) ? 'party_flag' : 'party_flag[]')->dropDownList(["1"=>"Petitioner","2"=>"Appellant","3"=>"Applicant","4"=>"Defendant","5"=>"Respondent","6"=>"Intervener"])->label('Party Type') ?>
        </div>
        <div class="col-xs-6">
                <?= $form->field($model, (!$model->isNewRecord) ? 'party_name' : 'party_name[]' )->textInput(['maxlength' => true,
                'class'=>'judgmentparties-party_name form-control'])->label('Party Name(One Name in Each Row)') ?> 
        </div>
         <div class="col-xs-4">
             <?= $form->field($model, (!$model->isNewRecord) ? 'appeal_numb' : 'appeal_numb[]' )->textInput(['class'=>'judgmentparties-appeal_numb form-control'])->label('Appeal Number') ?> 
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
   <?= Html::button('Skip', ['name' => 'Skip', 'value' => 'true', 'class' => 'btn btn-warning skip-row']) ?>
   
    </div>
     <?php } ?>
    </div>
    <?php ActiveForm::end(); ?>
      <?php } ?>
      <?php  if(!$model->isNewRecord) {  ?>


       <?php $judgment = ArrayHelper::map(JudgmentMast::find()
    //->where(['not in','judgment_code',$j_code])
    ->all(),
    'doc_id',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });

    ?>   
    <?php $form = ActiveForm::begin(); ?>
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>

            <?= $form->field($model, 'doc_id')->widget(Select2::classname(), [
    'disabled'=>true,
    'data' => $judgment,
     'initValueText' => $doc_id,    
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code','value'=>$doc_id],

])->label('Judgment Title'); ?>

    <?php $parties = JudgmentParties::find()->where(['doc_id'=>$model->doc_id])->all(); ?>
         <label>Party Type</label>
         <label style="margin-left: 400px">Party Name (One Name in Each Row) </label>
         <label style="margin-left: 300px">Appeal Number</label>
    <div class="dynamic-rows rows col-xs-12">

    	 <?php foreach ($parties as $adv) {

            $flag = ($adv->party_flag == '1' ? 'selected' : $adv->party_flag == '2'  ? 'selected' : '' );  ?>

            <div class="dynamic-rows-field row" data-id="<?= $adv->judgment_party_id ?>">
              <div class="col-xs-2">
                <div class="form-group field-judgmentparties-party_flag has-success">
                  <select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false">
                    <option value="1" <?= ($adv->party_flag == '1' ? 'selected' : '') ?>>Petitioner</option>
                    <option value="2" <?= ($adv->party_flag == '2' ? 'selected' : '') ?>>Appellant</option>
                    <option value="3" <?= ($adv->party_flag == '3' ? 'selected' : '') ?>>Applicant</option>
                    <option value="4" <?= ($adv->party_flag == '4' ? 'selected' : '') ?>>Defendant</option>
                    <option value="5" <?= ($adv->party_flag == '5' ? 'selected' : '') ?>>Respondent</option>
                    <option value="6" <?= ($adv->party_flag == '6' ? 'selected' : '') ?>>Intervener</option>
                  </select>
                  <div class="help-block"></div>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group field-judgmentparties-party_name has-success">
                  
                  <input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false" value="<?= $adv->party_name ?>">
                  <div class="help-block"></div>
                </div>
           <!--  <input type="hidden" name="JudgmentParties[judgment_party_id][]" value="<?= $adv->judgment_party_id ?>"> -->
          </div>
          <div class="col-xs-4">
             <div class="form-group field-judgmentparties-appeal_numb has-success">
               <input type="text" id="judgmentparties-appeal_numb" class="form-control judgmentparties-appeal_numb" name="JudgmentParties[appeal_numb][]"  aria-invalid="false" value="<?= $adv->appeal_numb ?>">
               <div class="help-block"></div>
             </div>
             <input type="hidden" name="JudgmentParties[judgment_party_id][]" value="<?= $adv->judgment_party_id ?>">
          </div>
        </div>   
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
<!------end of form------>
<!------add judgment text------>
<?= $this->render("/judgment-mast/judgment_text_add") ?>
<!------judgment text------>


 
<?php
if($model->isNewRecord){
    $customScript = <<< SCRIPT
    $('.addr-row').on('click',function(){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-2"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag"></label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Petitioner</option><option value="2">Appellant</option><option value="3">Applicant</option><option value="4">Defendant</option><option value="5">Respondent</option><option value="6">Intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name"></label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div><div class="col-xs-4"><div class="form-group field-judgmentparties-appeal_numb has-success"><label class="control-label" for="judgmentparties-appeal_numb"></label><input type="text" id="judgmentparties-appeal_numb" class="form-control judgmentparties-appeal_numb" name="JudgmentParties[appeal_numb][]" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
        console.log('test');
        $('.dynamic-rows-field').last().remove();
    });
    $('.skip-row').on('click',function(){
        var doc =  $('#judgmentparties-doc_id').val();
        var x;
        var r= confirm('Are you sure ? There is no data available for this judgment.');
        if (r==true){
            $.ajax({
                url : '/advanced_yii/judgment-parties/skipdata?doc='+doc,
                dataType : 'json',
                success : function(data){
                    window.location.href = "/advanced_yii/judgment-mast/update?doc_id="+doc;
                }
                });
        }
        else
       {
         x="You pressed Cancel! So now you can insert data";
       }
       $('#demo').html(x);
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
        $('.dynamic-rows').append('<div class="dynamic-rows-field row" data-id=""><div class="col-xs-2"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag"></label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Petitioner</option><option value="2">Appellant</option><option value="3">Applicant</option><option value="4">Defendant</option><option value="5">Respondent</option><option value="6">Intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name"></label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div><div class="col-xs-4"><div class="form-group field-judgmentparties-appeal_numb has-success"><label class="control-label" for="judgmentparties-appeal_numb"></label><input type="text" id="judgmentparties-appeal_numb" class="form-control judgmentparties-appeal_numb" name="JudgmentParties[appeal_numb][]"  aria-invalid="false"><div class="help-block"></div></div><input type="hidden" name="JudgmentParties[judgment_party_id][]" value=""></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
            var data_id = $('.dynamic-rows-field').last().attr('data-id');        
            $('.dynamic-rows-field').last().remove();
            
           
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
/*$customScript = <<< SCRIPT
$('.generate-row').on('click', function(){
 var parties =  $('#judgmentparties-judgment_code').val();
 if(parties=='')
 {
    alert('Please Select Judgement code');
 }
 else
$.ajax({
//type     :'GET',
url        : '/advanced_yii/judgment-parties/party?id='+parties,
dataType   : 'json',
success    : function(data){
        console.log(data);
        $('.dynamic-rows div').html('');  


         var res = (data.respondant_name).split(";");
         var res1 = (data.appellant_name).split(";");
          for(i=0;i<res1.length;i++){
            if(res1[i]!=''){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag"></label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Petitioner</option><option value="2">Appellant</option><option value="3">Applicant</option><option value="4">Defendant</option><option value="5">Respondent</option><option value="6">Intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name"></label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false" value="'+res1[i]+'"><div class="help-block"></div></div></div></div></div>');
            }
        }
 
         //console.log(res.length);
         for(i=0;i<res.length;i++){
            if(res[i]!=''){
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentparties-party_flag has-success"><label class="control-label" for="judgmentparties-party_flag"></label><select id="judgmentparties-party_flag" class="form-control" name="JudgmentParties[party_flag][]" aria-invalid="false"><option value="1">Petitioner</option><option value="2" selected="selected">Appellant</option><option value="3">Applicant</option><option value="4">Defendant</option><option value="5">Respondent</option><option value="6">Intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentparties-party_name has-success"><label class="control-label" for="judgmentparties-party_name"></label><input type="text" id="judgmentparties-party_name" class="form-control judgmentparties-party_name" name="JudgmentParties[party_name][]" maxlength="50" aria-invalid="false" value="'+res[i]+'"><div class="help-block"></div></div></div></div></div>');
            }
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
*/
?>














