<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentElement;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

$doc_id  = '';
   if($_GET)
{
    $doc_id = $_GET['doc_id'];
}
?>
<?php
    $element  =  ArrayHelper::map(JudgmentElement::find()->where('doc_id = :doc_id', [':doc_id' => $doc_id])->all(),'element_code','element_name'); ?>

<script type="text/javascript">
function add_row()
{
 
  //console.log('hello');
 $rowno=$("#dp_table tr").length;
 $rowno=$rowno+1;
 $("#dp_table tr:last").after("<tr id='row"+$rowno+"'><td><select id='judgmentdatapoint-element_code"+$rowno+"' name='JudgmentDataPoint[element_code][]' class='form-control'><option value=''></option><option value='1'>Ruling</option><option value='2'>Facts</option></select></td><td><input type='text' name='JudgmentDataPoint[data_point][]'  class='form-control'></td><td><input type='text' name='JudgmentDataPoint[weight_perc][]' class='form-control'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>


<div class="judgment-data-point-form">
<div id="wrapper">

<div id="form_div">
 
   <?php $form = ActiveForm::begin(); ?>
   
  <table id="dp_table">
   <tr id="row1">
    <td>
      
       <?= $form->field($models, "element_code[]")->dropDownList($element,['prompt'=>'']); ?>
      </td>
    <td>
       <?= $form->field($models, "data_point[]")->textInput(['maxlength' => true]) ?>
     </td>
    <td>
       <?= $form->field($models, "weight_perc[]")->textInput(['maxlength' => true]) ?>
     </td>
   </tr>
  </table>
  <input type="button" onclick="add_row();" value="ADD ROW">
    
        
         
           <?= Html::submitButton($models->isNewRecord ? 'Create' : 'Update', ['class' => $models->isNewRecord ? 'btn btn-success' : 'btn btn-primary', "id"=>'submit-button']) ?>
   
  

 <?php ActiveForm::end(); ?>
</div>

</div>
</div>











<!-------------------bkup-------------->
 <!-- <div id="wrapper">

<div id="form_div"> -->
 
   <?php //$form = ActiveForm::begin(); ?>
  <!-- <table id="employee_table">
   <tr id="row1">
    <td><input type="text" name="element_code[]" id="name1" placeholder="Enter element_code"></td>
    <td><input type="text" name="data_point[]" placeholder="Enter data_point"></td>
    <td><input type="text" name="weight_perc[]" placeholder="Enter weight_perc"></td>
   </tr>
  </table>
  <input type="button" onclick="add_row();" value="ADD ROW">
  <input type="submit" name="submit_row" value="SUBMIT"> -->

 <?php //ActiveForm::end(); ?>
<!-- </div>

</div> -->


<script type="text/javascript">
/*function add_row()
{
 $rowno=$("#employee_table tr").length;
 $rowno=$rowno+1;
 $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='element_code[]' id='element_code"+$rowno+"' placeholder='Enter element_code'></td><td><input type='text' name='data_point[]' placeholder='Enter data_point'></td><td><input type='text' name='weight_perc[]' placeholder='Enter weight_perc'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}*/
</script>