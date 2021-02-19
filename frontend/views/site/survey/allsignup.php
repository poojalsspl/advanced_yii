<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\CountryMast;
use frontend\models\StateMast;
use frontend\models\CityMast;
//use frontend\models\CollegeMast;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\jui\DatePicker; 
use kartik\daterange\DateRangePicker;

$this->title = 'Student Signup';
   
    $state = ArrayHelper::map(StateMast::find()->all(), 'state_code', 'state_name');
    //$college = ArrayHelper::map(CollegeMast::find()->all(), 'college_code', 'college_name');
    
?>

<div class="template">
    <div class ="body-content">
        <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off','enctype' => 'multipart/form-data']]); ?>
        
        <div class="col-md-12">
            <div class="row">
              <div class="box box-blue">
                <div class="box-header with-border">
                        <div class="box-title">Login Details</div>
                    </div>
                    <div class="box-body">
                       <div class="col-md-12">
                        <div class="col-md-4 col-xs-12">
                          <?= $form->field($model, 'username')->label('Username/Email') ?>
                        </div>
                         <div class="col-md-4 col-xs-12">
                          <?= $form->field($model, 'password')->passwordInput() ?>
                         </div>
                         <div class="col-md-4 col-xs-12">
                          <?= $form->field($model, 'mobile_number')->textInput() ?>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>

            <div class="row">
                <div class="box box-blue">
                    <div class="box-header with-border">
                        <div class="box-title">Personal Details</div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            
                            <div class="col-md-4 col-xs-12">
                                
                                <?= $form->field($model, 'student_name')->textInput(['placeholder' => 'Enter Full Name'])->label('Name') ?>
                                
                                

                                 <?php echo $form->field($model, 'college_name')->textInput()->label('College/Organisation/Firm'); ?>
                                          
                           
                               
                              
                               

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

                              
                                 <?php
  echo $form->field($model, 'state_code')->dropDownList($state, ['id'=>'state_code','prompt'=>'Select...'])->label('State');?>
                                
                              

                            </div>
                            <div class="col-md-4 col-xs-12">
                       
         <?= $form->field($model, 'gender')->radioList(['M' => 'Male', 'F' => 'Female'])->label('Gender'); ?>                   

                                                                                                                               
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
