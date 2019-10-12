<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentDataPoint */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-data-point-form">
<?php $form = ActiveForm::begin(); ?>
<?php
if($_GET){
$jcode = $_GET['jcode'];
}
?>
<table>
	<tr>
		<td>Element Name</td>
		<td>Element Datapoint</td>
	</tr>
<?php
foreach ($models as $index => $model) {
?>
<tr>
<td><?php echo $form->field($model, "[$index]element_name")->label(false)?></td>
<td><?php echo $form->field($model, "[$index]data_point")->label(false)?></td>
</tr>   
<?php } ?>
</table>
<div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>

</div>
