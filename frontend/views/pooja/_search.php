<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PoojaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pooja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'judgment_code') ?>

    <?= $form->field($model, 'court_code') ?>

    <?= $form->field($model, 'judgment_date') ?>

    <?= $form->field($model, 'jyear') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
