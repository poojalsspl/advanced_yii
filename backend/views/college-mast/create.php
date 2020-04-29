<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CollegeMast */

$this->title = 'Create College Mast';
$this->params['breadcrumbs'][] = ['label' => 'College Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="college-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
