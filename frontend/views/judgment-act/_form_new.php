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
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
    if($_GET)
{
    $doc_id = $_GET['doc_id'];
}
?>


<!---code for tabs------->
<?= $this->render("/judgment-mast/view_tabs") ?>
<!---end of code for tabs------->

<!------start of form------>

<div class="judgment-act-form">
      <div class="box box-blue">
    <?php

$judgment = ArrayHelper::map(JudgmentMast::find()->where(['doc_id'=>$doc_id])->all(),
    'doc_id',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });
foreach ($judgment as $key => $judgment_value) {
    $judgment_value;
}

?>

    <?php $form = ActiveForm::begin(); ?>
    <div class="box-header with-border">
     <h3 class="box-title"></h3>
    </div>
    

 <?= $form->field($model, 'judgment_title')->textInput(['maxlength' => true ,'readonly'=>true,'value' => $judgment_value])->label() ?>
 <?= $form->field($model, 'j_doc_id')->hiddenInput(['maxlength' => true ,'readonly'=>true,'value' => $doc_id])->label(false) ?>

 
    <div class="dynamic-rows rows col-xs-12">
        <div class="dynamic-rows-field row">
            <div class="col-xs-6">
                <?= $form->field($model, 'bareact_desc[]')->textInput()->label('Bareact Category'); ?>
            </div>
            <div class="col-xs-6">
                <?= $form->field($model, 'sec_title[]')->textInput()->label('Section'); ?>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-xs-4">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-xs-8">
        <?= Html::button('Add row', ['name' => 'Add', 'value' => 'true', 'class' => 'btn btn-info addr-row']) ?>
        <?= Html::button('Delete row', ['name' => 'Delete', 'value' => 'true', 'class' => 'btn btn-danger deleted-row']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
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
        $('.dynamic-rows').append('<div class="dynamic-rows-field row"><div class="col-xs-12"><div class="col-xs-6"><div class="form-group field-judgmentact-bareact_desc has-success"><input type="text" id="judgmentact-bareact_desc" class="form-control judgmentact-bareact_desc" name="JudgmentAct[bareact_desc][]" aria-invalid="false"><div class="help-block"></div></div></div><div class="col-xs-6"><div class="form-group field-judgmentact-sec_title has-success"><input type="text" id="judgmentact-sec_title" class="form-control judgmentact-sec_title" name="JudgmentAct[sec_title][]" aria-invalid="false"><div class="help-block"></div></div></div></div></div>');    
    });
    $('.deleted-row').on('click',function(){
        console.log('test');
        $('.dynamic-rows-field').last().remove();
    });
    $('#submit-button').on("click",function(){
        console.log('test');
    $('.judgmentact-sec_title').each(function(){   
        if($(this).val()=='')
        {
            alert('Section Can not be Empty');
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

