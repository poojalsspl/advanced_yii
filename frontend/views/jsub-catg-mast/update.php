<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JsubCatgMast */

$this->title = 'Update Jsub Catg Mast: ' . $model->jsub_catg_id;
$this->params['breadcrumbs'][] = ['label' => 'Jsub Catg Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jsub_catg_id, 'url' => ['view', 'id' => $model->jsub_catg_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jsub-catg-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
