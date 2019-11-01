<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentDataPoint */

$this->title = 'Create Judgment Data Point';
/*$this->params['breadcrumbs'][] = ['label' => 'Judgment Data Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="judgment-data-point-create">

    <h1><?= Html::encode($this->title) ?></h1>

 

<?= $this->render('_form', [
        'models' => $models,
    ]) ?>

</div>
