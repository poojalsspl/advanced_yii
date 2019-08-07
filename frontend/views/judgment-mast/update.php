<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentMast */

$this->title = 'Update Judgment Mast: ' . $model->judgment_code;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judgment_code, 'url' => ['view', 'id' => $model->judgment_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="judgment-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
