<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticleCatgMastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-catg-mast-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'art_catg_id') ?>

    <?= $form->field($model, 'art_catg_name') ?>

    <?= $form->field($model, 'role') ?>

    <?= $form->field($model, 'parent_catg_id') ?>

    <?= $form->field($model, 'menu_flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
