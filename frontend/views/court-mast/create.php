<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CourtMast */

$this->title = 'Create Court Mast';
$this->params['breadcrumbs'][] = ['label' => 'Court Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="court-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
