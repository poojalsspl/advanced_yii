<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAdvocate */

$this->title = 'Create Judgment';
//$this->params['breadcrumbs'][] = ['label' => 'Judgment Advocates', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelPerson' => $modelPerson,
         'modelsHouse' => (empty($modelsHouse)) ? [new House] : $modelsHouse,
            'modelsRoom' => (empty($modelsRoom)) ? [[new Room]] : $modelsRoom,
    ]) ?>

