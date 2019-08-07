<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JsubCatgMast;
use frontend\models\JcatgMast;
use frontend\models\JudgmentMast;
use frontend\models\CityMast;
use frontend\models\CourtMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\daterange\DateRangePicker;
use frontend\models\JudgmentBenchType;
use frontend\models\JudgmentDisposition;
use frontend\models\JudgmentJurisdiction;



/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentMast */
/* @var $form yii\widgets\ActiveForm */
$cache = Yii::$app->cache;

?>

<div class="judgment-mast-form">


 <?php $form = ActiveForm::begin(); ?>

<div class="tab-content box box-info col-md-12">

<div class="col-md-3 split-box">
  <?php
        $courtMast  = ArrayHelper::map(CourtMast::find()->all(), 'court_code', 'court_name'); ?>
        <?= $form->field($model, 'court_name')->widget(Select2::classname(), [            
            'data' => $courtMast,

            'options' => ['placeholder' => 'Select Court', 'value' => (!$model->isNewRecord) ? $model->court_code : '', ],
            'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();                
              $('#judgmentmast-court_code').val(val);
                    $.ajax({
                      url      : '/advanced_yii/judgment-mast/court?id='+val,
                      dataType : 'json',
                      success  : function(data) {                                 
                        $('#judgmentmast-hearing_place option').remove();
                        //$('#judgmentmast-hearing_place').append('<option>Select State</option>');
                        $.each(data, function(i, item){
                      $('#judgmentmast-hearing_place').append('<option value='+item.city_code+'>'+item.city_name+'</option>');
                      });
                          },
                      error: function(xhr, textStatus, errorThrown){
                           alert('No states for this contry');
                        }                                                         
                      });
             }"
            ]
            ]); ?>        

<?= $form->field($model, 'court_code')->textInput(['readonly'=>true]) ?>
<?=  $form->field($model, 'appeal_numb')->textInput() ?>
<?php $benchType    = ArrayHelper::map(JudgmentBenchType::find()->all(), 'bench_type_id', 'bench_type_text'); 
$disposition  = ArrayHelper::map(JudgmentDisposition::find()->all(), 'disposition_id', 'disposition_text'); 
$jurisdiction = ArrayHelper::map(JudgmentJurisdiction::find()->all(), 'judgment_jurisdiction_id', 'judgment_jurisdiction_text'); ?>

<?= $form->field($model, 'bench_type_id')->widget(Select2::classname(), [
        'data' => $benchType,
        'options' => ['placeholder' => 'Select Judgment Bench Type'],
         'pluginEvents'=>[
          ]
          ]); ?>
          
 <?= $form->field($model, 'disposition_id')->widget(Select2::classname(), [
          
          'data' => $disposition,
          //'language' => '',
          'options' => ['placeholder' => 'Select Judgment Disposition'],
          'pluginEvents'=>[
            ]
          ]); ?>
<?= $form->field($model, 'judgment_jurisdiction_id')->widget(Select2::classname(), [
          
          'data' => $jurisdiction,
          //'language' => '',
          'options' => ['placeholder' => 'Select judgment_jurisdiction'],
          'pluginEvents'=>[
            ]
          ]); ?>
<?= $form->field($model, 'judgment_date')->widget(DateRangePicker::classname(), [
      'pluginOptions'=>[
          'singleDatePicker'=>true,
          'showDropdowns'=>true,
          'locale'=>['format' => 'YYYY-MM-DD'],
      ],
  ]);
    ?>

<?= $form->field($model, 'jyear')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'appeal_status')->dropDownList(["1"=>'Active', "2"=>"Pending"]) ?>
  <?= $form->field($model, 'hearing_date')->widget(DateRangePicker::classname(), [
    'pluginOptions'=>[
        'singleDatePicker'=>true,
        'showDropdowns'=>true,
        'locale'=>['format' => 'YYYY-MM-DD'],
    ],
]);
  ?>

