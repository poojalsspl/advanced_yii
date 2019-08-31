<?php
use frontend\models\User;
use app\models\Student;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use yii\bootstrap\Modal;
use kartik\select2\Select2;

$this->title = 'Update Profile';
    $baseUrl = Yii::$app->params['domainName'];

?>

<div class="template">
    <div class ="body-content">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

       <?= $form->field($model, 'student_name')->textInput(['placeholder' => 'Enter First Name']) ?>

                                
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
