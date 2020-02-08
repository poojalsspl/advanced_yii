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
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['abstract-list']];

?>
<style type="text/css">
  .tabs a{
    display: inline-block;
    width: 10%;
  }
</style>
<!---code for tabs------->
<?php

//echo  $jcode = $model->judgment_code;
//echo  $doc_id = $model->doc_id;

if($_GET)
{
  $jcode = $_GET['jcode'];echo "<br>";
  $doc_id = $_GET['doc_id'];

    
}

$master = JudgmentMast::find()->where(['judgment_code'=>$jcode])->one();
    $JudgmentAct         = $master->judgmentActs;
    $JudgmentAdvocate    = $master->judgmentAdvocates; //functions available in JudgmentMast model 
    $JudgmentJudge       = $master->judgmentJudges;//like (getJudgmentAdvocates, getJudgmentParties etc)
   // $JudgmentAct         = $master->judgmentActs;
    $JudgmentCitation    = $master->judgmentCitations;
    $JudgmentParties     = $master->judgmentParties;
    $JudgmentElement     = $master->judgmentElement;
    $JudgmentDatapoints  = $master->judgmentDatapoints;
    $JudgmentReferred    = $master->judgmentReferred;
    //print_r($JudgmentElement);
    $mastcls = "btn-primary";
   if(!empty($JudgmentAdvocate)){ $advocate =  '/judgment-advocate/update'; $advocatecls = "btn-primary"; } else { $advocate =  '/judgment-advocate/create'; $advocatecls = "btn-primary";}
    if(!empty($JudgmentJudge)){  $judge      =  '/judgment-judge/update';  $judgecls = "btn-primary";} else { $judge =  '/judgment-judge/create'; $judgecls = "btn-primary"; }
    
    if(!empty($JudgmentCitation)){ $citation =  '/judgment-citation/update'; $citationcls = "btn-primary";} else { $citation =  '/judgment-citation/create';  $citationcls = "btn-primary"; } 
    if(!empty($JudgmentParties)){ $parties   =  '/judgment-parties/update'; $partiescls = "btn-primary";} else { $parties =  '/judgment-parties/create'; $partiescls = "btn-primary"; } if(!empty($JudgmentReferred)){ $ref           =  '/judgment-ref/update'; $refcls = "btn-primary"; } else { $ref =  '/judgment-ref/create'; $refcls = "btn-primary"; }
   
    if(!empty($JudgmentAct)){ $act           =  '/judgment-act/update'; $actcls = "btn-primary"; } else { $act =  '/judgment-act/create'; $actcls = "btn-primary"; }
       
    /*if(!empty($JudgmentElement)){ $element           =  '/judgment-element/index'; $elementcls = "btn-success"; } else { $element =  '/judgment-element/create'; $elementcls = "btn-warning"; }
     if(!empty($JudgmentDatapoints)){ $datapoints   =  '/judgment-data-point/update'; $datapointscls = "btn-success";} else { $datapoints =  '/judgment-data-point/create1'; $datapointscls = "btn-warning"; }*/

?>

<div class="tabs">

<?= Html::a('Judgments',['/judgment-mast/update','id'=>$jcode],["style"=>"margin:2px","class"=>"btn btn-block  ".$mastcls ]) ?>

<?php echo Html::a('Lawyers Appeared',[$advocate,'jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"width:12%;margin:2px","class"=>"btn btn-block  ".$advocatecls ]) ?>
<?= Html::a('Judges Bench',[$judge,'jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$judgecls ]) ?>

<?= Html::a('Citations',[$citation,'jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$citationcls ]) ?>
<?= Html::a('Parties',[$parties,'jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$partiescls ]) ?>
<?php echo Html::a('Judgment Referred',[$ref,'jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"width:12%;margin:2px","class"=>"btn btn-block  ".$refcls ]) ?>
<?php echo Html::a('Acts & Sections',[$act,'jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$actcls ]) ?>
<?php echo Html::a('Abstract',['judgment-mast/judgment-abstract','jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$actcls ]) ?>

<?php //echo Html::a('Judgment Elements',[$element,'jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"width:12%","class"=>"btn btn-block  ".$elementcls ]) ?>
<?php //echo Html::a('Judgment DataPoints',[$datapoints,'jcode'=>$jcode],["style"=>"width:12%","class"=>"btn btn-block  ".$datapointscls ]) ?>


</div>  
<!---end of code for tabs------->


<!------start of form------>
<div class="template">
    <div class ="body-content">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-12">


<div class="row">

        <div class="col-md-12">
            <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'court_name')->textInput(['readonly'=> true]);?> 
                           
            <?= $form->field($model, 'court_code')->hiddenInput(['readonly'=>true])->label(false); ?>
           </div>
             <div class="col-md-4 col-xs-12">
               <?=  $form->field($model, 'judgment_title')->textInput(['readonly'=> true]); ?>
             </div>
         </div>
         <div class="col-md-12">
           <div class="col-md-12 col-xs-12">
              <?=  $form->field($model, 'judgment_abstract')->textarea(); ?>
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

 

<?php 
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_abstract',{toolbar : 'Basic'})");
   
?>



