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

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'college_code') ?>

    <?= $form->field($model, 'judgment_code') ?>

    <?= $form->field($model, 'court_code') ?>

    <?= $form->field($model, 'court_name') ?>

    <?php // echo $form->field($model, 'court_type') ?>

    <?php // echo $form->field($model, 'appeal_numb') ?>

    <?php // echo $form->field($model, 'appeal_numb1') ?>

    <?php // echo $form->field($model, 'judgment_date') ?>

    <?php // echo $form->field($model, 'judgment_date1') ?>

    <?php // echo $form->field($model, 'judgment_title') ?>

    <?php // echo $form->field($model, 'appeal_status') ?>

    <?php // echo $form->field($model, 'disposition_id') ?>

    <?php // echo $form->field($model, 'disposition_id1') ?>

    <?php // echo $form->field($model, 'disposition_text') ?>

    <?php // echo $form->field($model, 'bench_type_id') ?>

    <?php // echo $form->field($model, 'bench_type_id1') ?>

    <?php // echo $form->field($model, 'bench_type_text') ?>

    <?php // echo $form->field($model, 'judgment_jurisdiction_id') ?>

    <?php // echo $form->field($model, 'judgment_jurisdiction_id1') ?>

    <?php // echo $form->field($model, 'judgmnent_jurisdiction_text') ?>

    <?php // echo $form->field($model, 'judgment_abstract') ?>

    <?php // echo $form->field($model, 'judgment_analysis') ?>

    <?php // echo $form->field($model, 'judgment_text') ?>

    <?php // echo $form->field($model, 'judgment_text1') ?>

    <?php // echo $form->field($model, 'search_tag') ?>

    <?php // echo $form->field($model, 'doc_id') ?>

    <?php // echo $form->field($model, 'judgment_type') ?>

    <?php // echo $form->field($model, 'judgment_type1') ?>

    <?php // echo $form->field($model, 'jcatg_id') ?>

    <?php // echo $form->field($model, 'jcatg_id1') ?>

    <?php // echo $form->field($model, 'jcatg_description') ?>

    <?php // echo $form->field($model, 'jsub_catg_id') ?>

    <?php // echo $form->field($model, 'jsub_catg_id1') ?>

    <?php // echo $form->field($model, 'jsub_catg_description') ?>

    <?php // echo $form->field($model, 'overrule_judgment') ?>

    <?php // echo $form->field($model, 'overruled_by_judgment') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'approved') ?>

    <?php // echo $form->field($model, 'approved_date') ?>

    <?php // echo $form->field($model, 'status_1') ?>

    <?php // echo $form->field($model, 'status_2') ?>

    <?php // echo $form->field($model, 'completion_status') ?>

    <?php // echo $form->field($model, 'completion_date') ?>

    <?php // echo $form->field($model, 'research_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
