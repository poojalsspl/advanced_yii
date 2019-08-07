<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentBenchType */

$this->title = 'Update Judgment Bench Type: ' . $model->bench_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Bench Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bench_type_id, 'url' => ['view', 'id' => $model->bench_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="judgment-bench-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
