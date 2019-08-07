<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CityMast */

$this->title = 'Create City Mast';
$this->params['breadcrumbs'][] = ['label' => 'City Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
