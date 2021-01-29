<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\CountryMast;
use frontend\models\StateMast;
use frontend\models\CityMast;
use frontend\models\CourtMast;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\jui\DatePicker; 
use kartik\daterange\DateRangePicker;

$this->title = 'Advocate';
   
    $country = ArrayHelper::map(CountryMast::find()->all(), 'country_code', 'country_name');
   
    
?>

<div class="template">
    <div class ="body-content">
        <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off','enctype' => 'multipart/form-data']]); ?>
        
        <div class="col-md-12">
            <div class="row">
                <div class="box box-blue">
                    <div class="box-header with-border">
                        <div class="box-title">Personal Details</div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            
                            <div class="col-md-4 col-xs-12">
                                
                                <?= $form->field($model, 'advocate_name')->textInput(['placeholder' => 'Enter Full Name']) ?>
                                
                                

                                 <?= $form->field($model, 'email_id')->textInput(); ?>

                                 <?php $courts = ArrayHelper::map(CourtMast::find()->all(), 'court_code', 'court_name'); ?>         
                           
                                

                                <?= $form->field($model, 'court_code')->dropDownList($courts, ['id'=>'court_code','prompt'=>'Select court'])->label('Court Name');?>
                              
                               

                            </div>
                            <div class="col-md-4 col-xs-12">


                               <?= $form->field($model, 'dob')->widget(DateRangePicker::classname(), [
                                   'pluginOptions'=>[
                                   'singleDatePicker'=>true,
                                   'showDropdowns'=>true,
                                   'locale'=>['format' => 'YYYY-MM-DD'],
                                    ],
                                   ]);
                               ?>

                               <?= $form->field($model, 'mobile')->textInput() ?>

                               <?= $form->field($model, 'regs_numb')->textInput(); ?>


                              </div>
                            <div class="col-md-4 col-xs-12">
                       
         <?= $form->field($model, 'gender')->radioList(['M' => 'Male', 'F' => 'Female'])->label('Gender'); ?>                   

                                <?= $form->field($model, 'image')->fileInput()->label() ?>

                                 
                                   <?= $form->field($model, 'regs_year')->textInput(); ?>
                                
                              </div> 	

                        </div>
                    </div>

                </div>
            </div>
            

            
            <div class="row">
                <div class="box box-blue">
                    <div class="box-header with-border">
                        <div class="box-title">Contact Details</div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-4 col-xs-12">
                               
                                <?= $form->field($model, 'country_code')->dropDownList($country, ['id'=>'country_code','prompt'=>'Select...'])->label('Country');?>


                                
                            </div>
                            <div class="col-md-4 col-xs-12">
                               <?=$form->field($model, 'state_code')->widget(DepDrop::classname(), [
                                    'data'=>ArrayHelper::map(StateMast::find()->all(), 'state_code', 'state_name' ),
                                    'options'=>['id'=>'state_code', 'placeholder' => 'Select state'],

                                    'pluginOptions'=>[
                                    'depends'=>['country_code'],
                                    'placeholder'=>'Select state',
                                    'url'=>\yii\helpers\Url::to(['/site/subcat'])
                                     ]
                                    ])->label('State');?>
                                   
                                    


                                
                                                              
                                
                            </div>
                            <div class="col-md-4 col-xs-12">
                                 <?=$form->field($model, 'city_code')->widget(DepDrop::classname(), [
                                    'data'=>ArrayHelper::map(CityMast::find()->all(), 'city_code', 'city_name' ),
                                    'options'=>['placeholder' => 'Select city'],
                                    'pluginOptions'=>[
                                    'depends'=>['state_code'],
                                    'placeholder'=>'Select city',
                                    'url'=>\yii\helpers\Url::to(['/site/getcity'])
                                    ]
                                ])->label('City');?>
                                
                              
                                
                            </div>
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
