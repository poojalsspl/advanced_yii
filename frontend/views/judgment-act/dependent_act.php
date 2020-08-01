<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\BareactMast;
use frontend\models\BareactGroupMast;
use frontend\models\JudgmentAct;
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

 <?= $form->field($model, 'judgment_title')->textInput(['maxlength' => true ,'readonly'=>true,'value' => $judgment_value])->label() ?>

 <div class="row">  
<div class="col-md-3 col-xs-12">

     <?php $bareactgroupmast  = ArrayHelper::map(BareactGroupMast::find()->all(), 'act_group_code', 'act_group_desc'); 


     $bareactmast = ($model->bareact_code != "") ?  ArrayHelper::map(BareactMast::find()->where(["bareact_code"=>$model->bareact_code])->all(), 'bareact_code', 'bareact_desc') : "" ; ?>
     <?= $form->field($model, 'act_group_desc')->widget(Select2::classname(), [
        'data' => $bareactgroupmast,
        'options' => ['placeholder' => 'Bareact Group','value' => ($model->act_group_code != "") ? $model->act_group_code : ''],
        'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();                
              $('#judgmentact-jcatg_id').val(val);
                    $.ajax({
                      url      : '/advanced_yii/judgment-act/bmst?id='+val,
                      dataType : 'json',
                      success  : function(data) {                                 
                       $('#judgmentact-bareact_desc').empty();    
                       $('#judgmentact-bareact_desc').append('<option>Select Bareact Category</option>');
                        $.each(data, function(i, item){
                        $('#judgmentact-bareact_desc').append('<option value='+item.bareact_code+'>'+item.bareact_desc+'</option>');
                      });
                          },
                      error: function(xhr, textStatus, errorThrown){
                           alert('No Braect Category found');
                        }                                                         
                      });
             }"
            ]
         ]); ?>
    
     <?= $form->field($model, 'bareact_desc')->widget(Select2::classname(), [
        'data' => $bareactmast,
        'options' => ['placeholder' => 'Select Bareact'],
         
          ]); ?>
    </div>
    
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
  <div class="row">
    <label>Please Select Section after Bareact Selection</label>
  <input
type="text"
placeholder="Sections"
class="form-control flexdatalist"
data-min-length="1"
multiple="multiple"
list="bareactss"
name="sec_title"> 
<datalist id="bareactss">
</datalist> 
</div>
  <div class="row">
 <div class="col-md-6 col-xs-12">
   <?= $form->field($model, 'j_doc_id')->hiddenInput(['maxlength' => true ,'readonly'=>true,'value' => $doc_id])->label(false) ?>
</div>
 <div class="col-md-6 col-xs-12">
   <?= $form->field($model, 'bareact_code')->hiddenInput(['maxlength' => true])->label(false) ?>
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
url        : '/advanced_yii/judgment-act/bareact-section?id='+bareact_desc,
dataType   : 'json',
success    : function(data){

console.log(typeof data);
//$('#bareactss').html(data);
$('#bareactss').empty(); 
//$('#bareactss').append('<option>Select Sections</option>');
$.each(data, function(i, item){
$('#bareactss').append('<option value='+item.sec_title+'>'+item.sec_title+'</option>');
});
       
 },
                
    });
//console.log(bareact_desc);
}); 

SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);?>
