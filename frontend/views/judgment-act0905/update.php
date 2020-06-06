<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAct */

$this->title = 'Acts & Section imposed in Judgment';
/*$this->params['breadcrumbs'][] = ['label' => 'Judgment Acts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<div class="judgment-act-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
