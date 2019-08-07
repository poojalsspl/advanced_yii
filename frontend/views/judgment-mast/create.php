<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentMast */

$this->title = 'Create Judgment Mast';
$this->params['breadcrumbs'][] = ['label' => 'Judgment Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
