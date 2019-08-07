<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JournalMast */

$this->title = 'Update Journal Mast: ' . $model->journal_code;
$this->params['breadcrumbs'][] = ['label' => 'Journal Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->journal_code, 'url' => ['view', 'id' => $model->journal_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="journal-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
