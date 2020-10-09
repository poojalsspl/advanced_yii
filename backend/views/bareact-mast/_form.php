<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\BareactCatgMast;
use frontend\models\BareactGroupMast;
use frontend\models\BareactSubcatgMast;
use frontend\models\BareactDetl;
use yii\helpers\ArrayHelper;
use kartik\daterange\DateRangePicker;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\BareactMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bareact-mast-form">

    <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off']]); ?>
    <?php $bareactGroup = ArrayHelper::map(BareactGroupMast::find()->all(), 'act_group_code', 'act_group_desc'); ?>
    
  <?= $form->field($model, 'act_group_desc')->dropDownList($bareactGroup, ['prompt' => 'Select Group',
        'value' => (!$model->isNewRecord) ? $model->act_group_code : '',
        "onchange"=>"
                      var code = $(this).val();
                      $('#bareactmast-act_group_code').val(code);
                      "]) ?>                                           

    <?= $form->field($model, 'act_group_code')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?php $bareactCatg = ArrayHelper::map(BareactCatgMast::find()->all(), 'act_catg_code', 'act_catg_desc'); ?>

        
    <?= $form->field($model, 'act_catg_desc')->widget(Select2::classname(), [
            'data' => $bareactCatg,           
            'options' => ['placeholder' => 'Select Bareact Category','value' => ($model->act_catg_code != "") ? $model->act_catg_code : ''],
      'pluginEvents'=>[
            "select2:select" => "function() { var val = $(this).val();                
              $('#bareactmast-act_catg_code').val(val);
                    $.ajax({
                      url      : '/advanced_yii/bareact-mast/bsubcatg?id='+val,
                      dataType : 'json',
                      success  : function(data) {                                 
                       $('#bareactmast-act_sub_catg_desc').empty();    
                       $('#bareactmast-act_sub_catg_desc').append('<option> </option>');
                        $.each(data, function(i, item){
                        $('#bareactmast-act_sub_catg_desc').append('<option value='+item.act_sub_catg_code+'>'+item.act_sub_catg_desc+'</option>');
                      });
                          },
                      error: function(xhr, textStatus, errorThrown){
                           alert('No Sub Category found');
                        }                                                         
                      });
             }"
            ]

             ]); ?>                                           

    <?= $form->field($model, 'act_catg_code')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    

    <?php /* $form->field($model, 'act_sub_catg_desc')->dropDownList($bareactSubCatg, ['prompt' => 'Select SubCategory',
        'value' => (!$model->isNewRecord) ? $model->act_sub_catg_code : '',
        "onchange"=>"
                      var code = $(this).val();
                      $('#bareactmast-act_sub_catg_code').val(code);
                      "]) */?> 
           <?php 
      $act_sub_catg_desc = ($model->act_sub_catg_code != "") ?  ArrayHelper::map(BareactSubcatgMast::find()->where(["act_sub_catg_code"=>$model->act_sub_catg_code])->all(), 'act_sub_catg_code', 'act_sub_catg_desc') : "" ; ?>  
      
      <?= $form->field($model, 'act_sub_catg_desc')->dropDownList([
        'data' => $act_sub_catg_desc,
        ]);?>                                              

    <?php /*$form->field($model, 'act_sub_catg_code')->textInput(['maxlength' => true,'readonly'=>true]) */ ?>

    <?= $form->field($model, 'tot_section')->textInput() ?>

    <?= $form->field($model, 'tot_chap')->textInput() ?>

    <?= $form->field($model, 'enact_date')->widget(DateRangePicker::classname(), [
        'pluginOptions'=>[
        'singleDatePicker'=>true,
        'showDropdowns'=>true,
        'locale'=>['format' => 'YYYY-MM-DD'],
       ],
      ]);
    ?>
    
    <?= $form->field($model, 'bareact_desc')->textInput() ?>

    <?= $form->field($model, 'rule_flag')->radioList(['Y' => 'Yes', 'N' => 'No']); ?>

    
    <?php echo $form->field($modeldetl, 'body')->textarea(['rows'=>6])->label();?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
    $this->registerJs("CKEDITOR.replace('bareactdetl-body')");

   // $this->registerJs("CKEDITOR.replace('pages-page_abstract')");

?>
