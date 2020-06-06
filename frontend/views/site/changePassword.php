<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 
/* @var $this yii\web\View */
/* @var $model frontend\models\ChangePasswordForm */
/* @var $form ActiveForm */
 
$this->title = 'Change Password';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="user-changePassword">
 <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out your new password.</p>
    <div class="row">
        <div class="col-lg-5">
    <?php $form = ActiveForm::begin(); ?>
 
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'confirm_password')->passwordInput() ?>
 
        <div class="form-group">
            <?= Html::submitButton('Change', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
 
</div>
</div>
</div>
</div>