		<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;

use yii\helpers\ArrayHelper;

use yii\helpers\Url;
use yii\bootstrap\Tabs;


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
	$JudgmentAct       = $master->judgmentActs;

	$JudgmentAdvocate  = $master->judgmentAdvocates;
	$JudgmentCitation  = $master->judgmentCitations;
	$JudgmentExtRemark = $master->judgmentExtRemark;
	$JudgmentJudge     = $master->judgmentJudges;
	$JudgmentParties   = $master->judgmentParties;
/*	print_r($JudgmentParties);
	exit();*/
$form = ActiveForm::begin(['id' => 'contact-form']); ?>
<?= Tabs::widget([
        'items' => [
            [
                'label' => 'Master',
                'content' => $this->render('/judgment-mast/view', ['model' =>JudgmentMast::findOne($code) , 'id' => $code]),
                'active' => true
            ],
            [
                'label' => 'Act',
                'content' => (!empty($JudgmentAct)) ? $this->render('/judgment-act/view', ['model' => JudgmentAct::findOne($JudgmentAct[0]['jact']) , 'id' => $JudgmentAct[0]['jact']]) : '<h1>No Records Found</h1>'
            ],
           [
                'label' => 'Advocate',
                'content' =>(!empty($JudgmentAdvocate)) ? $this->render('/judgment-advocate/view', ['model' => JudgmentAdvocate::findOne($JudgmentAdvocate[0]['id']) , 'id' => $JudgmentAdvocate[0]['id']]) : '<h1>No Records Found</h1>'
            ],
             [
                'label' => 'Citation',
              	'content' =>(!empty($JudgmentCitation)) ? $this->render('/judgment-citation/view', ['model' => JudgmentCitation::findOne($JudgmentCitation[0]['id']) , 'id' => $JudgmentCitation[0]['id']]) : '<h1>No Records Found</h1>'
            ],
	           [
	                'label' => 'Ext-Mark',
	              	'content' =>(!empty($JudgmentExtRemark)) ? $this->render('/judgment-ext-remark/view', ['model' => JudgmentExtRemark::findOne($JudgmentExtRemark['judgment_code']) , 'id' => $JudgmentExtRemark['judgment_code']]) : '<h1>No Records Found</h1>',
	            ],
	             [
	                'label' => 'Coram',
	              	'content' =>(!empty($JudgmentJudge)) ? $this->render('/judgment-judge/view', ['model' => JudgmentJudge::findOne($JudgmentJudge[0]['id']) , 'id' => $JudgmentJudge[0]['id']]) : '<h1>No Records Found</h1>',
	            ],            
	            [
	                'label' => 'parties',
	                'content' =>(!empty($JudgmentParties)) ? $this->render('/judgment-parties/view', ['model' =>new JudgmentParties() , 'id' => $JudgmentParties[0]['judgment_party_id']]) : '<h1>No Records Found</h1>',
	            ],
        ]]);
 ?>
    <?php ActiveForm::end(); ?>


<?php
$customScript = <<< SCRIPT
	$("body").removeClass('sidebar-collapse');
SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);
 ?>
</div>

