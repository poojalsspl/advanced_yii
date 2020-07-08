<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentAdvocate;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Json;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAdvocate */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
?>
<!--add tabs---->
<?= $this->render("/judgment-mast/view_tabs") ?>
<!--end of tab --->

<!------start of form------>
<?php
$judgmentAdvocate = JudgmentAdvocate::find()->select('doc_id')->groupBy('doc_id')->all();

$doc_id[] ='';
foreach ($judgmentAdvocate as $code) {
	$doc_id[]= $code->doc_id; 
	
}
$doc_id  = '';
   
if($_GET)
{
	//$jcode = $_GET['jcode'];
	$doc_id = $_GET['doc_id'];

    
}

$judgment = ArrayHelper::map(JudgmentMast::find()
	//->andWhere(['not in','judgment_code',$j_code])
	->where(['doc_id'=>$doc_id])
	->all(),
    'doc_id',
    function($result) {

        return $result['court_name'].'::'.$result['judgment_title'];
    });
?>

<div class="judgment-advocate-form">
	 <div class="box box-blue">
	 <?php if($model->isNewRecord) { ?>

    <?php $form = ActiveForm::begin(); ?>
     <div class="box-header with-border">

            </div>
           
            <?= $form->field($model, 'doc_id')->widget(Select2::classname(), [
    'data' => $judgment,
    'initValueText' => $doc_id,
    'disabled'=>true,
    'options' => ['placeholder' => 'Select Judgment Code','value'=>$doc_id],
   
     ])->label('Judgment Title'); ?>
     <?php echo $form->field($model, 'doc_id')->hiddenInput(['value' => $doc_id])->label(false);?>
     <div class="dynamic-rows rows col-xs-12">	
	  <div class="dynamic-rows-field row">
 
    	<div class="col-xs-4">	
    		<?= $form->field($model, (!$model->isNewRecord) ? 'advocate_flag' : 'advocate_flag[]')->dropDownList(["1"=>"Petitioner","2"=>"Appellant","3"=>"Applicant","4"=>"Defendant","5"=>"Respondent","6"=>"Intervener"])->label('select'); ?>
    	</div>
    	<div class="col-xs-6">
    			<?= $form->field($model, (!$model->isNewRecord) ? 'advocate_name' : 'advocate_name[]' )->textInput(['maxlength' => true,
    			'class'=>'judgmentadvocate-advocate_name form-control'])->label('Lawyers Name (One Lawyer Name in Each Row)'); ?>	
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
    
<?= Html::button('Delete row', ['name' => 'Delete', 'value' => 'true', 'class' => 'btn btn-danger deleted-row']) ?>
     <?php if(!$model->isNewRecord) { ?>
 
 <?php } ?>
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
    'doc_id',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });

    ?>   
