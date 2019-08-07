<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CountryMast */

$this->title = 'Update Country Mast: ' . $model->country_code;
$this->params['breadcrumbs'][] = ['label' => 'Country Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country_code, 'url' => ['view', 'id' => $model->country_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="country-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
