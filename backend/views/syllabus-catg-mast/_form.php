<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SyllabusCatgMast */
/* @var $form ActiveForm */
?>
<div class="syllabus-catg-mast-_form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'syllabus_catg_code') ?>
        <?= $form->field($model, 'syllabus_catg_name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- syllabus-catg-mast-_form -->
