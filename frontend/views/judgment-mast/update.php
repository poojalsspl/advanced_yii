<?php

use yii\helpers\Html;
use frontend\models\JsubCatgMast;
use frontend\models\JcatgMast;
use frontend\models\JudgmentMast;
use frontend\models\CityMast;
use frontend\models\CourtMast;
use yii\helpers\ArrayHelper;

use kartik\form\ActiveForm;
use kartik\form\ActiveField;

use frontend\models\JudgmentBenchType;
use frontend\models\JudgmentDisposition;
use frontend\models\JudgmentJurisdiction;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentMast */

$this->title = 'Fixed Data Points';
/*$this->params['breadcrumbs'][] = ['label' => 'Judgment Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judgment_code, 'url' => ['view', 'id' => $model->judgment_code]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<div class="judgment-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>
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

    $mastcls = "btn-primary";
    /*if(!empty($JudgmentAct)){ $act           =  '/judgment-act/update'; $actcls = "btn-success"; } else { $act =  '/judgment-act/create'; $actcls = "btn-warning"; }*/
    if(!empty($JudgmentAdvocate)){ $advocate =  '/judgment-advocate/update'; $advocatecls = "btn-primary"; } else { $advocate =  '/judgment-advocate/create'; $advocatecls = "btn-primary";}
    if(!empty($JudgmentJudge)){  $judge      =  '/judgment-judge/update';  $judgecls = "btn-primary";} else { $judge =  '/judgment-judge/create'; $judgecls = "btn-primary"; }
    
    if(!empty($JudgmentCitation)){ $citation =  '/judgment-citation/update'; $citationcls = "btn-primary";} else { $citation =  '/judgment-citation/create';  $citationcls = "btn-primary"; } 
    if(!empty($JudgmentParties)){ $parties   =  '/judgment-parties/update'; $partiescls = "btn-primary";} else { $parties =  '/judgment-parties/create'; $partiescls = "btn-primary"; }

    if(!empty($JudgmentReferred)){ $ref           =  '/judgment-ref/update'; $refcls = "btn-primary"; } else { $ref =  '/judgment-ref/create'; $refcls = "btn-primary"; }
    if(!empty($JudgmentAct)){ $act           =  '/judgment-act/update'; $actcls = "btn-primary"; } else { $act =  '/judgment-act/create'; $actcls = "btn-primary"; }  
    
   
    /*if(!empty($JudgmentElement)){ $element           =  '/judgment-element/index'; $elementcls = "btn-success"; } else { $element =  '/judgment-element/create'; $elementcls = "btn-warning"; }*/
    
    /*if(!empty($JudgmentDatapoints)){ $datapoints   =  '/judgment-data-point/update'; $datapointscls = "btn-success";} else { $datapoints =  '/judgment-data-point/create1'; $datapointscls = "btn-warning"; }*/
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

<!-- <span style="float:right; border: 1px solid red; background-color: red;"><a href="../judgment-mast/index"  style="color: white" class="btn btn-block red"><b>Judgment Allocated</b></a></span> -->
</div>  

<!---end of code for tabs------->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
