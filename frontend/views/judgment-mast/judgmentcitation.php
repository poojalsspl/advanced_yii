<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\JudgmentMast;
use backend\models\JournalMast;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentCitation */
/* @var $form yii\widgets\ActiveForm */
$judgment = ArrayHelper::map(JudgmentMast::find()->all(),
    'judgment_code',
    function($result) {
        return $result['court_name'].'::'.$result['judgment_title'];
    });

 $journal = ArrayHelper::map(JournalMast::find()->all(), 'journal_code', 'journal_name');

?>

<div class="judgment-citation-form">

    <?php $form = ActiveForm::begin(['action' =>['judgment-mast/judgmentcitation']]); ?>
    
    <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
            'data' => $judgment,
            //'language' => '',
            'options' => ['placeholder' => 'Select Judgment Code'],
            ]); ?>

    
        <?= $form->field($model, 'journal_name')->widget(Select2::classname(), [
                'data' => $journal,
                //'language' => '',
                'options' => ['placeholder' => 'Select Judgment Code'],
                'pluginEvents'=>[
                "select2:select" => "function() { var val = $(this).val();
                    //console.log('/cjadmin/judgment-citation/journal?id='+val);
                    $.ajax({

                                                              //type     :'GET',
                                                                url      : '/cjadmin/judgment-citation/journal?id='+val,
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

    <?= $form->field($model, 'judgment_date')->textInput([]) ?>

    <?= $form->field($model, 'citation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_volume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_pno')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 
$this->registerJs("$('#judgmentcitation-judgment_date').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
});");
$this->registerJs("$('#judgmentcitation-journal_year').datepicker({
   format: 'yyyy', // Notice the Extra space at the beginning
    viewMode: 'years', 
    minViewMode: 'years'
});");


?>