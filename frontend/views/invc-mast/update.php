<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InvcMast */

$this->title = 'Update Invc Mast: ' . $model->invc_numb;
$this->params['breadcrumbs'][] = ['label' => 'Invc Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->invc_numb, 'url' => ['view', 'id' => $model->invc_numb]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="invc-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
