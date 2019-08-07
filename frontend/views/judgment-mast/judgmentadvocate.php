<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\JudgmentMast;
use backend\models\JudgmentAdvocate;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentAdvocate */
/* @var $form yii\widgets\ActiveForm */
$judgmentAdvocate = JudgmentAdvocate::find()->select('judgment_code')->groupBy('judgment_code')->all();
$j_code[] ='';
foreach ($judgmentAdvocate as $code) {
	$j_code[]= $code->judgment_code; 
}
//$jcode = rtrim($j_code,',');
/*print_r($judgmentAdvocate);
exit();*/

$judgment = ArrayHelper::map(JudgmentMast::find()
	->where(['not in','judgment_code',$j_code])
	->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });

?>
<div class="judgment-advocate-form">
	 <div class="box box-danger col-md-12">
	 <?php if($model->isNewRecord) { ?>
    	<?php $form = ActiveForm::begin(['action' =>['judgment-mast/judgmentadvocate']]); ?>
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
    		<?= $form->field($model, (!$model->isNewRecord) ? 'advocate_flag' : 'advocate_flag[]')->dropDownList(["1"=>"Appellant","2"=>"Respondent","3"=>"intervener"]) ?>
    	</div>
    	<div class="col-xs-6">
    			<?= $form->field($model, (!$model->isNewRecord) ? 'advocate_name' : 'advocate_name[]' )->textInput(['maxlength' => true,
    			'class'=>'judgmentadvocate-advocate_name form-control']) ?>	
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

   <?php if(!$model->isNewRecord) { ?>   

    	<?php $form = ActiveForm::begin(); ?>
			<div class="box-header with-border"><h3 class="box-title">Advocate</h3></div>
			<?= $form->field($model, 'judgment_code')->hiddenInput(); ?>


		<?php $advocate = JudgmentAdvocate::find()->where(['judgment_code'=>$model->judgment_code])->all();    ?>
	<div class="dynamic-rows rows col-xs-12">
		<?php foreach ($advocate as $adv) {
			$flag = ($adv->advocate_flag == '1' ? 'selected' : $adv->advocate_flag == '2'  ? 'selected' : '' );  			
				
		?>

	
	<div class="dynamic-rows-field row" data-id="<?= $adv->id ?>"><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><label class="control-label" for="judgmentadvocate-advocate_flag">Advocate Flag</label><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false" ><option value="1" <?= ($adv->advocate_flag == '1' ? 'slected' : '') ?> >Appellant</option><option value="2" <?= ($adv->advocate_flag == '2' ? 'selected' : '') ?> >Respondent</option><option value="3" slected = "<?= ($adv->advocate_flag == '3' ? 'selected' : '') ?>">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><label class="control-label" for="judgmentadvocate-advocate_name">Advocate Name</label><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false" value="<?= $adv->advocate_name ?>"><div class="help-block"></div></div>
	<input type="hidden" name="JudgmentAdvocate[id][]" value="<?= $adv->id ?>">
	</div></div>
	<?php } ?>


	</div>
	<div class="row form-group">
    <div class="col-xs-4">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>

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
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><label class="control-label" for="judgmentadvocate-advocate_flag">Advocate Flag</label><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><label class="control-label" for="judgmentadvocate-advocate_name">Advocate Name</label><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');	
	});
	$('.deleted-row').on('click',function(){
		console.log('test');
		$('.dynamic-rows-field').last().remove();
	});
	$('#submit-button').on("click",function(){
 	$('.judgmentadvocate-advocate_name').each(function(){
 		if($(this).val()=='')
 		{
 			alert('Advocate Name Can not be Empty');
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
		$('.judgmentadvocate-advocate_name').attr('name','JudgmentAdvocate[advocate_name][]')
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"  data-id=""><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><label class="control-label" for="judgmentadvocate-advocate_flag">Advocate Flag</label><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><label class="control-label" for="judgmentadvocate-advocate_name">Advocate Name</label><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div><input type="hidden" name="JudgmentAdvocate[id][]"></div></div></div>');	
	});
	$('.deleted-row').on('click',function(){
		//console.log('test');
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
 	$('.judgmentadvocate-advocate_name').each(function(){
 		if($(this).val()=='')
 		{
 			alert('Advocate Name Can not be Empty');
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
 var advocate =  $('#judgmentadvocate-judgment_code').val();
 if(advocate=='')
 {
 	alert('Please Select Judgement code');
 }
 else
$.ajax({
//type     :'GET',
url        : '/cjadmin/judgment-advocate/advocate?id='+advocate,
dataType   : 'json',
success    : function(data){

console.log(data);
		$('.dynamic-rows div').html('');	

		 var res = (data.appellant_adv).split(";");
		 var res1 = (data.respondant_adv).split(";");
		 console.log(res.length);
		 for(i=0;i<res.length;i++){
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><label class="control-label" for="judgmentadvocate-advocate_flag">Advocate Flag</label><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><label class="control-label" for="judgmentadvocate-advocate_name">Advocate Name</label><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false" value="'+res[i]+'"><div class="help-block"></div></div></div></div></div>');
			}
		for(i=0;i<res1.length;i++){
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><label class="control-label" for="judgmentadvocate-advocate_flag">Advocate Flag</label><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2" selected="selected">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><label class="control-label" for="judgmentadvocate-advocate_name">Advocate Name</label><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false" value="'+res1[i]+'"><div class="help-block"></div></div></div></div></div>');
			}


		//$('#citymast-state_name').append('<option value='+item.state_code+'>'+item.state_name+'</option>');
	},
		error: function(xhr, textStatus, errorThrown){
		//alert('No states for this contry');
	}                                                         
	});
console.log(advocate);
});	
SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);

?>