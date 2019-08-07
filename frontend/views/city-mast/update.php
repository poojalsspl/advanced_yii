<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CityMast */

$this->title = 'Update City Mast: ' . $model->city_code;
$this->params['breadcrumbs'][] = ['label' => 'City Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->city_code, 'url' => ['view', 'id' => $model->city_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="city-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
