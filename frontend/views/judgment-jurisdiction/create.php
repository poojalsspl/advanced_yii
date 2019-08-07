<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentJurisdiction */

$this->title = 'Create Judgment Jurisdiction';
$this->params['breadcrumbs'][] = ['label' => 'Judgment Jurisdictions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-jurisdiction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
