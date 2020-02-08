<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use frontend\models\JsubCatgMast;
use frontend\models\JcatgMast;
use frontend\models\JudgmentMast;
use frontend\models\CityMast;
use frontend\models\CourtMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\daterange\DateRangePicker;
use frontend\models\JudgmentBenchType;
use frontend\models\JudgmentDisposition;
use frontend\models\JudgmentJurisdiction;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentMast */
/* @var $form yii\widgets\ActiveForm */
$cache = Yii::$app->cache;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['index']];

?>
<style type="text/css">
  .tabs a{
    display: inline-block;
    width: 10%;
  }

</style>
<!---code for tabs------->


<!------start of form------>
<div class="template">
    <div class ="body-content">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-12">

            <?php
  if(!$model->isNewRecord){
      $model->judgment_title       =  htmlspecialchars_decode($model->judgment_title);
      $model->court_name           =  htmlspecialchars_decode($model->court_name);
      //$model->appellant_name       =  htmlspecialchars_decode($model->appellant_name);
      //$model->appellant_adv        =  htmlspecialchars_decode($model->appellant_adv);
      //$model->respondant_adv       =  htmlspecialchars_decode($model->respondant_adv);
      //$model->judges_name          =  htmlspecialchars_decode($model->judges_name);
     // $model->judgment_source_name =  htmlspecialchars_decode($model->judgment_source_name);

  }

 ?>
<div class="row">
  <div class="box box-blue">
     <div class="box-body">
        <div class="col-md-12">
            <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'court_name')->textInput(['readonly'=> true]);?> 
                           
           <?= $form->field($model, 'court_code')->hiddenInput(['readonly'=>true])->label(false); ?>
           <?php $appeal_hint = '(crl.) 1230 of  1998'?>
           <?=  $form->field($model, 'appeal_numb',['hintType' => ActiveField::HINT_SPECIAL])->hint($appeal_hint) ?> 

           <?= $form->field($model, 'judgment_type')->dropDownList(["0"=>'Order', "1"=>"Oral Order","2"=>"Judgment"],['prompt'=>'Select Judgment Type']) ?>                           
             </div>
        <div class="col-md-4 col-xs-12">
<?php
$benchType    = ArrayHelper::map(JudgmentBenchType::find()->all(), 'bench_type_id', 'bench_type_text'); 
$disposition  = ArrayHelper::map(JudgmentDisposition::find()->all(), 'disposition_id', 'disposition_text'); 
$jurisdiction = ArrayHelper::map(JudgmentJurisdiction::find()->all(), 'judgment_jurisdiction_id', 'judgment_jurisdiction_text'); 
$jcatg_description = ArrayHelper::map(JcatgMast::find()->all(),'jcatg_id','jcatg_description');

?>

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
           <?php /*echo $form->field($model, 'jcatg_id')->widget(Select2::classname(), [
          
          'data' => $j_catg,
          //'language' => '',
          'options' => ['placeholder' => 'Select judgment category'],
          'pluginEvents'=>[
            ]
          ]);*/ ?> 

          <?= $form->field($model, 'jcatg_description')->widget(Select2::classname(), [
            'data' => $jcatg_description,           
            'options' => ['placeholder' => 'Select Judgment Category','value' => ($model->jcatg_id != "") ? $model->jcatg_id : ''],
      'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();                
              $('#judgmentmast-jcatg_id').val(val);
                    $.ajax({
                      url      : '/advanced_yii/judgment-mast/jsubcateg?id='+val,
                      dataType : 'json',
                      success  : function(data) {                                 
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

      <?= $form->field($model, 'jcatg_id')->HiddenInput(['readonly'=>true])->label(false); ?>
          
        </div>
        <div class="col-md-4 col-xs-12">
        <?= $form->field($model, 'judgment_jurisdiction_id')->widget(Select2::classname(), [
          
          'data' => $jurisdiction,
          //'language' => '',
          'options' => ['placeholder' => 'Select judgment_jurisdiction'],
          'pluginEvents'=>[
            ]
          ]); ?>
          <?= $form->field($model, 'judgment_date',['hintType' => ActiveField::HINT_SPECIAL])->widget(DateRangePicker::classname(), [
      'pluginOptions'=>[
          'singleDatePicker'=>true,
          'showDropdowns'=>true,
          'locale'=>['format' => 'YYYY-MM-DD'],
      ],
  ])->hint('YYYY-MM-DD');
    ?>
     <?php 
      $jsub_catg_description = ($model->jsub_catg_id != "") ?  ArrayHelper::map(JsubCatgMast::find()->where(["jsub_catg_id"=>$model->jsub_catg_id])->all(), 'jsub_catg_id', 'jsub_catg_description') : "" ; ?>
    
      <?= $form->field($model, 'jsub_catg_description')->dropDownList([
        'data' => $jsub_catg_description,
        'prompt' => 'Select sub category'
        ]);?>
        <?= $form->field($model, 'jsub_catg_id')->HiddenInput(['readonly'=>true])->label(false); ?>
      
   
                               
        </div>
  </div>
  <div class="col-md-12">
    <div class="col-md-10 col-xs-12">
      <?php $tag_hint = 'Generate tag from judgment in this format  '."<b>tag:percentagevalue;</b>".'  Eg if the judgment has 5 tags then it should be generated in this format '."<br>".'Search tag1:40; Search tag2:25; Search tag3:35; Search tag4:55; Search tag5:45'?>
     <?=  $form->field($model, 'search_tag',['hintType' => ActiveField::HINT_SPECIAL])->textInput()->label('Search Tag(insert multiple values with semicolon(;)')->hint($tag_hint) ?> 
   </div>
   <div class="col-md-2 col-xs-12">
    <label>Search Tag Count</label>
    <input type="" name="" id="judgmentmast-search_tag_count" readonly="readonly" class="form-control">
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
<?= $form->field($model, 'judgment_title') ?>
              </div>
              <div class="col-md-6 col-xs-12">
                <?= $form->field($model, 'overruled_by_judgment') ?>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="box box-blue">
      <div class="box-body">
          <div class="col-md-12">


              <div class="col-md-12 col-xs-12">
                <?php $remark_hint = 'If any Fixed data point are not available in the displayed judgment text, Search the same judgments on Google and find the fixed data points.'."<br>".'Extra marks will be provided for fixed data point that were generated from judgments searched on Google.'."<br><b>E.g</b> ".'if case number is not available and is located from same judgement that was searched on Google then copy paste like'."<br>".'Case Number : CRIMINAL APPEAL NO. 655 OF 2002'."<br>".'do not fill the data in the fields provided'?>
<?= $form->field($model, 'remark',['hintType' => ActiveField::HINT_SPECIAL])->textarea(['maxlength' => true,'rows'=>6])->label()->hint($remark_hint) ?>
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
                 <?= $form->field($model, 'judgment_text')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6 col-xs-12">
                <?= $form->field($model, 'judgment_text1')->textarea(['readonly'=>true]) ?>
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
<!------end of form------>

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
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_text',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_text1',{toolbar : 'Basic'})");
?>

 <?php

$this->registerJs("$('#judgmentmast-search_tag').keyup(function(e){
    var count = $(this).val().split(';').length;
  
    $('#judgmentmast-search_tag_count').val(count);
    });
 /* $('#judgmentmast-respondant_adv').keyup(function(e){
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
    });*/

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

