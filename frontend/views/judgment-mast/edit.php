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
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['proof-read']];

?>
<style type="text/css">
  .tabs a{
    display: inline-block;
    width: 10%;
  }
.tabs .btn.btn-block.btn-primary{
  margin: 2px;
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
    /*if(!empty($JudgmentElement)){ $element           =  '/judgment-element/index'; $elementcls = "btn-success"; } else { $element =  '/judgment-element/create'; $elementcls = "btn-warning"; }*/
    
    /*if(!empty($JudgmentDatapoints)){ $datapoints   =  '/judgment-data-point/update'; $datapointscls = "btn-success";} else { $datapoints =  '/judgment-data-point/create1'; $datapointscls = "btn-warning"; }*/ 
   
?>

<div class="tabs" style="display: none;">
<?= Html::a('Edit Judgments',['/judgment-mast/edit','id'=>$doc_id],["class"=>"btn btn-block ".$mastcls ]) ?>
<?= Html::a('Single Value FDP',['/judgment-mast/update','doc_id'=>$doc_id],["class"=>"btn btn-block ".$mastcls ]) ?>
<?php echo Html::a('Lawyers',[$advocate,'doc_id'=>$doc_id],["class"=>"btn btn-block ".$advocatecls ]) ?>
<?= Html::a('Judges',[$judge,'doc_id'=>$doc_id],["class"=>"btn btn-block ".$judgecls ]) ?>
<?= Html::a('Citations',[$citation,'doc_id'=>$doc_id],["class"=>"btn btn-block ".$citationcls ]) ?>
<?= Html::a('Parties',[$parties,'doc_id'=>$doc_id],["class"=>"btn btn-block ".$partiescls ]) ?>
<?php echo Html::a('Referred',[$ref,'doc_id'=>$doc_id],["class"=>"btn btn-block ".$refcls ]) ?>
<?php echo Html::a('Acts & Sections',[$act,'doc_id'=>$doc_id],["class"=>"btn btn-block ".$actcls ]) ?>
<?php echo Html::a('Tags',[$tag,'doc_id'=>$doc_id],["class"=>"btn btn-block ".$tagcls ]) ?>
<?php //echo Html::a('Abstract',['judgment-mast/judgment-abstract','jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"margin:2px","class"=>"btn btn-block  ".$actcls ]) ?>

<?php //echo Html::a('Judgment Elements',[$element,'jcode'=>$jcode,'doc_id'=>$doc_id],["style"=>"width:12%","class"=>"btn btn-block  ".$elementcls ]) ?>
<?php //echo Html::a('Judgment DataPoints',[$datapoints,'jcode'=>$jcode],["style"=>"width:12%","class"=>"btn btn-block  ".$datapointscls ]) ?>
</div>  
<!---code for tabs------->


<!------start of form------>
<br>
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
               <?= $form->field($model, 'prstatus')->checkBox()->label('<b>Check The box once you have completed all editing of the judgment text. Tabs for other Fixed data point will be displayed only after you complete the editing and check the box. Click on submit button after check the checkbox.</b>') ?>
                
                <?= $form->field($model, 'judgment_text')->textarea(['rows' => 8]) ?>
                
            </div>
            <div class="col-md-12 col-xs-12">
                
                <?= $form->field($model, 'judgment_text1')->textarea(['readonly'=>true]) ?>
                </div>
             <div class="col-md-12 col-xs-12">
                
                <?= $form->field($model, 'judgment_text_data_remove')->textarea([]) ?>
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
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_text_data_remove',{toolbar : 'Basic'})");
    $this->registerJs("

    $('#judgmentmast-edit_status').on('click',function(){
      confirm('Once submitted it can not be update again. Are you sure ? ');
    //console.log('test');
     //$('.tabs').toggle();

    });

    ");
?>



