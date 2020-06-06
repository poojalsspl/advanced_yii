<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAct */

$this->title = 'Acts & Section imposed in Judgment';
/*$this->params['breadcrumbs'][] = ['label' => 'Judgment Acts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="judgment-act-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form1', [
        'model' => $model,
        'modelsBareact' => $modelsBareact,
    ]) ?>

</div>
