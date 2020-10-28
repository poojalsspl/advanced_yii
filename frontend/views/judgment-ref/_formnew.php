<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentRef;
use frontend\models\CourtMast;
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
    //$jcode  = '';
    $doc_id = '';
    
if($_GET)
{
    //$jcode  = $_GET['jcode'];
    $doc_id  = $_GET['doc_id'];
   
}

$judgment = ArrayHelper::map(JudgmentMast::find()->where(['doc_id'=>$doc_id])->all(),
    'doc_id',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });
$judgment_title = implode($judgment,'');
?>

<div class="judgment-ref-form">
    <div class="box box-blue">
        <?php if($model->isNewRecord) { ?>
  <?php $form = ActiveForm::begin(); ?>
    
    <br>
    <label>Judgment Title</label>
    <input type="text" value="<?php echo $judgment_title; ?>" readonly="readonly" class="form-control">
   
    <br><br>
    <div class="dynamic-rows rows col-xs-12">  
      <div class="dynamic-rows-field row">
        <?php
        $court  =  ArrayHelper::map(CourtMast::find()->all(),'court_code','court_name');
        ?>
 
        <div class="col-xs-2">  
            <?= $form->field($model, (!$model->isNewRecord) ? 'court_code_ref' : 'court_code_ref[]')->dropDownList($court,['prompt'=>''])->label('select'); ?>
        </div>
        <div class="col-xs-2">
                <?= $form->field($model, (!$model->isNewRecord) ? 'citation_ref' : 'citation_ref[]' )->textInput(['maxlength' => true,
                'class'=>'judgmentref-citation_ref form-control'])->label('Citation Ref'); ?>   
        </div>
        <div class="col-xs-2">
                <?= $form->field($model, (!$model->isNewRecord) ? 'judgment_date_ref' : 'judgment_date_ref[]' )->textInput(['maxlength' => true,
                'class'=>'judgmentref-judgment_date_ref form-control'])->label('judgment date'); ?>
        </div>
        <div class="col-xs-4">
                <?= $form->field($model, (!$model->isNewRecord) ? 'judgment_title_ref' : 'judgment_title_ref[]' )->textInput(['maxlength' => true,
                'class'=>'judgmentref-judgment_title_ref form-control'])->label('judgment title refferred'); ?>
        </div>
        <div class="col-xs-2">  
            <?= $form->field($model, (!$model->isNewRecord) ? 'ref_type' : 'ref_type[]')->dropDownList(['Preceding'=>'Preceding','Refered'=>'Refered'],['prompt'=>''])->label('Ref Type'); ?>
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
<?= Html::button('Delete row', ['name' => 'Delete', 'value' => 'true', 'class' => 'btn btn-danger deleted-row']) ?>&nbsp;
<?= Html::button('Skip', ['name' => 'Skip', 'value' => 'true', 'class' => 'btn btn-warning skip-row']) ?>

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
    <?= $form->field($model, 'doc_id')->widget(Select2::classname(), [
            'data' => $judgment,
            'initValueText' => $doc_id,
            'disabled'=>true,
            'options' => ['placeholder' => 'Select Judgment Code','value'=>$doc_id],

            ])->label('Judgment Title'); ?>
    <?php $reffered = JudgmentRef::find()->where(['doc_id'=>$model->doc_id])->all();?>
    
    <div class="dynamic-rows rows col-xs-12">
    <label>Select</label>   
    <label style="margin-left: 400px"> Name </label> 
    <?php foreach ($reffered as $ref) {
            $flag = ($ref->court_code_ref == '1' ? 'selected' : $ref->court_code_ref == '2'  ? 'selected' : '' );             
        ?> 
        <div class="dynamic-rows-field row" data-id="<?= $ref->id ?>">  
        <div class="col-xs-2"> 
            <div class="form-group field-judgmentref-court_code_ref has-success">
            <label class="control-label" for="judgmentref-court_code_ref"></label>
            <select id="judgmentref-court_code_ref" class="form-control" name="JudgmentRef[court_code_ref][]" aria-invalid="false" >
                <option value="1" <?= ($ref->court_code_ref == '1' ? 'selected' : '') ?> ></option>
            </select> 
            <div class="help-block"></div>   
             </div>
        </div>
        <div class="col-xs-2">
            <div class="form-group field-judgmentref-citation_ref has-success">
                <label class="control-label" for="judgmentref-citation_ref"></label>
                <input type="text" id="judgmentref-citation_ref" class="form-control judgmentref-citation_ref" name="JudgmentRef[citation_ref][]" maxlength="50" aria-invalid="false" value="<?= $ref->citation_ref ?>">
                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="form-group field-judgmentref-judgment_date_ref has-success">
                <label class="control-label" for="judgmentref-judgment_date_ref"></label>
                <input type="text" id="judgmentref-judgment_date_ref" class="form-control judgmentref-judgment_date_ref" name="JudgmentRef[judgment_date_ref][]" maxlength="50" aria-invalid="false" value="<?= $ref->judgment_date_ref ?>">
                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group field-judgmentref-judgment_title_ref has-success">
                <label class="control-label" for="judgmentref-judgment_title_ref"></label>
                <input type="text" id="judgmentref-judgment_title_ref" class="form-control judgmentref-judgment_title_ref" name="JudgmentRef[judgment_title_ref][]" maxlength="50" aria-invalid="false" value="<?= $ref->judgment_title_ref ?>">
                <div class="help-block"></div>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="form-group field-judgmentref-ref_type has-success">
                <label class="control-label" for="judgmentref-ref_type"></label>
                <select id="judgmentref-ref_type" class="form-control" name="JudgmentRef[ref_type][]" aria-invalid="false" >
                <option value="1" <?= ($ref->ref_type == '1' ? 'selected' : '') ?> ></option>
                </select> 
                <div class="help-block"></div>
            </div>
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
    <?= Html::button('Skip', ['name' => 'Skip', 'value' => 'true', 'class' => 'btn btn-warning skip-row']) ?>
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
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-2"><div class="form-group field-judgmentref-court_code_ref has-success"><select id="judgmentref-court_code_ref" class="form-control" name="JudgmentRef[court_code_ref][]" aria-invalid="false"><option value="1">Petitioner</option></select><div class="help-block"></div></div></div><div class="col-xs-2"><div class="form-group field-judgmentref-citation_ref has-success"><input type="text" id="judgmentref-citation_ref" class="form-control judgmentref-citation_ref" name="JudgmentRef[citation_ref][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div><div class="col-xs-2"><div class="form-group field-judgmentref-judgment_date_ref has-success"><input type="text" id="judgmentref-judgment_date_ref" class="form-control judgmentref-judgment_date_ref" name="JudgmentRef[judgment_date_ref][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div><div class="col-xs-4"><div class="form-group field-judgmentref-judgment_title_ref has-success"><input type="text" id="judgmentref-judgment_title_ref" class="form-control judgmentref-judgment_title_ref" name="JudgmentRef[judgment_title_ref][]" maxlength="50" aria-invalid="false"><div class="help-block"></div></div></div><div class="col-xs-2"><div class="form-group field-judgmentref-ref_type has-success"><select id="judgmentref-ref_type" class="form-control" name="JudgmentRef[ref_type][]" aria-invalid="false"><option value=""></option><option value="Preceding">Preceding</option><option value="Refered">Refered</option></select><div class="help-block"></div></div></div></div></div>'); 
    });
    $('.deleted-row').on('click',function(){
        console.log('test');
        $('.dynamic-rows-field').last().remove();
    });
    
    $('#submit-button').on("click",function(){
    $('.judgmentref-citation_ref').each(function(){
        if($(this).val()=='')
        {
            alert('Can not be Empty');
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
  
