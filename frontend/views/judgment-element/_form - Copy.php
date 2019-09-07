<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentElement;
use frontend\models\ElementMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
?>
 
<?php $form = ActiveForm::begin(); ?>
<?php
if($_GET)
{
	$jcode = $_GET['jcode'];
	
    
}
$element    = ArrayHelper::map(ElementMast::find()->all(), 'element_code', 'element_name'); 


 ?>
 <?= $form->field($model, 'element_code')->widget(Select2::classname(), [
        'data' => $element,
        'options' => ['placeholder' => 'Select Element'],
         'pluginEvents'=>[
          ]
          ]); ?>

    <?= $form->field($model, 'element_name')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'element_text'); ?>
    <?= $form->field($model, 'judgment_code'); ?>
    

    
     
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
 
<?php ActiveForm::end(); ?>