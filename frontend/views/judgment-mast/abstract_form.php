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

<?php


if($_GET)
{
  $doc_id = $_GET['doc_id'];

    
}

/*if(!empty($JudgmentElement)){ $element           =  '/judgment-element/index'; $elementcls = "btn-success"; } else { $element =  '/judgment-element/create'; $elementcls = "btn-warning"; }
if(!empty($JudgmentDatapoints)){ $datapoints   =  '/judgment-data-point/update'; $datapointscls = "btn-success";} else { $datapoints =  '/judgment-data-point/create1'; $datapointscls = "btn-warning"; }*/

?>


<br><br>
<!------start of form------>
<div class="template">
  <div class="box box-blue">
    <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
    <div class ="body-content">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-12">


<div class="row">

        <div class="col-md-12">
            <div class="col-md-4 col-xs-12">
            <?= $form->field($model, 'court_name')->textInput(['readonly'=> true]);?> 
                           
            <?= $form->field($model, 'court_code')->hiddenInput(['readonly'=>true])->label(false); ?>
           </div>
             <div class="col-md-6 col-xs-12">
               <?=  $form->field($model, 'judgment_title')->textInput(['readonly'=> true]); ?>
             </div>
             
         </div>
         <div class="col-md-12">
         <div class="col-md-6 col-xs-12">
               <?=  $form->field($model, 'hnstatus')->checkBox()->label('Check and submit when abstract is written completely'); ?>
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
</div>
<!------end of form------>

 <?= $this->render("/judgment-mast/judgment_text_add") ?>

<?php 
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_abstract',{toolbar : 'Basic'})");
   
?>



