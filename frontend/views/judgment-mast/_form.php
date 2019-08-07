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

<div class="template">
    <div class ="body-content">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-12">

            
            <div class="row">
                <div class="box box-blue">
                   
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-4 col-xs-12">
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

<?= $form->field($model, 'court_code')->hiddenInput(['readonly'=>true])->label(false); ?>
     <?=  $form->field($model, 'appeal_numb')->textInput() ?>  
      <?= $form->field($model, 'judgment_type')->dropDownList(["0"=>'Order', "1"=>"Oral Order","2"=>"Judgment"],['prompt'=>'Select Appeal Status']) ?>                           
                            </div>
                            <div class="col-md-4 col-xs-12">
                              
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
          <?= $form->field($model, 'judgment_ext_remark_flag')->dropDownList(["0"=>'Yes', "1"=>"No"],['prompt'=>'Select Remark Flag']) ?>  

                                
                            </div>
                            <div class="col-md-4 col-xs-12">
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
                               
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            <div class="row">
                <div class="box box-blue">
                   
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-4 col-xs-12">
         
 <?= $form->field($model, 'judgment_title')->textInput(['maxlength' => true]) ?>
 

                                
                            </div>
                            <div class="col-md-4 col-xs-12">
                              



<?=  $form->field($model, 'appellant_name')->textInput() ?>
                                    

                               </div>
                            <div class="col-md-4 col-xs-12">
                               
                                 
  <?=  $form->field($model, 'respondant_name')->textInput() ?>   

                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        <div class="row">
                <div class="box box-blue">
                   
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-6 col-xs-12">
         
 
  <?= $form->field($model, 'judgment_abstract')->textarea(['rows' => 6]) ?>

                                
                            </div>
                            <div class="col-md-6 col-xs-12">
                              

<?= $form->field($model, 'judgment_text')->textarea(['rows' => 6]) ?>
                               
                                
                              
</div>
 
                        </div>
                    </div>

                </div>
            </div>




            <div class="form-group" style="text-align: center">
                <div class="col-md-4 col-md-offset-4">
                   
                    <?= Html::submitButton('Submit', ['class' => 'btn-block btn theme-blue-button ']) ?>
                </div>
                
            </div>
        
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<script type="text/javascript">
function master1()
{
  var court_code = $('#judgmentmast-court_code').val();
  var court_name = $('#judgmentmast-court_name').val();
  var appeal_numb = $('#judgmentmast-appeal_numb').val();
  var judgment_date = $('#judgmentmast-judgment_date').val();
  var judgment_title = $('#judgmentmast-judgment_title').val();
 
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

