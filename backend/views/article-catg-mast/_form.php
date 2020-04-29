<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticleCatgMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-catg-mast-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'art_catg_id')->textInput() ?>

    <?= $form->field($model, 'art_catg_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->textInput() ?>

    <?= $form->field($model, 'parent_catg_id')->textInput() ?>

    <?= $form->field($model, 'menu_flag')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
