<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentJudge */

$this->title = 'Create Judgment Judge';
/*$this->params['breadcrumbs'][] = ['label' => 'Judgment Judges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="judgment-judge-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
