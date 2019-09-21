<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
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
    //$JudgmentAct         = $master->judgmentActs;
    $JudgmentAdvocate    = $master->judgmentAdvocates; //functions available in JudgmentMast model 
    $JudgmentJudge       = $master->judgmentJudges;//like (getJudgmentAdvocates, getJudgmentParties etc)
    $JudgmentAct         = $master->judgmentActs;
    $JudgmentCitation    = $master->judgmentCitations;
    $JudgmentParties     = $master->judgmentParties;
    $JudgmentElement     = $master->judgmentElement;
    //print_r($JudgmentElement);
    $mastcls = "btn-success";
   if(!empty($JudgmentAdvocate)){ $advocate =  '/judgment-advocate/update'; $advocatecls = "btn-success"; } else { $advocate =  '/judgment-advocate/create'; $advocatecls = "btn-warning";}
    if(!empty($JudgmentJudge)){  $judge      =  '/judgment-judge/update';  $judgecls = "btn-success";} else { $judge =  '/judgment-judge/create'; $judgecls = "btn-warning"; }
    
    if(!empty($JudgmentCitation)){ $citation =  '/judgment-citation/update'; $citationcls = "btn-success";} else { $citation =  '/judgment-citation/create';  $citationcls = "btn-warning"; }   
   
    if(!empty($JudgmentAct)){ $act           =  '/judgment-act/update'; $actcls = "btn-success"; } else { $act =  '/judgment-act/create'; $actcls = "btn-warning"; }

    if(!empty($JudgmentElement)){ $element           =  '/judgment-element/update'; $elementcls = "btn-success"; } else { $element =  '/judgment-element/create'; $elementcls = "btn-warning"; }

    if(!empty($JudgmentParties)){ $parties   =  '/judgment-parties/update'; $partiescls = "btn-success";} else { $parties =  '/judgment-parties/create'; $partiescls = "btn-warning"; }
?>

<div class="tabs">

<?= Html::a('Judgments',['/judgment-mast/update','id'=>$jcode],["class"=>"btn btn-block  ".$mastcls ]) ?>
<?php //Html::a('Act',[$act,'jcount' =>'','jyear'=>'','jcode'=>$code],["class"=>"btn btn-block  ".$actcls ]) ?>
<?php echo Html::a('Lawyers Appeared',[$advocate,'jcode'=>$jcode,'doc_id'=>$doc_id],["class"=>"btn btn-block  ".$advocatecls ]) ?>
<?= Html::a('Judges Bench',[$judge,'jcode'=>$jcode,'doc_id'=>$doc_id],["class"=>"btn btn-block  ".$judgecls ]) ?>

<?= Html::a('Citations',[$citation,'jcode'=>$jcode,'doc_id'=>$doc_id],["class"=>"btn btn-block  ".$citationcls ]) ?>
<?= Html::a('Parties',[$parties,'jcode'=>$jcode,'doc_id'=>$doc_id],["class"=>"btn btn-block  ".$partiescls ]) ?>
<?php echo Html::a('Acts & Sections',[$act,'jcode'=>$jcode,'doc_id'=>$doc_id],["class"=>"btn btn-block  ".$actcls ]) ?>
<?php echo Html::a('Judgment Elements',[$element,'jcode'=>$jcode],["class"=>"btn btn-block  ".$elementcls ]) ?>


<?= Html::a('Judgment DataPoints') ?>
</div>  
<!---end of code for tabs------->