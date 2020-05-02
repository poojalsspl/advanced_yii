<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use frontend\models\ArticleCatgMast;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\WebArticles */
/* @var $form yii\widgets\ActiveForm */
?>

 <div class="template">
    <div class ="body-content">

    <?php $form = ActiveForm::begin(); ?>
<div class="col-md-12">
    <div class="row">
  <div class="box box-blue">
     <div class="box-body">
        <div class="col-md-12">
            <div class="col-md-4 col-xs-12">
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'sef_description')->textarea(['rows' => 2]) ?>
    <?= $form->field($model, 'status')->dropDownList(["1"=>'Published', "0"=>"Not to be published"],['prompt'=>'Select']);?> 
    
    
    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
    </div>
     
     <div class="col-md-4 col-xs-12">
   <?php
$articleCategory = ArrayHelper::map(ArticleCatgMast::find()->all(), 'art_catg_id', 'art_catg_name');  
?>    
    
    <?= $form->field($model, 'art_catg_id')->widget(Select2::classname(), [
        'data' => $articleCategory,
        'options' => ['placeholder' => 'Select Article Category'],
         'pluginEvents'=>[
          ]
          ]); ?>
   <?= $form->field($model, 'sef_keyword')->textarea(['rows' => 2]) ?>
   
  <?= $form->field($model, 'pub_date')->widget(DateRangePicker::classname(), [
      'pluginOptions'=>[
          'singleDatePicker'=>true,
          'showDropdowns'=>true,
          'locale'=>['format' => 'YYYY-MM-DD'],
      ],
  ]);
    ?>
    
    <?= $form->field($model, 'abstract_image')->fileInput()->label() ?>
    
    
     </div>
        <div class="col-md-4 col-xs-12">

    <?= $form->field($model, 'sef_title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'sef_alt')->textarea(['rows' => 2]) ?>
    <?= $form->field($model, 'abstract_image_title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'slider_image')->fileInput()->label() ?>
    
         </div>
       </div>
  </div>

 </div>
</div>

    <div class="form-group" style="text-align: center">
        <div class="col-md-4 col-md-offset-4">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    </div> 
 

    <?php ActiveForm::end(); ?>
    </div>
</div>
<?php 
    $this->registerJs("CKEDITOR.replace('webarticles-body',{toolbar : 'Basic'})");
    
?>