<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
 
    <?= $form->field($model, 'course_code'); ?>
    <?= $form->field($model, 'course_name'); ?>
    <?= $form->field($model, 'course_duration'); ?>
     </div>
        <div class="col-md-4 col-xs-12">
    <?= $form->field($model, 'course_fees'); ?>
    <?= $form->field($model, 'course_level_name'); ?>
    <?= $form->field($model, 'course_eligibility'); ?>
     </div>
        <div class="col-md-4 col-xs-12">
    <?= $form->field($model, 'tot_student'); ?>
    <?= $form->field($model, 'tot_completed'); ?>
    <?= $form->field($model, 'tot_ongoing'); ?>
     </div>
       </div>
  </div>

 </div>
</div>
<div class="row">
    <div class="box box-blue">
        <div class="box-body">
            <div class="col-md-12">
                <div class="col-md-6 col-xs-12">
    <?= $form->field($model, 'course_intro')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6 col-xs-12">
    <?= $form->field($model, 'course_objective')->textarea(['rows' => 6]) ?>
                </div>
            </div> 
            <div class="col-md-12">   
                <div class="col-md-6 col-xs-12">   
    <?= $form->field($model, 'course_syllabus')->textarea(['rows' => 6]) ?>
               </div>
               <div class="col-md-6 col-xs-12">
    <?= $form->field($model, 'course_content')->textarea(['rows' => 6]) ?>
               </div>
            </div>
            <div class="col-md-12">   
               <div class="col-md-6 col-xs-12"> 
    <?= $form->field($model, 'course_summary')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6 col-xs-12">
    <?= $form->field($model, 'course_marking')->textarea(['rows' => 6]) ?>
                </div>
            </div>

        </div>
    </div>
</div>               
  
    <div class="form-group" style="text-align: center">
    <div class="col-md-4 col-md-offset-4"> 
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>
    </div>
    </div>
   </div> 
 
<?php ActiveForm::end(); ?>
    </div>
</div>
<?php 
    $this->registerJs("CKEDITOR.replace('coursemast-course_intro',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('coursemast-course_objective',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('coursemast-course_syllabus',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('coursemast-course_content',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('coursemast-course_summary',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('coursemast-course_marking',{toolbar : 'Basic'})");

?>
