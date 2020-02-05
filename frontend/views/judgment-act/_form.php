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
?>

<!---code for tabs------->
<?= $this->render("/judgment-mast/view_tabs") ?>
<!---end of code for tabs------->

<!------start of form------>

<div class="judgment-act-form">
      <div class="box box-blue">
    <?php
    if($_GET)
{
    $jcode = $_GET['jcode'];
   
    $doc_id = $_GET['doc_id'];
}
$judgment = ArrayHelper::map(JudgmentMast::find()->where(['judgment_code'=>$jcode])->all(),
    'judgment_code',
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

<?php
/*$array = ['type' => 'A', 'options' => [1, 2]];
echo $type = ArrayHelper::getValue($array, 'type');
$data = [
    ['id' => '123', 'data' => 'abc'],
    ['id' => '345', 'data' => 'def'],
];
$ids = ArrayHelper::getColumn($data, 'id');
print_r($ids);*/
?>
<div id="js_val">
    
</div>



<?php
 //echo "hello : ";
 // echo $content = "<script>document.getElementById(js_val);</script>";
?>
 <div class="row">  
<div class="col-md-3 col-xs-12">

     <?php  $bareactmast  = ArrayHelper::map(BareactMast::find()->all(), 'bareact_code', 'bareact_desc'); ?>
    

             <?php /*echo $form->field($model, "bareact_desc")->dropDownList($bareactmast,['prompt'=>''])->label('Element Name'); */?>
             <?= $form->field($model, 'bareact_desc')->widget(Select2::classname(), [
        'data' => $bareactmast,
        'options' => ['placeholder' => 'Select Element Name'],
         
          ]); ?>
    </div>
    <div class="act_data">
    <div class="col-md-3 col-xs-12">
        <?= $form->field($model, 'act_catg_desc')->textInput(['maxlength' => true ,'readonly'=>true,'value' => ''])->label('Main Act Category') ?>
         <?= $form->field($model, 'act_catg_code')->hiddenInput(['maxlength' => true ,'value' => ''])->label(false) ?>
    </div>
    <div class="col-md-3 col-xs-12">
        <?= $form->field($model, 'act_sub_catg_desc')->textInput(['maxlength' => true ,'readonly'=>true,'value' => ''])->label('Act SubCategory') ?>
         <?= $form->field($model, 'act_sub_catg_code')->hiddenInput(['maxlength' => true ,'value' => ''])->label(false) ?>
    </div>  
    <div class="col-md-3 col-xs-12">
        <?= $form->field($model, 'act_group_desc')->textInput(['maxlength' => true ,'readonly'=>true,'value' => ''])->label('Group') ?>
         <?= $form->field($model, 'act_group_code')->hiddenInput(['maxlength' => true ,'value' => ''])->label(false) ?>
    </div>  
    </div>
    <div>
        
    </div>
    <div class="act_row">
      
    </div>
    <p></p>

 <div class="col-md-4 col-xs-12">

    <?= $form->field($model, 'j_doc_id')->hiddenInput(['maxlength' => true ,'readonly'=>true,'value' => $doc_id])->label(false) ?>
    <?php //echo $form->field($model, 'judgment_code')->textInput(['readonly'=>true,'value' => $jcode])->label(false) ?>
    <?= $form->field($model, 'bareact_code')->hiddenInput(['maxlength' => true])->label(false) ?>
    <?php //echo  $form->field($model, 'doc_id[]')->textInput(['maxlength' => true,'class'=>'test'])->label(false) ?>

</div>
 <div class="col-md-4 col-xs-12">
 
    
   

</div>

</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
<!------end of form------>
<!------add judgment text------>
<?= $this->render("/judgment-mast/judgment_text_add") ?>
<!------judgment text------>

<?php $customScript = <<< SCRIPT


$('#judgmentact-bareact_desc').on('change', function(){
    var bareact_desc = $(this).val();

 //console.log(bareact_desc);
 if(bareact_desc=='')
 {
    alert('Please Select Judgement code');
 }
 else
$.ajax({
//type     :'GET',
url        : '/advanced_yii/judgment-act/bareact?id='+bareact_desc,
dataType   : 'json',
success    : function(data){
let checkbox = '';
console.log(typeof data);
 data.forEach(function(e){
//console.log('e',e)
catg_desc = e.act_catg_desc;
catg_code = e.act_catg_code;
sub_desc  = e.act_sub_catg_desc;
sub_code  = e.act_sub_catg_code;
group_desc = e.act_group_desc;
group_code = e.act_group_code;
act_title  = e.act_title;

//console.log(act_title);
checkbox = checkbox + '<input type="checkbox" name="JudgmentAct[act_title][]" value="' + act_title + '">'+act_title+ '<br />';
//$('.act_row').append('<input type="checkbox" id="judgmentact-act_title"  name="JudgmentAct[act_title][]"  aria-invalid="false" value="'+act_title+'">'+act_title+ '<br />');

});


$('.act_row').append(checkbox);
$('#judgmentact-act_catg_desc').val(catg_desc); 
$('#judgmentact-act_catg_code').val(catg_code);
$('#judgmentact-act_sub_catg_desc').val(sub_desc);
$('#judgmentact-act_sub_catg_code').val(sub_code);
$('#judgmentact-act_group_desc').val(group_desc);
$('#judgmentact-act_group_code').val(group_code);

        
 },
                
    });
//console.log(bareact_desc);
}); 

SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);?>
