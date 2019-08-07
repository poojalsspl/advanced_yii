<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentJurisdiction */

$this->title = 'Update Judgment Jurisdiction: ' . $model->judgment_jurisdiction_id;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Jurisdictions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judgment_jurisdiction_id, 'url' => ['view', 'id' => $model->judgment_jurisdiction_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="judgment-jurisdiction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
