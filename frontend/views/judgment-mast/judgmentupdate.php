<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;

use yii\helpers\ArrayHelper;

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentAct */
/* @var $form yii\widgets\ActiveForm */



?>

<div class="judgment-act-form">

<?php 
$code = '';
if($_GET){
$code = $_GET['code'];
}
$master = JudgmentMast::find()->where(['judgment_code'=>$code])->one();
	//$JudgmentAct         = $master->judgmentActs;
	//$JudgmentAdvocate    = $master->judgmentAdvocates;
	$JudgmentCitation    = $master->citation;
	//$JudgmentExtRemark   = $master->judgmentExtRemark;
	$JudgmentJudge       = $master->judges_name;
	//$JudgmentParties     = $master->judgmentParties;
	/*$judgmentOverrules   = $master->judgmentOverrules;
	$judgmentOverruledby = $master->judgmentOverruledby;
	$judgmentRef = $master->judgmentRefs;
	$judgmentCitedby = $master->judgmentCitedby;*/

	$mastcls = "btn-success";
	/*if(!empty($JudgmentAct)){ $act           =  '/judgment-act/update'; $actcls = "btn-success"; } else { $act =  '/judgment-act/create'; $actcls = "btn-warning"; }
	if(!empty($JudgmentAdvocate)){ $advocate =  '/judgment-advocate/update'; $advocatecls = "btn-success"; } else { $advocate =  '/judgment-advocate/create'; $advocatecls = "btn-warning";}*/
	if(!empty($JudgmentCitation)){ $citation =  '/judgment-citation/update'; $citationcls = "btn-success";} else { $citation =  '/judgment-citation/create';  $citationcls = "btn-warning"; }	
	/*if(!empty($JudgmentExtRemark)){ $ext     =  '/judgment-ext-remark/update'; $extcls = "btn-success";} else { $ext =  '/judgment-ext-remark/create'; $extcls = "btn-warning"; }*/
	if(!empty($JudgmentJudge)){  $judge      =  '/judgment-judge/update';  $judgecls = "btn-success";} else { $judge =  '/judgment-judge/create'; $judgecls = "btn-warning"; }
	/*if(!empty($JudgmentParties)){ $parties   =  '/judgment-parties/update'; $partiescls = "btn-success";} else { $parties =  '/judgment-parties/create'; $partiescls = "btn-warning"; }
	if(!empty($judgmentOverrules)){ $overrules   =  '/judgment-overrules/update'; $overrulescls = "btn-success"; } else { $overrules =  '/judgment-overrules/create'; $overrulescls = "btn-warning"; }
	if(!empty($judgmentOverruledby)){ $overruledby   =  '/judgment-overruledby/update'; $overruledbycls = "btn-success";} else { $overruledby =  '/judgment-overruledby/create'; $overruledbycls = "btn-warning"; }
	if(!empty($judgmentRef)){ $jdgref   =  '/judgment-ref/update'; $jdgrefcls = "btn-success";} else { $jdgref =  '/judgment-ref/create'; $jdgrefcls = "btn-warning"; }
	if(!empty($judgmentCitedby)){ $citedby   =  '/judgment-cited-by/update'; $citedbycls = "btn-success";} else { $citedby =  '/judgment-cited-by/create'; $citedbycls = "btn-warning"; }*/

 ?>
<div id="w1-container" class="table-responsive kv-grid-container"><table class="kv-grid-table table table-hover table-bordered table-striped kv-table-wrap"><thead>

<tr><th data-col-seq="0" style="width: 99.91%;"><a href="/backend/index.php?r=english-tagging-management%2Ftags&amp;sort=tab_name" data-sort="tab_name">Update Master</a></th></tr>

</thead>
<tbody>
<tr data-key="8"><td style="float:left; width:300px" data-col-seq="0">
<?= Html::a('Mast',['/judgment-mast/update','id'=>$code],["class"=>"btn btn-block  ".$mastcls ]) ?>
<?php //Html::a('Act',[$act,'jcount' =>'','jyear'=>'','jcode'=>$code],["class"=>"btn btn-block  ".$actcls ]) ?>
<?php // Html::a('Advocate',[$advocate,'jcount' =>'','jyear'=>'','jcode'=>$code],["class"=>"btn btn-block  ".$advocatecls ]) ?>
<?php //Html::a('Citations',[$citation,'jcount' =>'','jyear'=>'','jcode'=>$code],["class"=>"btn btn-block  ".$citationcls ]) ?>
<?= Html::a('Citations',[$citation,'id'=>$code],["class"=>"btn btn-block  ".$citationcls ]) ?>
<?php //Html::a('Ext-Ref',[$ext,'jcount' =>'','jyear'=>'','jcode'=>$code],["class"=>"btn btn-block  ".$extcls ]) ?>
<?php //Html::a('Coram',[$judge,'jcount' =>'','jyear'=>'','jcode'=>$code],["class"=>"btn btn-block  ".$judgecls ]) ?>
<?= Html::a('Coram',[$judge,'id'=>$code],["class"=>"btn btn-block  ".$judgecls ]) ?>
<?php //Html::a('Parties',[$parties,'jcount' =>'','jyear'=>'','jcode'=>$code],["class"=>"btn btn-block  ".$partiescls ]) ?>
<?php //Html::a('Overrules',[$overrules,'jcount' =>'','jyear'=>'','jcode'=>$code],["class"=>"btn btn-block  ".$overrulescls ]) ?>
<?php //Html::a('Overruledby',[$overruledby,'jcount' =>'','jyear'=>'','jcode'=>$code],["class"=>"btn btn-block  ".$overruledbycls ]) ?>
<?php //Html::a('JudgmentRef',[$jdgref,'jcount' =>'','jyear'=>'','jcode'=>$code],["class"=>"btn btn-block  ".$jdgrefcls ]) ?>
<?php //Html::a('Citedby',[$citedby,'jcount' =>'','jyear'=>'','jcode'=>$code],["class"=>"btn btn-block  ".$citedbycls ]) ?>
<!-- <a class="btn btn-block btn-primary" href="/backend/index.php?r=english-tagging-management%2Ftagsarticle&amp;category_id=8">Trending Now</a> -->
</td>
</tr>
</tbody>
</table>
</div>      
<?php
$customScript = <<< SCRIPT
	$("body").removeClass('sidebar-collapse');
SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);
 ?>
</div>

