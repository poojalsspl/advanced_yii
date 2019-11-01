<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentElement;
use frontend\models\ElementMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
?>
<?php
    $jcode  = '';
  
if($_GET)
{
    $jcode = $_GET['jcode'];
  
   
}
?>
 <div class="judgment-element-form">
    <div class="container">
        <div class="row">
           <div class="col-md-3">
            <?php $form = ActiveForm::begin();

$element    = ArrayHelper::map(ElementMast::find()->all(), 'element_code', 'element_name'); 
//print_r($element);
foreach ($element as $key => $value) {
   // echo "<p>".$value."</p>";
    echo "<br>";
  echo  Html::a($value,['create','jcode'=>$jcode,'value'=>$value]) ;
    # code...
}
ActiveForm::end();
?>
           </div>
            <div class="col-md-9">
<?php $form = ActiveForm::begin(); ?>
<?php
$element_val = '';
if($_GET)
{
   $element_val = $_GET['value'];

}
//$element    = ArrayHelper::map(ElementMast::find()->all(), 'element_code', 'element_name'); 
?>

    <?php if($element_val!="") { ?>
    <?= $form->field($model, 'element_name')->textInput(['readonly'=> true,'value'=>$element_val]);?> 
    <?php } ?>
    <?php if($element_val == "") { ?>
      <?= $form->field($model, 'element_name')->textInput(['readonly'=> true]);?>  
       <?php } ?>
    <?= $form->field($model, 'judgment_code')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'element_text')->textarea(['rows' => 6]); ?>
    

 <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>      
 
<?php ActiveForm::end(); ?>
</div>
</div>
</div>
</div>
<?php 
    $this->registerJs("CKEDITOR.replace('judgmentelement-element_text',{toolbar : 'Basic'})");
?>


