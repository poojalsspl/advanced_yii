<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticleCatgMast */

$this->title = 'Update Article Catg Mast: ' . $model->art_catg_id;
$this->params['breadcrumbs'][] = ['label' => 'Article Catg Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->art_catg_id, 'url' => ['view', 'id' => $model->art_catg_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-catg-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
