<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StateMast */

$this->title = 'Create State Mast';
$this->params['breadcrumbs'][] = ['label' => 'State Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="state-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