<?= $form->field($model, 'hearing_place')->textInput(); ?>

<?= $form->field($model, 'doc_id')->textInput(['maxlength' => true]) ?>
      
<?= $form->field($model, 'judgment_source_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'judgment_type')->dropDownList(["0"=>'Order', "1"=>"Oral Order","2"=>"Judgment"],['prompt'=>'Select Appeal Status']) ?>
<?php  
     $jcatg_description = ArrayHelper::map(JcatgMast::find()->all(), 'jcatg_id', 'jcatg_description'); ?>

 <?= $form->field($model, 'jcatg_description')->widget(Select2::classname(), [
            
            'data' => $jcatg_description,           
            //'language' => '',
            'options' => ['placeholder' => 'Select Judgment Category','value' => ($model->jcatg_id != "") ? $model->jcatg_id : ''],
      'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();                
              $('#judgmentmast-jcatg_id').val(val);
                    $.ajax({
                      url      : '/advanced_yii/judgment-mast/jsubcateg?id='+val,
                      dataType : 'json',
                      success  : function(data) {                                 

                        //$('#judgmentmast-jsub_catg_description').remove();                        
                       $('#judgmentmast-jsub_catg_description').empty();    
                       $('#judgmentmast-jsub_catg_description').append('<option>Select Sub Category</option>');
                        $.each(data, function(i, item){


                      $('#judgmentmast-jsub_catg_description').append('<option value='+item.jsub_catg_id+'>'+item.jsub_catg_description+'</option>');
                      });
                          },
                      error: function(xhr, textStatus, errorThrown){
                           alert('No Judgment Sub Category found');
                        }                                                         
                      });
             }"
            ]

             ]); ?>


<?= $form->field($model, 'jcatg_id')->textInput(['readonly'=>true]) ?>
<?php  
      $jsub_catg_description = ($model->jsub_catg_id != "") ?  ArrayHelper::map(JsubCatgMast::find()->where(["jsub_catg_id"=>$model->jsub_catg_id])->all(), 'jsub_catg_id', 'jsub_catg_description') : "" ; ?>
    
      <?= $form->field($model, 'jsub_catg_description')->dropDownList([
        'data' => $jsub_catg_description,
        'prompt' => 'Select sub category'
        ]);
       ?>



<?= $form->field($model, 'jsub_catg_id')->textInput(['readonly'=>true]) ?>

<?= $form->field($model, 'judgment_ext_remark_flag')->dropDownList(["0"=>'Yes', "1"=>"No"],['prompt'=>'Select Remark Flag']) ?>
</div>

   <div class="col-md-9 split-box">

    <?= $form->field($model, 'judgment_title')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'appellant_name')->textInput() ?>
 
    <?=  $form->field($model, 'respondant_name')->textInput() ?>
            
    <?= $form->field($model, 'appellant_adv')->textInput() ?>

    <?= $form->field($model, 'appellant_adv_count')->textInput(['readonly'=>true]) ?>
      
    <?=  $form->field($model, 'respondant_adv')->textInput()  ?>

    <?= $form->field($model, 'respondant_adv_count')->textInput(['readonly'=>true]) ?>
   
    <?=  $form->field($model, 'citation')->textInput() ?>

    <?= $form->field($model, 'citation_count')->textInput(['readonly'=>true]) ?>

    <?=  $form->field($model, 'judges_name')->textInput()  ?>

  <?= $form->field($model, 'judges_count')->textInput(['readonly'=>true]) ?>

  <?= $form->field($model, 'judgment_abstract')->textarea(['rows' => 6]) ?>
      
  <?= $form->field($model, 'judgment_text')->textarea(['rows' => 6]) ?>

   </div>            

  <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
</div>
 <?php ActiveForm::end(); ?>


