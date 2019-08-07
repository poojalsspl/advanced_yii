<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourtMast */

$this->title = 'Update Court Mast: ' . $model->bench_code;
$this->params['breadcrumbs'][] = ['label' => 'Court Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bench_code, 'url' => ['view', 'id' => $model->bench_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="court-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
