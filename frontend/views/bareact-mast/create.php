<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\BareactMast */

$this->title = 'Create Bareact ';
$this->params['breadcrumbs'][] = ['label' => 'Bareact Masts', 'url' => ['index']];

?>
<div class="bareact-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
