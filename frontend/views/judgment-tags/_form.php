<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentTags;
/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentTags */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
?>


<!--add tabs---->
<?= $this->render("/judgment-mast/view_tabs") ?>
<!--end of tab --->
<?php 
if($_GET)
{
	
	$doc_id = $_GET['doc_id'];
}

$judgment = ArrayHelper::map(JudgmentMast::find()
	->where(['doc_id'=>$doc_id])
	->all(),
    'doc_id',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });
?>

<div class="judgment-tags-form">
	<div class="box box-blue">
      <?php if($model->isNewRecord) { ?>
    <?php $form = ActiveForm::begin(); ?>

   
    <?= $form->field($model, 'judgment_title')->widget(Select2::classname(), [
    'data' => $judgment,
    'initValueText' => $doc_id,
    'disabled'=>true,
    'options' => ['placeholder' => 'Select Judgment Code','value'=>$doc_id],
   
     ])->label('Judgment Title'); ?>
     <?php echo $form->field($model, 'doc_id')->hiddenInput(['value' => $doc_id])->label(false);?>
      <div class="dynamic-rows rows col-xs-12">	
	  <div class="dynamic-rows-field row">
     	<div class="col-xs-4">	
    		<?= $form->field($model, (!$model->isNewRecord) ? 'tag_name' : 'tag_name[]')->textInput(['class'=>'judgmenttags-tag_name form-control']); ?>
    	</div>
    	<div class="col-xs-6">
    			<?= $form->field($model, (!$model->isNewRecord) ? 'tag_value' : 'tag_value[]' )->textInput(['class'=>'judgmenttags-tag_value form-control']); ?>	
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
           </div>
       <?php } ?>
       </div>
        <?php ActiveForm::end(); ?>
<?php } ?>
       <?php if(!$model->isNewRecord) {
    	$judgment = ArrayHelper::map(JudgmentMast::find()
		->all(),
        'doc_id',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });
    ?> 
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-header with-border"><h3 class="box-title"></h3></div>
    <?= $form->field($model, 'judgment_title')->widget(Select2::classname(), [
			'data' => $judgment,
			'initValueText' => $doc_id,
			'disabled'=>true,
			'options' => ['placeholder' => 'Select Judgment Code','value'=>$doc_id],

			])->label('Judgment Title'); ?>
    <?php $tags = JudgmentTags::find()->where(['doc_id'=>$model->doc_id])->all();    ?>
     <div class="dynamic-rows rows col-xs-12">
      <label>Tag Name</label>
      <label style="margin-left: 380px">Tag Value</label>
     	<?php foreach ($tags as $tag) { ?>
          <div class="dynamic-rows-field row" data-id="<?= $tag->id ?>">
          	<div class="col-xs-4">
          		<div class="form-group field-judgmenttags-tag_name has-success">
          			<label class="control-label" for="judgmenttags-tag_name"></label>
          			<input type="text" id="judgmenttags-tag_name" class="form-control judgmenttags-tag_name" name="JudgmentTags[tag_name][]" aria-invalid="false" value="<?= $tag->tag_name ?>">
          			<div class="help-block"></div>
          		</div>
          	</div>
          	<div class="col-xs-6">
          		<div class="form-group field-judgmenttags-tag_value has-success">
          			<label class="control-label" for="judgmenttags-tag_value"></label>
          			<input type="text" id="judgmenttags-tag_value" class="form-control judgmenttags-tag_value" name="JudgmentTags[tag_value][]" aria-invalid="false" value="<?= $tag->tag_value ?>">
          			<div class="help-block"></div>
          		</div>
          		<input type="hidden" name="JudgmentTags[id][]" value="<?= $tag->id ?>">
          	</div>
          </div>
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
    <!------add judgment text------>
  <?= $this->render("/judgment-mast/judgment_text_add") ?>
    <!------judgment text------>
 <?php
if($model->isNewRecord){
	$customScript = <<< SCRIPT
	$('.addr-row').on('click',function(){
		$('.dynamic-rows').append(' <div class="dynamic-rows-field row"><div class="col-xs-4"><div class="form-group field-judgmenttags-tag_name has-success"><input type="text" id="judgmenttags-tag_name" class="form-control judgmenttags-tag_name" name="JudgmentTags[tag_name][]" aria-invalid="false" value=""><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmenttags-tag_value has-success"><input type="text" id="judgmenttags-tag_value" class="form-control judgmenttags-tag_value" name="JudgmentTags[tag_value][]" aria-invalid="false" value=""><div class="help-block"></div></div></div></div>');
		});	
		$('.deleted-row').on('click',function(){
		console.log('test');
		$('.dynamic-rows-field').last().remove();
	    });
	    $('#submit-button').on("click",function(){
	    	$('.judgmenttags-tag_name').each(function(){
	    		if($(this).val()=='')
	    		{
	    			alert('Tag Name Can not be Empty');
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
		$('.judgmenttags-tag_name').attr('name','JudgmentTags[tag_name][]')
		$('.dynamic-rows').append('<div class="dynamic-rows-field row"  data-id=""><div class="col-xs-4"><div class="form-group field-judgmenttags-tag_name has-success"><input type="text" id="judgmenttags-tag_name" class="form-control judgmenttags-tag_name" name="JudgmentTags[tag_name][]" aria-invalid="false" value=""><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmenttags-tag_value has-success"><input type="text" id="judgmenttags-tag_value" class="form-control judgmenttags-tag_value" name="JudgmentTags[tag_value][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div><input type="hidden" name="JudgmentTags[id][]"></div></div></div>');	
	});
		$('.deleted-row').on('click',function(){
		//console.log('test');
		var data_id = $('.dynamic-rows-field').last().attr('data-id');
				$('.dynamic-rows-field').last().remove();
		
	});

	$('#submit-button').on("click",function(){
		console.log('test');
 	$('.judgmenttags-tag_name').each(function(){
 		if($(this).val()=='')
 		{
 			alert('Tag Name Can not be Empty');
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








