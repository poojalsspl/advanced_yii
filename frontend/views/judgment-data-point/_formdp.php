<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentElement;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

?>


<script type="text/javascript">
function add_row()
{
 $rowno=$("#employee_table tr").length;
 $rowno=$rowno+1;
 $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='element_code[]' id='element_code"+$rowno+"' placeholder='Enter element_code'></td><td><input type='text' name='data_point[]' placeholder='Enter data_point'></td><td><input type='text' name='weight_perc[]' placeholder='Enter weight_perc'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
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
  <table id="employee_table">
   <tr id="row1">
    <td><input type="text" name="element_code[]" id="name1" placeholder="Enter element_code"></td>
    <td><input type="text" name="data_point[]" placeholder="Enter data_point"></td>
    <td><input type="text" name="weight_perc[]" placeholder="Enter weight_perc"></td>
   </tr>
  </table>
  <input type="button" onclick="add_row();" value="ADD ROW">
  <input type="submit" name="submit_row" value="SUBMIT">

 <?php ActiveForm::end(); ?>
</div>

</div>
</div>
