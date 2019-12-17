<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JcatgMast;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\JsubCatgMast */
/* @var $form yii\widgets\ActiveForm */
$category = ArrayHelper::map(JcatgMast::find()->all(), 'jcatg_id', 'jcatg_description');
?>

<div class="jsub-catg-mast-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'jcatg_id')->dropDownList($category,['prompt' => 'Select Description']) ?>

    <?= $form->field($model, 'jsub_catg_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
