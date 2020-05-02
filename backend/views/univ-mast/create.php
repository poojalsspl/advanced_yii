<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UnivMast */

$this->title = 'Create Univ Mast';
$this->params['breadcrumbs'][] = ['label' => 'Univ Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="univ-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
