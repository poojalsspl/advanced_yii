<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\WebArticlesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-articles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'art_date') ?>

    <?= $form->field($model, 'pub_date') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'abstract_image') ?>

    <?php // echo $form->field($model, 'slider_image') ?>

    <?php // echo $form->field($model, 'body') ?>

    <?php // echo $form->field($model, 'art_catg_id') ?>

    <?php // echo $form->field($model, 'sef_title') ?>

    <?php // echo $form->field($model, 'sef_description') ?>

    <?php // echo $form->field($model, 'sef_keyword') ?>

    <?php // echo $form->field($model, 'sef_alt') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'abstract_image_title') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
