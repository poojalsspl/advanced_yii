<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAct */

$this->title = 'Create Judgment Act';
$this->params['breadcrumbs'][] = ['label' => 'Judgment Acts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-act-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
