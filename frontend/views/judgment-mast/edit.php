<?php

use yii\helpers\Html;
use frontend\models\JudgmentMast;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
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

<?php
//$jcode = $model->judgment_code;
$doc_id = $model->doc_id;

$master = JudgmentMast::find()->where(['doc_id'=>$doc_id])->one();
$JudgmentAct         = $master->judgmentActs;
$JudgmentAdvocate    = $master->judgmentAdvocates;
$JudgmentJudge       = $master->judgmentJudges;
$JudgmentCitation    = $master->judgmentCitations;
$JudgmentParties     = $master->judgmentParties;
$JudgmentElement     = $master->judgmentElement;
$JudgmentDatapoints  = $master->judgmentDatapoints;
$JudgmentReferred    = $master->judgmentReferred;
$JudgmentTags        = $master->judgmentTags;
$mastcls = "btn-primary";

    if(!empty($JudgmentAdvocate)){ $advocate =  '/judgment-advocate/update'; $advocatecls = "btn-primary"; } else { $advocate =  '/judgment-advocate/create'; $advocatecls = "btn-primary";}
    if(!empty($JudgmentJudge)){  $judge      =  '/judgment-judge/update';  $judgecls = "btn-primary";} else { $judge =  '/judgment-judge/create'; $judgecls = "btn-primary"; }
    if(!empty($JudgmentCitation)){ $citation =  '/judgment-citation/update'; $citationcls = "btn-primary";} else { $citation =  '/judgment-citation/create';  $citationcls = "btn-primary"; } 
    if(!empty($JudgmentParties)){ $parties   =  '/judgment-parties/update'; $partiescls = "btn-primary";} else { $parties =  '/judgment-parties/create'; $partiescls = "btn-primary"; }
    if(!empty($JudgmentReferred)){ $ref           =  '/judgment-ref/update'; $refcls = "btn-primary"; } else { $ref =  '/judgment-ref/create'; $refcls = "btn-primary"; }
    if(!empty($JudgmentAct)){ $act           =  '/judgment-act/update'; $actcls = "btn-primary"; } else { $act =  '/judgment-act/create'; $actcls = "btn-primary"; }
    if(!empty($JudgmentTags)){ $tag           =  '/judgment-tags/update'; $tagcls = "btn-primary"; } else { $tag =  '/judgment-tags/create'; $tagcls = "btn-primary"; }  
   
?>

<div class="tabs">
<?= Html::a('Judgment1',['/judgment-mast/edit','id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$mastcls ]) ?>
<?= Html::a('Judgment2',['/judgment-mast/update','id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$mastcls ]) ?>
<?php echo Html::a('Lawyers Appeared',[$advocate,'doc_id'=>$doc_id],["style"=>"width:12%;margin:2px","class"=>"btn btn-block  ".$advocatecls ]) ?>
<?= Html::a('Judges Bench',[$judge,'doc_id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$judgecls ]) ?>
<?= Html::a('Citations',[$citation,'doc_id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$citationcls ]) ?>
<?= Html::a('Parties',[$parties,'doc_id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$partiescls ]) ?>
<?php echo Html::a('Judgment Referred',[$ref,'doc_id'=>$doc_id],["style"=>"width:12%;margin:2px","class"=>"btn btn-block  ".$refcls ]) ?>
<?php echo Html::a('Acts & Sections',[$act,'doc_id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$actcls ]) ?>
<?php echo Html::a('Judgment Tags',[$tag,'doc_id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$tagcls ]) ?>
<?php /*echo Html::a('Abstract',['judgment-mast/judgment-abstract','jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$actcls ])*/ ?>
</div>  
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

  }

 ?>

<div class="row">
  <div class="box box-blue">
      <div class="box-body">
          <div class="col-md-12">
              <div class="col-md-6 col-xs-12">
<?= $form->field($model, 'judgment_title') ?>
              </div>
          
          </div>
      </div>
  </div>
</div>
            





<div class="row">
    <div class="box box-blue">
        <div class="box-body">
            <div class="col-md-12">
               
                
                <?= $form->field($model, 'judgment_text')->textarea(['rows' => 8]) ?>
                
            </div>
            <div class="col-md-12 col-xs-12">
                
                <?= $form->field($model, 'judgment_text1')->textarea(['readonly'=>true]) ?>
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



<?php 
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_text',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_text1',{toolbar : 'Basic'})");
?>



