

    <?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentElement;
use frontend\models\ElementMast;
use frontend\models\JudgmentMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAdvocate */
/* @var $form yii\widgets\ActiveForm */
?>


<!------start of form------>
<?php
$judgmentAdvocate = JudgmentElement::find()->select('judgment_code')->groupBy('judgment_code')->all();

$j_code[] ='';
foreach ($judgmentAdvocate as $code) {
	$j_code[]= $code->judgment_code; 
	
}
$jcode  = '';
   
if($_GET)
{
	$jcode = $_GET['jcode'];
	

    
}

$judgment = ArrayHelper::map(JudgmentMast::find()
	//->andWhere(['not in','judgment_code',$j_code])
	->where(['judgment_code'=>$jcode])
	->all(),
    'judgment_code',
    function($result) {

        return $result['court_name'].'::'.$result['judgment_title'];
    });
?>

<div class="judgment-advocate-form">
	 <div class="box box-danger col-md-12">
	 <?php if($model->isNewRecord) { ?>

    <?php $form = ActiveForm::begin(); ?>
     <div class="box-header with-border">
            
            </div>
           
            <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    'initValueText' => $jcode,
    'disabled'=>true,
    'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],

     ]); ?>
     
     <div class="dynamic-rows rows col-xs-12">	
	  <div class="dynamic-rows-field row">
    
    	<div class="col-xs-4">	
    		<?= $form->field($model, (!$model->isNewRecord) ? 'element_name' : 'element_name[]')->dropDownList(["1"=>"FACTS","2"=>"RULING","3"=>"LEGAL ISSUES","4"=>"ARGUMENTS","5"=>"EVIDENCE","6"=>"CONCLUSION"]) ?>
    	</div>
    	<div class="col-xs-6">
    			<?= $form->field($model, (!$model->isNewRecord) ? 'element_text' : 'element_text[]' )->textInput(['maxlength' => true,
    			'class'=>'judgmentelement-element_text form-control']) ?>	
		</div>
		<div class="col-xs-2">
			
		</div>
       
	 </div>
	</div>
    <div class="row form-group">
    <div class="col-xs-4">
        <?= Html::button($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>

    </div>
    <?php if($model->isNewRecord) { ?>
    <div class="col-xs-8">
    	<?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
    <?= Html::button('Show Data', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info generate-row']) ?>

         <?php /*if(!$model->isNewRecord) { 
  Html::a('Delete All', ['judgment-advocate/deleteall', 'jcode' => $jcode], ['class' => 'btn btn-danger pull-right']) 
  }*/ ?>

     </div>
       <?php } ?>

    </div>
    <?php ActiveForm::end(); ?>
    <?php } ?>

    <?php if(!$model->isNewRecord) {
    	$judgment = ArrayHelper::map(JudgmentMast::find()
	//->where(['not in','judgment_code',$j_code])
	->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });

    ?>   

    <?php $form = ActiveForm::begin(); ?>
			<div class="box-header with-border"></div>
			<?php // $form->field($model, 'judgment_code')->hiddenInput(); ?>

			<?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
			'data' => $judgment,
			'initValueText' => $jcode,
			'disabled'=>true,
			'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],

			]); ?>

       <?php $advocate = JudgmentElement::find()->where(['judgment_code'=>$model->judgment_code])->all();    ?>
	<div class="dynamic-rows rows col-xs-12">
		<?php foreach ($advocate as $adv) {
			$flag = ($adv->element_name == '1' ? 'selected' : $adv->element_name == '2'  ? 'selected' : '' );  			
		?>

		<div class="dynamic-rows-field row" data-id="<?= $adv->id ?>">
			<div class="col-xs-4">
				<div class="form-group field-judgmentelement-element_name has-success">
					<label class="control-label" for="judgmentelement-element_name">Element Name</label>
					<select id="judgmentelement-element_name" class="form-control" name="JudgmentElement[element_name][]" aria-invalid="false" >
						<option value="1" <?= ($adv->element_name == '1' ? 'slected' : '') ?> >FACTS</option>
						<option value="2" <?= ($adv->element_name == '2' ? 'selected' : '') ?> >RULING</option>
						<option value="3" slected = "<?= ($adv->element_name == '3' ? 'selected' : '') ?>">LEGAL ISSUES</option>
					</select>
					<div class="help-block">
						
					</div></div>
				</div>
				<div class="col-xs-6">
					<div class="form-group field-judgmentelement-element_text has-success">
						<label class="control-label" for="judgmentelement-element_text">Element Text</label><input type="text" id="judgmentelement-element_text" class="form-control judgmentelement-element_text" name="JudgmentElement[element_text][]" maxlength="50" aria-invalid="false" value="<?= $adv->element_text ?>">
						<div class="help-block"></div>
					</div>
	   <input type="hidden" name="JudgmentElement[id][]" value="<?= $adv->id ?>">
	   </div></div>
	   <?php } ?>

	   </div>
	<div class="row form-group">
    <div class="col-xs-4">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>

    </div>
    <div class="col-xs-8">
    <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
    
  	
  	<?php /*Html::a('Delete All', ['judgment-advocate/deleteall', 'jcode' => $jcode], ['class' => 'btn btn-danger pull-right'])*/ ?>

    </div>
    </div>
    <?php ActiveForm::end(); ?>
    <?php } ?>

    </div>
    </div>
    <!------end of form------>
   
    <?php
