<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentBenchType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-bench-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bench_type_id')->textInput() ?>

    <?= $form->field($model, 'bench_type_text')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
