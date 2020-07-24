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
    //$jcode = $_GET['jcode'];
   
    $doc_id = $_GET['doc_id'];
}
?>
<p>If you are not getting proper category, you may create manually</p>
<a href="act?doc_id=<?php echo $doc_id?>" class="btn btn-success">Create</a>



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
      <td><?= $judgmentActSingle->sec_title ?></td>
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
    
<!--   <input
type="text"
placeholder="language name"
class="form-control flexdatalist"
data-min-length="1"
multiple="multiple"
list="languages"
name="language12"> -->
<!--  <datalist id="languages">

<option value="PHP">PHP</option>
<option value="JavaScript">JavaScript</option>
<option value="Cobol">Cobol</option>
<option value="C#">C#</option>
<option value="C++">C++</option>
<option value="Java">Java</option>
<option value="Pascal">Pascal</option>
<option value="FORTRAN">FORTRAN</option>
<option value="Lisp">Lisp</option>
<option value="Swift">Swift</option>
</datalist> --> 
<div class="act-section">
  
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

 console.log(bareact_desc);
 if(bareact_desc=='')
 {
    alert('Please Select Bareact');
 }
 else
$.ajax({
//type     :'GET',
url        : '/advanced_yii/judgment-act/bgroupmst?id='+bareact_desc,
dataType   : 'html',
success    : function(data){

console.log(typeof data);
//$('.act-section').html(data);
       
 },
                
    });
//console.log(bareact_desc);
}); 

SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);?>
