<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">
 <div class="template">
   <div class ="body-content">

    <?php $form = ActiveForm::begin(); ?>
   <div class="col-md-12">
     <div class="row">
       <div class="box box-blue">
         <div class="box-body">
           <div class="col-md-12">
    <?= $form->field($model, 'project_title')->textInput() ?>
           </div>
            <div class="col-md-12">
            <div class="col-md-6 col-xs-12">
    <?= $form->field($model, 'judges')->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-md-6 col-xs-12">
    <?= $form->field($model, 'advocates')->textarea(['rows' => 6]) ?>
            </div>
           </div>

         <div class="col-md-12">
          <div class="col-md-6 col-xs-12">
    <?= $form->field($model, 'pabstract')->textarea(['rows' => 6]) ?>
          </div>
          <div class="col-md-6 col-xs-12">
    <?= $form->field($model, 'acts')->textarea(['rows' => 6]) ?>
          </div>
         </div>

          <div class="col-md-12">
          <div class="col-md-6 col-xs-12">
    <?= $form->field($model, 'citation')->textarea(['rows' => 6]) ?>
          </div>
          <div class="col-md-6 col-xs-12">
    <?= $form->field($model, 'refrence')->textarea(['rows' => 6]) ?>
          </div>
         </div>

         <div class="col-md-12">
           <div class="col-md-6 col-xs-12">
      <?= $form->field($model, 'disposition')->textarea(['rows' => 6]) ?>
           </div>
           <div class="col-md-6 col-xs-12">
      <?= $form->field($model, 'bench')->textarea(['rows' => 6]) ?>
           </div>
         </div>

        <div class="col-md-12">
        <div class="col-md-6 col-xs-12">
           <?= $form->field($model, 'preceeding')->textarea(['rows' => 6]) ?>
        </div>  
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'jurisdiction')->textarea(['rows' => 6]) ?>
        </div>
        </div>

        <div class="col-md-12">
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'jcategory')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'jsubcategory')->textarea(['rows' => 6]) ?>
        </div>
        </div>

    <div class="col-md-12">
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'searchtag')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'overruled')->textarea(['rows' => 6]) ?> 
        </div> 
    </div>

    <div class="col-md-12">
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'jlength')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-6 col-xs-12">
           <?= $form->field($model, 'bibliography')->textarea(['rows' => 6]) ?> 
        </div>
    </div>    
    
 <div class="form-group" style="text-align: center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>
</div> 
</div>
</div>
</div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>

<?php 
    $this->registerJs("CKEDITOR.replace('project-pabstract',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-judges',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-advocates',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-acts',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-citation',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-refrence',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-preceeding',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-disposition',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-bench',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-jurisdiction',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-searchtag',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-jcategory',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-jsubcategory',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-bibliography',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-overruled',{toolbar : 'Basic'})");
    $this->registerJs("CKEDITOR.replace('project-jlength',{toolbar : 'Basic'})");
?>