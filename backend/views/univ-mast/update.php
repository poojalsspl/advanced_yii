<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UnivMast */

$this->title = 'Update Univ Mast: ' . $model->univ_code;
$this->params['breadcrumbs'][] = ['label' => 'Univ Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->univ_code, 'url' => ['view', 'id' => $model->univ_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="univ-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
