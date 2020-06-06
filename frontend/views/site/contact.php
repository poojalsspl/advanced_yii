<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\select2\Select2;

$this->title = 'Contact';
//$this->params['breadcrumbs'][] = $this->title;

$subject = ['College Workshop Inquiry'=>'College Workshop Inquiry','Course Inquiry'=>'Course Inquiry','Franchise Inquiry'=>'Franchise Inquiry','Result Inquiry'=>'Result Inquiry','Other Inquiry'=>'Other Inquiry'];
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject')->widget(Select2::classname(), [
               'data' => $subject,
               'options' => ['placeholder' => 'Select Subject Title'],
               'pluginEvents'=>[
               ]
               ]); ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
            <p>
        If you have franchisee inquiries or other questions, please fill out the following form to contact us. Thank you.
           </p>
           <div class="row">
               <div class="col-md-12">
                   <div class="box box-v3" style="text-align: center; padding: 15px;">
                       <i class="fa fa-map-marker" style="font-size: 30px"></i>
                       <h3>Our Address</h3>
                       <p>Sector-R, Near Bombay Hospital,</p>
                       <p>Ring Road, Mahalaxmi Nagar,</p>
                       <p>Indore - 452010 (Madhya Pradesh),</p>
                       <p>India</p>
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="box box-v3" style="text-align: center; padding: 15px;">
                       <i class="fa fa-envelope" style="font-size: 30px"></i>
                       <h3>Email Us</h3>
                        <p>inquiry@lawhub.in</p>
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="box box-v3" style="text-align: center; padding: 15px;">
                       <i class="fa fa-phone" style="font-size: 30px"></i>
                       <h3>Call Us</h3>
                       <p>+919425031939</p>
                   </div>
               </div>
           </div>
        </div>
    </div>

</div>
