<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JcatgMast */

$this->title = 'Update Jcatg Mast: ' . $model->jcatg_id;
$this->params['breadcrumbs'][] = ['label' => 'Jcatg Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jcatg_id, 'url' => ['view', 'id' => $model->jcatg_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jcatg-mast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