</div>
<script type="text/javascript">
function master1()
{
  var court_code = $('#judgmentmast-court_code').val();
  var court_name = $('#judgmentmast-court_name').val();
  var appeal_numb = $('#judgmentmast-appeal_numb').val();
  var judgment_date = $('#judgmentmast-judgment_date').val();
  var judgment_title = $('#judgmentmast-judgment_title').val();
  var appellant_adv_count = $('#judgmentmast-appellant_adv_count').val();
  var respondant_adv_count = $('#judgmentmast-respondant_adv_count').val();
  var appeal_status = $('#judgmentmast-appeal_status').val();
  var citation = $('#judgmentmast-citation').val();
  var citation_count = $('#judgmentmast-citation_count').val();
  var judges_name = $('#judgmentmast-judges_name').val();
  var judges_count = $('#judgmentmast-judges_count').val();
  if(code == '')
  {
    $('.field-judgmentmast-court_code').addClass('has-error');
    $('#judgmentmast-court_code').focus();    
  }
  else{   
    $('.field-judgmentmast-court_name').addClass('has-error');
    $('#judgmentmast-court_code').focus();
    
  }

}


</script>   
<?php 
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_abstract',{toolbar : 'Basic'})");

?>
<?php 
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_text',{toolbar : 'Basic'})");

?>

 <?php

$this->registerJs("$('#judgmentmast-appellant_adv').keyup(function(e){
    var count = $(this).val().split(';').length;
  
    $('#judgmentmast-appellant_adv_count').val(count);
    });
  $('#judgmentmast-respondant_adv').keyup(function(e){
    var count = $(this).val().split(';').length;
    $('#judgmentmast-respondant_adv_count').val(count);
    });
    $('#judgmentmast-citation').keyup(function(e){
    var count = $(this).val().split(';').length;
    $('#judgmentmast-citation_count').val(count);
    });
    $('#judgmentmast-judges_name').keyup(function(e){
    var count = $(this).val().split(';').length;
    $('#judgmentmast-judges_count').val(count);
    });

   /* $('#judgmentmast-appellant_adv').keydown(function(e){
   var appadv = $(this).val();
    var count = $(this).val().split(';').length;
    var trim1 = $.trim($('#judgmentmast-appellant_adv').val());
    $('#judgmentmast-appellant_adv').val(trim1);

    });
  $('#judgmentmast-respondant_adv').keydown(function(e){

   var appadv = $(this).val();
    var count = $(this).val().split(';').length;
    var trim1 = $.trim($('#judgmentmast-respondant_adv').val());
    $('#judgmentmast-respondant_adv').val(trim1);
    });
    $('#judgmentmast-citation').keydown(function(e){
   var appadv = $(this).val();
    var count = $(this).val().split(';').length;
    var trim1 = $.trim($('#judgmentmast-citation').val());
    $('#judgmentmast-citation').val(trim1);
    });
    $('#judgmentmast-judges_name').keydown(function(e){
    var count = $(this).val().split(';').length;
    var trim1 = $.trim($('#judgmentmast-judges_name').val());
    $('#judgmentmast-judges_name').val(trim1);
    });
    $('#judgmentmast-appeal_numb').keydown(function(e){
    var count = $(this).val().split(';').length;
    var trim1 = $.trim($('#judgmentmast-appeal_numb').val());
    $('#judgmentmast-appeal_numb').val(trim1);
    });
      $('#judgmentmast-appellant_name').keydown(function(e){
    var count = $(this).val().split(';').length;
    var trim1 = $.trim($('#judgmentmast-appellant_name').val());
    $('#judgmentmast-appellant_name').val(trim1);
    });
       $('#judgmentmast-respondant_name').keydown(function(e){
    var count = $(this).val().split(';').length;
    var trim1 = $.trim($('#judgmentmast-respondant_name').val());
    $('#judgmentmast-respondant_name').val(trim1);
    });*/

$('#judgmentmast-jsub_catg_description').select(function() {
  alert( $(this).val());
});

    ");
 ?>



  
   
