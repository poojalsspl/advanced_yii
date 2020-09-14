<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BareactMast */

$this->title = 'Update Bareact Mast: ' . $model->bareact_code;
$this->params['breadcrumbs'][] = ['label' => 'Bareact Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bareact_code, 'url' => ['view', 'id' => $model->bareact_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bareact-mast-update">

    

    <?= $this->render('_form', [
        'model' => $model,
        'modeldetl' => $modeldetl,
    ]) ?>

</div>
