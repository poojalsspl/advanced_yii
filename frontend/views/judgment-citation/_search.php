<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentCitationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-citation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'judgment_code') ?>

    <?= $form->field($model, 'journal_code') ?>

    <?= $form->field($model, 'journal_name') ?>

    <?= $form->field($model, 'shrt_name') ?>

    <?php // echo $form->field($model, 'judgment_date') ?>

    <?php // echo $form->field($model, 'citation') ?>

    <?php // echo $form->field($model, 'journal_year') ?>

    <?php // echo $form->field($model, 'journal_volume') ?>

    <?php // echo $form->field($model, 'journal_pno') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
