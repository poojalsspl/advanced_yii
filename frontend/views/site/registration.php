<?php
use frontend\models\User;
use app\models\UserMast;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\CountryMast;
use frontend\models\StateMast;
use frontend\models\CityMast;
use frontend\models\CollegeMast;
use app\models\CourseMast;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\bootstrap\Modal;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\jui\DatePicker; 
use kartik\daterange\DateRangePicker;





$this->title = 'Student';
   

    $country = ArrayHelper::map(CountryMast::find()->all(), 'country_code', 'country_name');
    array_push($country, "Select Country");
    $country = array_reverse($country,true);

    $college = ArrayHelper::map(CollegeMast::find()->all(), 'college_code', 'college_name');
    array_push($college, "Select College");
    $college = array_reverse($college,true);

    $course = ArrayHelper::map(CourseMast::find()->all(), 'course_code', 'course_name');
    //$course = array_push($course, "Select Course");
    //$course = array_reverse($course,false);
    
    
?>

<div class="template">
    <div class ="body-content">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="col-md-12">
            <div class="row">
                <div class="box box-blue">
                    <div class="box-header with-border">
                        <div class="box-title">Personal Details</div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            
                            <div class="col-md-4 col-xs-12">

                                <?= $form->field($model, 'student_name')->textInput(['placeholder' => 'Enter Full Name']) ?>
                                         
                           
                               <?= $form->field($model, 'dob')->widget(DateRangePicker::classname(), [
      'pluginOptions'=>[
          'singleDatePicker'=>true,
          'showDropdowns'=>true,
          'locale'=>['format' => 'YYYY-MM-DD'],
      ],
  ]);
    ?>
                               

                            </div>
                            <div class="col-md-4 col-xs-12">
                               

                                <?= $form->field($model, 'gender')->radioList(['M' => 'Male', 'F' => 'Female'])->label('Gender'); ?>
                                <?= $form->field($model, 'qual_desc')->textInput() ?>

                            </div>
                            <div class="col-md-4 col-xs-12">
                       
                            
                             <?php
  echo $form->field($model, 'college_code')->dropDownList($college, ['id'=>'college_code'])->label('College');?>
  <?php
  echo $form->field($model, 'course_code')->dropDownList($course, ['id'=>'course_code','prompt'=>'Select...'])->label('Course');?>
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
                               
                                <?php
  echo $form->field($model, 'country_code')->dropDownList($country, ['id'=>'country_code'])->label('Country');?>

                                
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <?=$form->field($model, 'state_code')->widget(DepDrop::classname(), [
                                    'data'=>ArrayHelper::map(StateMast::find()->all(), 'state_code', 'state_name' ),//will show dependent value while upate //27/07
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
                                    'data'=>ArrayHelper::map(CityMast::find()->all(), 'city_code', 'city_name' ),//will show dependent value while upate //27/07
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
