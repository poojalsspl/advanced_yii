<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentMastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-mast-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'judgment_code') ?>

    <?= $form->field($model, 'court_code') ?>

    <?= $form->field($model, 'court_name') ?>

    <?= $form->field($model, 'appeal_numb') ?>

    <?= $form->field($model, 'judgment_date') ?>

    <?php // echo $form->field($model, 'judgment_title') ?>

    <?php // echo $form->field($model, 'appellant_name') ?>

    <?php // echo $form->field($model, 'appellant_adv') ?>

    <?php // echo $form->field($model, 'appellant_adv_count') ?>

    <?php // echo $form->field($model, 'respondant_name') ?>

    <?php // echo $form->field($model, 'respondant_adv') ?>

    <?php // echo $form->field($model, 'respondant_adv_count') ?>

    <?php // echo $form->field($model, 'appeal_status') ?>

    <?php // echo $form->field($model, 'citation') ?>

    <?php // echo $form->field($model, 'citation_count') ?>

    <?php // echo $form->field($model, 'judges_name') ?>

    <?php // echo $form->field($model, 'judges_count') ?>

    <?php // echo $form->field($model, 'hearing_date') ?>

    <?php // echo $form->field($model, 'hearing_place') ?>

    <?php // echo $form->field($model, 'judgment_abstract') ?>

    <?php // echo $form->field($model, 'judgment_text') ?>

    <?php // echo $form->field($model, 'judgment_source_code') ?>

    <?php // echo $form->field($model, 'judgment_type') ?>

    <?php // echo $form->field($model, 'judgment_source_name') ?>

    <?php // echo $form->field($model, 'jcatg_description') ?>

    <?php // echo $form->field($model, 'jcatg_id') ?>

    <?php // echo $form->field($model, 'jsub_catg_description') ?>

    <?php // echo $form->field($model, 'jsub_catg_id') ?>

    <?php // echo $form->field($model, 'overrule_judgment') ?>

    <?php // echo $form->field($model, 'overruled_by_judgment') ?>

    <?php // echo $form->field($model, 'judgment_ext_remark_flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