<?php //form for update ?>
    <?php $form = ActiveForm::begin(); ?>
			<div class="box-header with-border"><h3 class="box-title"></h3></div>
			<?php // $form->field($model, 'judgment_code')->hiddenInput(); ?>

			<?= $form->field($model, 'doc_id')->widget(Select2::classname(), [
			'data' => $judgment,
			'initValueText' => $doc_id,
			'disabled'=>true,
			'options' => ['placeholder' => 'Select Judgment Code','value'=>$doc_id],

			])->label('Judgment Title'); ?>

       <?php $advocate = JudgmentAdvocate::find()->where(['doc_id'=>$model->doc_id])->all();    ?>
	<div class="dynamic-rows rows col-xs-12">
		 <label>Select</label>
		 <label style="margin-left: 400px">Lawyers Name (One Lawyer Name in Each Row) </label>
		<?php foreach ($advocate as $adv) {
			$flag = ($adv->advocate_flag == '1' ? 'selected' : $adv->advocate_flag == '2'  ? 'selected' : '' );  			
		?>

		<div class="dynamic-rows-field row" data-id="<?= $adv->id ?>">

			<div class="col-xs-4">
				<div class="form-group field-judgmentadvocate-advocate_flag has-success">
					<label class="control-label" for="judgmentadvocate-advocate_flag"></label>
					<select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false" >
						<option value="1" <?= ($adv->advocate_flag == '1' ? 'selected' : '') ?> >Petitioner</option>
						<option value="2" <?= ($adv->advocate_flag == '2' ? 'selected' : '') ?> >Appellant</option>
						<option value="3" <?= ($adv->advocate_flag == '3' ? 'selected' : '') ?> >Applicant</option>
						<option value="4" <?= ($adv->advocate_flag == '4' ? 'selected' : '') ?> >Defendant</option>
						<option value="5" <?= ($adv->advocate_flag == '5' ? 'selected' : '') ?> >Respondent</option>
						<option value="6" <?= ($adv->advocate_flag == '6' ? 'selected' : '') ?> >Intervener</option>
					</select>
					<div class="help-block">
						
					</div></div>
				</div>
				<div class="col-xs-6">
					<div class="form-group field-judgmentadvocate-advocate_name has-success">
						<label class="control-label" for="judgmentadvocate-advocate_name"></label><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false" value="<?= $adv->advocate_name ?>">
						<div class="help-block"></div>
					</div>
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
  	  
    
  	
  	<?php /*Html::a('Delete All', ['judgment-advocate/deleteall', 'jcode' => $jcode], ['class' => 'btn btn-danger pull-right'])*/ ?>

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
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Petitioner</option><option value="2">Appellant</option><option value="3">Applicant</option><option value="4">Defendant</option><option value="5">Respondent</option><option value="6">Intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');	
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
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"  data-id=""><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Petitioner</option><option value="2">Appellant</option><option value="3">Applicant</option><option value="4">Defendant</option><option value="5">Respondent</option><option value="6">Intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div><input type="hidden" name="JudgmentAdvocate[id][]"></div></div></div>');	
	});
		$('.deleted-row').on('click',function(){
		//console.log('test');
		var data_id = $('.dynamic-rows-field').last().attr('data-id');
				$('.dynamic-rows-field').last().remove();
		
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
/*$customScript = <<< SCRIPT
$('.generate-row').on('click', function(){
 var advocate =  $('#judgmentadvocate-judgment_code').val();
 if(advocate=='')
 {
 	alert('Please Select Judgement code');
 }
 else
$.ajax({
//type     :'GET',
url        : '/advanced_yii/judgment-advocate/advocate?id='+advocate,
dataType   : 'json',
success    : function(data){

console.log(data);


		$('.dynamic-rows div').html('');	

		 var res = (data.appellant_adv).split(";");
		 var res1 = (data.respondant_adv).split(";");
		 console.log(res.length);
		 for(i=0;i<res.length;i++){
		 if(res[i]!=''){	
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Petitioner</option><option value="2">Appellant</option><option value="3">Applicant</option><option value="4">Defendant</option><option value="5">Respondent</option><option value="6">Intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false" value="'+res[i]+'"><div class="help-block"></div></div></div></div></div>');
			}
			}
		for(i=0;i<res1.length;i++){
		if(res1[i]!=''){
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmentadvocate-advocate_flag has-success"><select id="judgmentadvocate-advocate_flag" class="form-control" name="JudgmentAdvocate[advocate_flag][]" aria-invalid="false"><option value="1">Petitioner</option><option value="2" selected="selected">Appellant</option><option value="3">Applicant</option><option value="4">Defendant</option><option value="5">Respondent</option><option value="6">Intervener</option></select><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentadvocate-advocate_name has-success"><input type="text" id="judgmentadvocate-advocate_name" class="form-control judgmentadvocate-advocate_name" name="JudgmentAdvocate[advocate_name][]" maxlength="50" aria-invalid="false" value="'+res1[i]+'"><div class="help-block"></div></div></div></div></div>');
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
*/
?>