if($model->isNewRecord){
	$customScript = <<< SCRIPT
	$('.addr-row').on('click',function(){
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentelement-element_name has-success"><label class="control-label" for="judgmentelement-element_name">Element Name</label><select id="judgmentelement-element_name" class="form-control" name="JudgmentElement[element_name][]" aria-invalid="false"><option value="1">FACTS</option><option value="2">RULING</option><option value="3">LEGAL ISSUES</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentelement-element_text has-success"><label class="control-label" for="judgmentelement-element_text">Element Text</label><input type="text" id="judgmentelement-element_text" class="form-control judgmentelement-element_text" name="JudgmentElement[element_tex][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');	
	});

	$('#submit-button').on("click",function(){
 	$('.judgmentelement-element_text').each(function(){
 		if($(this).val()=='')
 		{
 			alert('Text Can not be Empty');
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
		$('.judgmentelement-element_text').attr('name','JudgmentElement[element_text][]')
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"  data-id=""><div class="col-xs-4"><div class="form-group field-judgmentelement-element_name has-success"><label class="control-label" for="judgmentelement-element_name">Element Name</label><select id="judgmentelement-element_name" class="form-control" name="JudgmentElement[element_name][]" aria-invalid="false"><option value="1">FACTS</option><option value="2">RULING</option><option value="3">LEGAL ISSUES</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentelement-element_text has-success"><label class="control-label" for="judgmentelement-element_text">Element Text</label><input type="text" id="judgmentelement-element_text" class="form-control judgmentelement-element_text" name="JudgmentElement[element_text][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div><input type="hidden" name="JudgmentElement[id][]"></div></div></div>');	
	});

	$('#submit-button').on("click",function(){
		console.log('test');
 	$('.judgmentelement-element_text').each(function(){
 		if($(this).val()=='')
 		{
 			alert('Text Can not be Empty');
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
 var element =  $('#judgmentelement-judgment_code').val();
 if(element=='')
 {
 	alert('Please Select Judgement code');
 }
 else
$.ajax({
//type     :'GET',
url        : '/advanced_yii/judgment-element/element?id='+element,
dataType   : 'json',
success    : function(data){

console.log(data);
		$('.dynamic-rows div').html('');	

		 var res = (data.appellant_adv).split(";");
		 var res1 = (data.respondant_adv).split(";");
		 console.log(res.length);
		 for(i=0;i<res.length;i++){
		 if(res[i]!=''){	
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><label class="control-label" for="judgmentadvocate-advocate_flag">Advocate Flag</label><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><label class="control-label" for="judgmentadvocate-advocate_name">Advocate Name</label><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false" value="'+res[i]+'"><div class="help-block"></div></div></div></div></div>');
			}
			}
		for(i=0;i<res1.length;i++){
		if(res1[i]!=''){
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><label class="control-label" for="judgmentadvocate-advocate_flag">Advocate Flag</label><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Appellant</option><option value="2" selected="selected">Respondent</option><option value="3">intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><label class="control-label" for="judgmentadvocate-advocate_name">Advocate Name</label><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false" value="'+res1[i]+'"><div class="help-block"></div></div></div></div></div>');
		 }	
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





