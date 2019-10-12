<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentDataPoint */

/*$this->title = 'Update Judgment Data Point: ' . $models->id;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Data Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $models->id, 'url' => ['view', 'id' => $models->id]];*/
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="judgment-data-point-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form1', [
        'models' => $models,
    ]) ?>

</div>
