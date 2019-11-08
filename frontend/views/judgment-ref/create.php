<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentRef */

$this->title = 'Judgment Referred';
/*$this->params['breadcrumbs'][] = ['label' => 'Judgment Refs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="judgment-ref-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
