<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\BareactMast */

$this->title = 'Update Bareact ' ;
$this->params['breadcrumbs'][] = ['label' => 'Bareact Masts', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bareact-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
