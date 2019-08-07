<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JsubCatgMast */

$this->title = 'Create Jsub Catg Mast';
$this->params['breadcrumbs'][] = ['label' => 'Jsub Catg Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jsub-catg-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
