<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentExtRemark */

$this->title = 'Update Judgment Ext Remark: ' . $model->judgment_code;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Ext Remarks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judgment_code, 'url' => ['view', 'id' => $model->judgment_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="judgment-ext-remark-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
