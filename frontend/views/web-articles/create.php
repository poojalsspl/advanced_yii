<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\WebArticles */

$this->title = 'Create Web Articles';
$this->params['breadcrumbs'][] = ['label' => 'Web Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
