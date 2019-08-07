<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pooja */

$this->title = 'Update Pooja: ' . $model->judgment_code;
$this->params['breadcrumbs'][] = ['label' => 'Poojas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judgment_code, 'url' => ['view', 'id' => $model->judgment_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pooja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
