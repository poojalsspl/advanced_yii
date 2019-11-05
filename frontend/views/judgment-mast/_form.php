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
<?php

 $jcode = $model->judgment_code;
 $doc_id = $model->doc_id;

$master = JudgmentMast::find()->where(['judgment_code'=>$jcode])->one();
    $JudgmentAct         = $master->judgmentActs;
    $JudgmentAdvocate    = $master->judgmentAdvocates;
    $JudgmentJudge       = $master->judgmentJudges;
   // $JudgmentAct         = $master->judgmentActs;
    $JudgmentCitation    = $master->judgmentCitations;
    $JudgmentParties     = $master->judgmentParties;
    $JudgmentElement     = $master->judgmentElement;
    $JudgmentDatapoints  = $master->judgmentDatapoints;
    $JudgmentReferred    = $master->judgmentReferred;

    $mastcls = "btn-success";
    /*if(!empty($JudgmentAct)){ $act           =  '/judgment-act/update'; $actcls = "btn-success"; } else { $act =  '/judgment-act/create'; $actcls = "btn-warning"; }*/
    if(!empty($JudgmentAdvocate)){ $advocate =  '/judgment-advocate/update'; $advocatecls = "btn-success"; } else { $advocate =  '/judgment-advocate/create'; $advocatecls = "btn-warning";}
    if(!empty($JudgmentJudge)){  $judge      =  '/judgment-judge/update';  $judgecls = "btn-success";} else { $judge =  '/judgment-judge/create'; $judgecls = "btn-warning"; }
    
    if(!empty($JudgmentCitation)){ $citation =  '/judgment-citation/update'; $citationcls = "btn-success";} else { $citation =  '/judgment-citation/create';  $citationcls = "btn-warning"; } 
    if(!empty($JudgmentAct)){ $act           =  '/judgment-act/update'; $actcls = "btn-success"; } else { $act =  '/judgment-act/create'; $actcls = "btn-warning"; }  
    if(!empty($JudgmentReferred)){ $ref           =  '/judgment-ref/update'; $refcls = "btn-success"; } else { $ref =  '/judgment-ref/create'; $refcls = "btn-warning"; }
   
    if(!empty($JudgmentElement)){ $element           =  '/judgment-element/index'; $elementcls = "btn-success"; } else { $element =  '/judgment-element/create'; $elementcls = "btn-warning"; }
    if(!empty($JudgmentParties)){ $parties   =  '/judgment-parties/update'; $partiescls = "btn-success";} else { $parties =  '/judgment-parties/create'; $partiescls = "btn-warning"; }
    if(!empty($JudgmentDatapoints)){ $datapoints   =  '/judgment-data-point/update'; $datapointscls = "btn-success";} else { $datapoints =  '/judgment-data-point/create1'; $datapointscls = "btn-warning"; }
?>

<div class="tabs">

<?= Html::a('Judgments',['/judgment-mast/update','id'=>$jcode],["class"=>"btn btn-block  ".$mastcls ]) ?>

<?php echo Html::a('Lawyers Appeared',[$advocate,'jcode'=>$jcode,'doc_id'=>$doc_id],["class"=>"btn btn-block  ".$advocatecls ]) ?>
<?= Html::a('Judges Bench',[$judge,'jcode'=>$jcode,'doc_id'=>$doc_id],["class"=>"btn btn-block  ".$judgecls ]) ?>

<?= Html::a('Citations',[$citation,'jcode'=>$jcode,'doc_id'=>$doc_id],["class"=>"btn btn-block  ".$citationcls ]) ?>
<?= Html::a('Parties',[$parties,'jcode'=>$jcode,'doc_id'=>$doc_id],["class"=>"btn btn-block  ".$partiescls ]) ?>
<?php echo Html::a('Acts & Sections',[$act,'jcode'=>$jcode,'doc_id'=>$doc_id],["class"=>"btn btn-block  ".$actcls ]) ?>
<?php echo Html::a('Judgment Referred',[$ref,'jcode'=>$jcode],["style"=>"width:12%","class"=>"btn btn-block  ".$refcls ]) ?>
<?php echo Html::a('Judgment Elements',[$element,'id'=>'','jcode'=>$jcode,'value'=>'FACTS'],["style"=>"width:12%","class"=>"btn btn-block  ".$elementcls ]) ?>
<?php echo Html::a('Judgment DataPoints',[$datapoints,'jcode'=>$jcode],["style"=>"width:12%","class"=>"btn btn-block  ".$datapointscls ]) ?>

<!-- <span style="float:right; border: 1px solid red; background-color: red;"><a href="../judgment-mast/index"  style="color: white" class="btn btn-block red"><b>Judgment Allocated</b></a></span> -->
</div>  

<!---end of code for tabs------->

<!------start of form------>
<div class="template">
    <div class ="body-content">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-12">

            <?php
  if(!$model->isNewRecord){
      $model->judgment_title       =  htmlspecialchars_decode($model->judgment_title);
      $model->court_name           =  htmlspecialchars_decode($model->court_name);
      $model->appellant_name       =  htmlspecialchars_decode($model->appellant_name);
      $model->appellant_adv        =  htmlspecialchars_decode($model->appellant_adv);
      $model->respondant_adv       =  htmlspecialchars_decode($model->respondant_adv);
      $model->judges_name          =  htmlspecialchars_decode($model->judges_name);
      $model->judgment_source_name =  htmlspecialchars_decode($model->judgment_source_name);

  }

 ?>
<div class="row">
  <div class="box box-blue">
     <div class="box-body">
        <div class="col-md-12">
            <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'court_name')->textInput(['readonly'=> true]);?> 
                           
           <?= $form->field($model, 'court_code')->hiddenInput(['readonly'=>true])->label(false); ?>
           <?=  $form->field($model, 'appeal_numb')->textInput() ?>  
           <?= $form->field($model, 'judgment_type')->dropDownList(["0"=>'Order', "1"=>"Oral Order","2"=>"Judgment"],['prompt'=>'Select Appeal Status']) ?>                           
             </div>
        <div class="col-md-4 col-xs-12">
<?php
$benchType    = ArrayHelper::map(JudgmentBenchType::find()->all(), 'bench_type_id', 'bench_type_text'); 
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
                        <div class="col-md-12">
                <div class="col-md-12 col-xs-12">
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
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_abstract',{toolbar : 'Basic'})");

?>
<?php 
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_text',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_text1',{toolbar : 'Basic'})");
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

