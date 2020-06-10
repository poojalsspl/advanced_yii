<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\BareactMast;
use frontend\models\JudgmentAct;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAct */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
    if($_GET)
{
    $jcode = $_GET['jcode'];
   
    $doc_id = $_GET['doc_id'];
}
?>
<p>If you are not getting proper category, you may insert manually</p>
<a href="act?jcode=<?php echo $jcode?>&doc_id=<?php echo $doc_id?>" class="btn btn-success">Create</a>



<hr>

<!---code for tabs------->
<?= $this->render("/judgment-mast/view_tabs") ?>
<!---end of code for tabs------->

<!---------submitted data show here------->
<?php
 $judgmentAct= JudgmentAct::find()->where(['j_doc_id'=>$doc_id])->all();
?>
    <table class="table table-bordered table-inverse">
  <thead>
    <tr>
      <th hidden="hidden">#</th>
      <th>Bareact Category </th>
      <th>Act title</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($judgmentAct as $judgmentActSingle) { ?>
    <tr>
      <th hidden="hidden" scope="row"><?= $ids = $judgmentActSingle->id ?></th>
      <td><?= $judgmentActSingle->bareact_desc ?></td>
      <td><?= $judgmentActSingle->act_title ?></td>
      <td><a href="/advanced_yii/judgment-act/delete?id=<?php echo $ids ?>" data-confirm="Are you sure you want to delete this item?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a></td>
     </tr>
    <?php } ?>
  </tbody>
</table>
<!---- end of submitted data ----->

<!------start of form------>

<div class="judgment-act-form">
      <div class="box box-blue">
    <?php

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
        'options' => ['placeholder' => 'Select Bareact'],
         
          ]); ?>
    </div>
    <div class="act_data">
    <div class="col-md-3 col-xs-12">
        <?= $form->field($model, 'act_catg_desc')->hiddenInput(['maxlength' => true ,'readonly'=>true,'value' => ''])->label(false) ?>
         <?= $form->field($model, 'act_catg_code')->hiddenInput(['maxlength' => true ,'value' => ''])->label(false) ?>
    </div>
    <div class="col-md-3 col-xs-12">
        <?= $form->field($model, 'act_sub_catg_desc')->hiddenInput(['maxlength' => true ,'readonly'=>true,'value' => ''])->label(false) ?>
         <?= $form->field($model, 'act_sub_catg_code')->hiddenInput(['maxlength' => true ,'value' => ''])->label(false) ?>
    </div>  
    <div class="col-md-3 col-xs-12">
        <?= $form->field($model, 'act_group_desc')->hiddenInput(['maxlength' => true ,'readonly'=>true,'value' => ''])->label(false) ?>
         <?= $form->field($model, 'act_group_code')->hiddenInput(['maxlength' => true ,'value' => ''])->label(false) ?>
    </div>  
    </div>
    <div>
        
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
<div class="row">
     <div class="act_row">
      


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
//checkbox = checkbox + '<input type="checkbox" name="JudgmentAct[act_title][]" value="' + act_title + '">'+act_title;
//$('.act_row').append('<input type="checkbox" id="judgmentact-act_title"  name="JudgmentAct[act_title][]"  aria-invalid="false" value="'+act_title+'">'+act_title+ '<br />');
$('.act_row').append('<div class="dynamic-rows-field row"><div class="col-xs-6"><div class="form-group field-judgmentact-act_title has-success"><input type="checkbox" id="judgmentact-act_title"  name="JudgmentAct[act_title][]"   aria-invalid="false" value="'+act_title+'"></div></div></div></div>'+act_title); 

});


//$('.act_row').html(checkbox);
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
