<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BareactMast */

$this->title = 'Update Bareact Mast: ' . $model->bareact_code;
$this->params['breadcrumbs'][] = ['label' => 'Bareact Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bareact_code, 'url' => ['view', 'id' => $model->bareact_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bareact-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
