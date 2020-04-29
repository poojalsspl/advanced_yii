<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use backend\models\UnivMast;
use frontend\models\CountryMast;
use frontend\models\StateMast;
use frontend\models\CityMast;
use kartik\select2\Select2;
use kartik\daterange\DateRangePicker;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\CollegeMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="college-mast-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'college_name')->textInput(['maxlength' => true]) ?>
     <?php $country = ArrayHelper::map(UnivMast::find()->orderBy('univ_name', SORT_DESC)->all(), 'univ_code', 'univ_name'); ?>


    
    <?= $form->field($model, 'univ_code')->widget(Select2::classname(), [
       'data' => $country,
       'options' => ['placeholder' => 'Select University'],
       'pluginEvents' => [] 
    ]) ?>

    
    <?= $form->field($model, 'estd_yr')->widget(DateRangePicker::classname(), [
      'pluginOptions'=>[
          'singleDatePicker'=>true,
          'showDropdowns'=>true,
          'locale'=>['format' => 'YYYY'],
      ],
  ]) ?>

    <?= $form->field($model, 'college_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'college_logo')->fileInput() ?>

    <?= $form->field($model, 'sponsor')->dropDownList(['Y'=>'Yes','N'=>'No']) ?>

    <?= $form->field($model, 'startdate')->widget(DateRangePicker::classname(), [
      'pluginOptions'=>[
          'singleDatePicker'=>true,
          'showDropdowns'=>true,
          'locale'=>['format' => 'YYYY-MM-DD'],
      ],
  ]) ?>

    <?= $form->field($model, 'enddate')->widget(DateRangePicker::classname(), [
      'pluginOptions'=>[
          'singleDatePicker'=>true,
          'showDropdowns'=>true,
          'locale'=>['format' => 'YYYY-MM-DD'],
      ],
  ]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'zipcode')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tele')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput() ?>

    <?php $country = ArrayHelper::map(CountryMast::find()->all(),'country_code','country_name');?>
    <?= $form->field($model, 'country_code')->dropDownList($country, ['id'=>'country_code','prompt'=>'Select...'])->label('Country') ?>

    <?=$form->field($model, 'state_code')->widget(DepDrop::classname(), [
                                    'data'=>ArrayHelper::map(StateMast::find()->all(), 'state_code', 'state_name' ),
                                    'options'=>['id'=>'state_code', 'placeholder' => 'Select state'],
                                    'pluginOptions'=>[
                                    'depends'=>['country_code'],
                                    'placeholder'=>'Select state',
                                    'url'=>\yii\helpers\Url::to(['univ-mast/subcat'])
                                     ]
                                    ])->label('State');?>

    
    <?=$form->field($model, 'city_code')->widget(DepDrop::classname(), [
                                    'data'=>ArrayHelper::map(CityMast::find()->all(), 'city_code', 'city_name' ),
                                    'options'=>['placeholder' => 'Select city'],
                                    'pluginOptions'=>[
                                    'depends'=>['state_code'],
                                    'placeholder'=>'Select city',
                                    'url'=>\yii\helpers\Url::to(['univ-mast/subcity'])
                                    ]
                                ])->label('City');?>

    <?= $form->field($model, 'prospectus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_students')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
