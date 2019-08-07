<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CountryMast */

$this->title = 'Create Country Mast';
$this->params['breadcrumbs'][] = ['label' => 'Country Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
