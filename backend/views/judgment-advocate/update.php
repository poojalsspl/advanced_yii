<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentAdvocate */

$this->title = 'Update Judgment Advocate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Advocates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="judgment-advocate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
