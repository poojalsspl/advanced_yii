<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentJudge */

$this->title = 'Update Judgment Judge: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Judges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="judgment-judge-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
