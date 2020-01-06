<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JcatgMast;
use frontend\models\JsubCatgMast;
use frontend\models\CourtMast;
use frontend\models\JudgmentBenchType;
use frontend\models\JudgmentDisposition;
use frontend\models\JudgmentJurisdiction;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentMast */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="judgment-mast-form">

    <?php $form = ActiveForm::begin(); ?>

   
    

    <?= $form->field($model, 'court_name')->textInput(['readonly'=>true]) ?>
        
    <?= $form->field($model, 'appeal_numb')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'appeal_numb1')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'judgment_date')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'judgment_date1')->widget(DateRangePicker::classname(), [
      'pluginOptions'=>[
          'singleDatePicker'=>true,
          'showDropdowns'=>true,
          'locale'=>['format' => 'YYYY-MM-DD'],
      ],
  ]) ?>

    <?= $form->field($model, 'judgment_title')->textInput(['maxlength' => true,'readonly'=>true]) ?>
    <?php $disposition = ArrayHelper::map(JudgmentDisposition::find()->all(),'disposition_id','disposition_text')?>
    
    <?= $form->field($model, 'disposition_text')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'disposition_id1')->widget(Select2::classname(), [
       'data' => $disposition,
       'options' => ['placeholder' => 'Select Disposition'],
       'pluginEvents' => [] 
    ]) ?>

   <?php $bench_type = ArrayHelper::map(JudgmentBenchType::find()->all(),'bench_type_id','bench_type_text')?>
    <?= $form->field($model, 'bench_type_text')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'bench_type_id1')->widget(Select2::classname(), [
        'data' => $bench_type,
        'options' => ['placeholder' =>'Select Judgment Bench Type'],
        'pluginEvents' => []
    ]) ?>
    
  <?php $jurisdiction = ArrayHelper::map(JudgmentJurisdiction::find()->all(),'judgment_jurisdiction_id','judgment_jurisdiction_text')?>
    <?= $form->field($model, 'judgmnent_jurisdiction_text')->textInput(['readonly'=>true]) ?>
    
    <?= $form->field($model, 'judgment_jurisdiction_id1')->widget(Select2::classname(), [
        'data' => $jurisdiction,
        'options' => ['placeholder' =>'Select Judgment Jurisdiction'],
        'pluginEvents' => []
    ]) ?>
   
    <?= $form->field($model, 'judgment_abstract')->textarea(['readonly'=>true]) ?>
    
    <?= $form->field($model, 'judgment_text')->textarea(['rows' => 6,'readonly'=>true]) ?>

    <?= $form->field($model, 'judgment_text1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'search_tag')->textInput(['maxlength' => true,'readonly'=> true]) ?>
        
    <?= $form->field($model, 'judgment_type')->dropDownList(["0"=>'Order', "1"=>"Oral Order","2"=>"Judgment"],['prompt'=>'Select Judgment Type','readonly'=>true]) ?>   

    <?= $form->field($model, 'judgment_type1')->dropDownList(["0"=>'Order', "1"=>"Oral Order","2"=>"Judgment"],['prompt'=>'Select Judgment Type']) ?>

    <?= $form->field($model, 'jcatg_description')->textInput(['readonly'=>true]) ?>

    <?php $jcatg_description = ArrayHelper::map(JcatgMast::find()->all(),'jcatg_id','jcatg_description');?>

    
    <?= $form->field($model, 'jcatg_id1')->widget(Select2::classname(), [
          'data' => $jcatg_description,
          'options' => ['placeholder' => 'Select Judgment Category'],
          'pluginEvents'=>[
            ]
          ])->label('Judgment Category'); ?>   
   
    <?= $form->field($model, 'jsub_catg_description')->textInput(['readonly'=>true]) ?>

    <?php $jsub_catg = ArrayHelper::map(JsubCatgMast::find()->all(),'jsub_catg_id','jsub_catg_description');?>

    
    <?= $form->field($model,'jsub_catg_id1')->widget(Select2::classname(),[
      'data' => $jsub_catg,
      'options' => ['placeholder'=>'Select Judgment SubCategory'],
      'pluginEvents' =>[]
    ])->label('Judgment SubCategory');?>
        
    <?= $form->field($model, 'remark')->textInput(['maxlength' => true,'readonly'=> true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_abstract',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_text',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('judgmentmast-judgment_text1',{toolbar : 'Basic'})");

?>
