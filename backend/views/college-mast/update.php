<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CollegeMast */

$this->title = 'Update College Mast: ' . $model->college_code;
$this->params['breadcrumbs'][] = ['label' => 'College Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->college_code, 'url' => ['view', 'id' => $model->college_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="college-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
