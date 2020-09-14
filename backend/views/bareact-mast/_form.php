<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\BareactCatgMast;
use frontend\models\BareactGroupMast;
use frontend\models\BareactSubcatgMast;
use frontend\models\BareactDetl;
use yii\helpers\ArrayHelper;
use kartik\daterange\DateRangePicker;
use kartik\widgets\DepDrop;


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

        
    <?= $form->field($model, 'act_catg_desc')->dropDownList($bareactCatg, ['prompt' => 'Select Category','id'=>'catg-code',
        'value' => (!$model->isNewRecord) ? $model->act_catg_code : '',
        "onchange"=>"
                      var code = $(this).val();
                      $('#bareactmast-act_catg_code').val(code);
                      "]) ?>                                           

    <?= $form->field($model, 'act_catg_code')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?php $bareactSubCatg = ArrayHelper::map(BareactSubcatgMast::find()->all(), 'act_sub_catg_code', 'act_sub_catg_desc'); ?>

    <?php /* $form->field($model, 'act_sub_catg_desc')->dropDownList($bareactSubCatg, ['prompt' => 'Select SubCategory',
        'value' => (!$model->isNewRecord) ? $model->act_sub_catg_code : '',
        "onchange"=>"
                      var code = $(this).val();
                      $('#bareactmast-act_sub_catg_code').val(code);
                      "]) */?> 
    <?= $form->field($model, 'act_sub_catg_desc')->widget(DepDrop::classname(), [
    'options'=>['id'=>'subcatg-code'],
    'pluginOptions'=>[
        'depends'=>['catg-code'],
        'placeholder'=>'Select...',
        'url'=>\yii\helpers\Url::to(['/bareact-mast/subcat'])
    ]
]);  ?>                                                          

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
