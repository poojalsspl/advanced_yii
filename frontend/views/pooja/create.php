<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pooja */

$this->title = 'Create Pooja';
$this->params['breadcrumbs'][] = ['label' => 'Poojas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pooja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
