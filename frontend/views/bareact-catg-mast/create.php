<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\BareactCatgMast */

$this->title = 'Create Bareact Catg Mast';
$this->params['breadcrumbs'][] = ['label' => 'Bareact Catg Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bareact-catg-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
