<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JcatgMastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jcatg-mast-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'jcatg_id') ?>

    <?= $form->field($model, 'jcatg_description') ?>

    <?= $form->field($model, 'jcatg_id1') ?>

    <?= $form->field($model, 'jcatg_description1') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
