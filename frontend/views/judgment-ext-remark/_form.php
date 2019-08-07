<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentExtRemark */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-ext-remark-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judgment_code')->textInput() ?>

    <?= $form->field($model, 'judgment_remark')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
