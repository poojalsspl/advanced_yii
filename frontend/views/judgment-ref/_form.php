<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentRef;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentRef */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
?>

<!--add tabs---->
<?= $this->render("/judgment-mast/view_tabs") ?>
<!--end of tab --->


<!------start of form------>
<?php
    $jcode  = '';
    $doc_id = '';
    
if($_GET)
{
    $jcode  = $_GET['jcode'];
    $doc_id  = $_GET['doc_id'];
   
}

$judgment = ArrayHelper::map(JudgmentMast::find()->where(['judgment_code'=>$jcode])->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });

?>

<div class="judgment-ref-form">
  <div class="box box-danger col-md-12">
         <?php if($model->isNewRecord) { ?>
            <?php $form = ActiveForm::begin(['method'=>'post']); ?>
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
            'data' => $judgment,
            'disabled'=>true,
            'initValueText' => $jcode,        
            'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],
            ]); ?>

      <div class="dynamic-rows rows col-xs-12">   
      <div class="dynamic-rows-field row">
    
        <div class="col-xs-6">
             <?= $form->field($model, (!$model->isNewRecord) ? 'judgment_title_ref' : 'judgment_title_ref[]' )->textInput(['maxlength' => true,
                'class'=>'judgmentref-judgment_title_ref form-control'])->label('Judgment Title Referred(One entry in Each Row)') ?> 
        </div>
        <div class="col-xs-2">
        </div>
       
     </div>
     </div>
     <div class="row form-group">
    <div class="col-xs-4">
        <?= Html::button($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>
    </div>
    <div class="col-xs-8"> 
    <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
    
    </div>
    </div> 
    <?php ActiveForm::end(); ?>
    <?php } ?>
    <?php if(!$model->isNewRecord) { ?>
    <?php $form = ActiveForm::begin(['method'=>'post']); ?>  
    <div class="box-header with-border">
    <h3 class="box-title"></h3>
    </div>
    <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    'disabled'=>true,
     'initValueText' => $jcode,        
    //'language' => '',
    'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],
     ]); ?>
     <div class="dynamic-rows rows col-xs-12">
        <?php 
        //echo $model->judgment_code;die;
        $judgment_title_ref = JudgmentRef::find()->where(['judgment_code'=>$model->judgment_code])->all();?>
        <label>Judgment Title Referred(One entry in Each Row)</label>
       
       <?php foreach ($judgment_title_ref as $jdg) { ?>
            <div class="dynamic-rows-field row">
                <div class="col-xs-6">
                <div class="form-group field-judgmentref-judgment_title_ref has-success">
                <label class="control-label" for="judgmentref-judgment_title_ref"></label>
                <input type="text" id="judgmentref-judgment_title_ref" class="judgmentref-judgment_title_ref form-control" name="JudgmentRef[judgment_title_ref][]" value="<?= $jdg->judgment_title_ref ?>" maxlength="20" aria-invalid="false">
                <div class="help-block"></div>
                </div> 
            </div>
            <div class="col-xs-2">            
            </div> 
            </div>
            <?php } ?>
      </div>
    <div class="row form-group">
    <div class="col-xs-4">
        <?= Html::button($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>
    </div>
    <div class="col-xs-8"> 
    <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>

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
        console.log('test');
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-6"><div class="form-group field-judgmentref-judgment_title_ref has-success"><label class="control-label" for="judgmentref-judgment_title_ref"></label><input type="text" id="judgmentref-judgment_title_ref" class="form-control judgmentref-judgment_title_ref" name="JudgmentRef[judgment_title_ref][]" maxlength="20" aria-invalid="false"><div class="help-block"></div></div></div></div>');    
    });
    
    $('#submit-button').on("click",function(){
        console.log('test');
    $('.judgmentref-judgment_title_ref').each(function(){   
        if($(this).val()=='')
        {
            alert('Can not be Empty');
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
        $('.judgmentref-judgment_title_ref').attr('name','JudgmentRef[judgment_title_ref][]')
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-6"><div class="form-group field-judgmentref-judgment_title_ref has-success"><label class="control-label" for="judgmentref-judgment_title_ref"></label><input type="text" id="judgmentref-judgment_title_ref" class="form-control judgmentref-judgment_title_ref" name="JudgmentRef[judgment_title_ref][]" maxlength="20" aria-invalid="false"><div class="help-block"></div></div></div></div>');    
    });
    
    $('#submit-button').on("click",function(){
        console.log('test');
    $('.judgmentref-judgment_title_ref').each(function(){
        if($(this).val()=='')
        {
            alert('Can not be Empty');
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


