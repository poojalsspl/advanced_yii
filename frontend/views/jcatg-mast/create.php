<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JcatgMast */

$this->title = 'Create Jcatg Mast';
$this->params['breadcrumbs'][] = ['label' => 'Jcatg Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jcatg-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
