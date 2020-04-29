<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticleCatgMast */

$this->title = 'Create Article Catg Mast';
$this->params['breadcrumbs'][] = ['label' => 'Article Catg Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-catg-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
