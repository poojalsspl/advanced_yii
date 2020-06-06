<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'project_title') ?>

    <?= $form->field($model, 'pabstract') ?>

    <?= $form->field($model, 'judges') ?>

    <?php // echo $form->field($model, 'advocates') ?>

    <?php // echo $form->field($model, 'acts') ?>

    <?php // echo $form->field($model, 'citation') ?>

    <?php // echo $form->field($model, 'refrence') ?>

    <?php // echo $form->field($model, 'preceeding') ?>

    <?php // echo $form->field($model, 'disposition') ?>

    <?php // echo $form->field($model, 'bench') ?>

    <?php // echo $form->field($model, 'jurisdiction') ?>

    <?php // echo $form->field($model, 'searchtag') ?>

    <?php // echo $form->field($model, 'jcategory') ?>

    <?php // echo $form->field($model, 'jsubcategory') ?>

    <?php // echo $form->field($model, 'jlength') ?>

    <?php // echo $form->field($model, 'bibliography') ?>

    <?php // echo $form->field($model, 'overruled') ?>

    <?php // echo $form->field($model, 'completion_date') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
