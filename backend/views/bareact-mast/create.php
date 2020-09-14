<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BareactMast */

$this->title = 'Create Bareact Mast';
$this->params['breadcrumbs'][] = ['label' => 'Bareact Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bareact-mast-create">

    

    <?= $this->render('_form', [
        'model' => $model,
        'modeldetl' => $modeldetl,
    ]) ?>

</div>
