<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentParties */

$this->title = 'Create Judgment Parties';
/*$this->params['breadcrumbs'][] = ['label' => 'Judgment Parties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="judgment-parties-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
