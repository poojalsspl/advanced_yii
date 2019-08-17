<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use frontend\models\JudgmentMast;
use frontend\models\JournalMast;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentCitation */
/* @var $form yii\widgets\ActiveForm */

 $journal = ArrayHelper::map(JournalMast::find()->all(), 'journal_code', 'journal_name');

    $jcode  = '';
    $doc_id = '';
    
if($_GET)
{
    $jcode  = $_GET['jcode'];
    $doc_id  = $_GET['doc_id'];
   
}

$judgment = ArrayHelper::map(JudgmentMast::find()->where(['judgment_code'=>$jcode])->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });



?>

<div class="judgment-citation-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
            'data' => $judgment,
            'disabled'=>true,
            
            'initValueText' => $jcode,    
            //'language' => '',
            'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],
            ]); ?>

     <?= $form->field($model, 'journal_name')->widget(Select2::classname(), [
                'data' => $journal,
                //'language' => '',
                'options' => ['placeholder' => 'Select Judgment Code'],
                'pluginEvents'=>[
                "select2:select" => "function() { var val = $(this).val();
                    
                 $.ajax({

                          
                            url      : '/advanced_yii/judgment-citation/journal?id='+val,
                            dataType: 'json',
                            success  : function(data) {
                                console.log(data);
                                $('#judgmentcitation-shrt_name').val(data.shrt_name);
                                $('#judgmentcitation-journal_code').val(val);
                                
                          },
                          error: function(xhr, textStatus, errorThrown){
                               alert('No states for this contry');
                            }                                                         
                          });
                    }"
                ]
                ]); ?>
    <?= $form->field($model, 'journal_code')->textInput(['maxlength' => true,'readonly'=>true]) ?>
    
    <?= $form->field($model, 'shrt_name')->textInput(['maxlength' => true,'readonly'=>true]) ?>
  
    <?= $form->field($model, 'judgment_date')->widget(DateRangePicker::classname(), [
    'pluginOptions'=>[
        'singleDatePicker'=>true,
        'showDropdowns'=>true,
    ],
]);
  ?>            

    <?= $form->field($model, 'citation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_volume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_pno')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

         <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
 <?php if(!$model->isNewRecord) { ?>
 <?= Html::a('Delete All', ['judgment-citation/deleteall', 'jcode' => $jcode], ['class' => 'btn btn-danger pull-right']) ?>
 <?php } ?>        
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
/*$this->registerJs("$('#judgmentcitation-judgment_date').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
});"); */
$this->registerJs("$('#judgmentcitation-journal_year').datepicker({
   format: 'yyyy', // Notice the Extra space at the beginning
    viewMode: 'years', 
    minViewMode: 'years'
});");


?>
