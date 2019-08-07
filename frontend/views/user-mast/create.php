<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserMast */

$this->title = 'Create User Mast';
$this->params['breadcrumbs'][] = ['label' => 'User Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
