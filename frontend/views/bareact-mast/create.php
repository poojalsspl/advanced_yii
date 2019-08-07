<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BareactMast */

$this->title = 'Create Bareact Mast';
$this->params['breadcrumbs'][] = ['label' => 'Bareact Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bareact-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
