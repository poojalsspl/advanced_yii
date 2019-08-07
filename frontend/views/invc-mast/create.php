<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InvcMast */

$this->title = 'Create Invc Mast';
$this->params['breadcrumbs'][] = ['label' => 'Invc Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invc-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
