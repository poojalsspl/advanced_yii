<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\SyllabusCatgMast;
use app\models\CourseMast;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\SyllabusDetail */
/* @var $form ActiveForm */
?>
<div class="syllabus-detail-_form">

    <?php $form = ActiveForm::begin(); ?>
      <?php $syllabus = ArrayHelper::map(SyllabusCatgMast::find()->all(),'syllabus_catg_code','syllabus_catg_name');?>
        <?= $form->field($model, 'syllabus_catg_code')->widget(Select2::classname(), [
        'data' => $syllabus,
        'options' => ['placeholder' => 'Select Syllabus'],
         'pluginEvents'=>[
          ]
          ]); ?> 
       <?php $course = ArrayHelper::map(CourseMast::find()->all(),'course_code','course_name');?>   
        <?= $form->field($model, 'course_code')->widget(Select2::classname(), [
        'data' => $course,
        'options' => ['placeholder' => 'Select Course'],
         'pluginEvents'=>[
          ]
          ]); ?>
        <?= $form->field($model, 'tot_count') ?>
        <?= $form->field($model, 'max_marks') ?>
        <?= $form->field($model, 'pass_marks') ?>
        <?= $form->field($model, 'tot_days') ?>
        <?= $form->field($model, 'stage')->dropDownList(["1"=>'1', "2"=>"2","3"=>"3"],['prompt'=>'Select Stage']) ?>
        
        
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- syllabus-detail-_form -->
