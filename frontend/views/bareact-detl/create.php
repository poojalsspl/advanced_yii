<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\BareactDetl */

$this->title = 'Create Bareact Detl';
$this->params['breadcrumbs'][] = ['label' => 'Bareact Detls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bareact-detl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
