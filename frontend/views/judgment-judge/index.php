<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JudgmentJudgeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Judges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-judge-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judgment Judge', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'judgment_code',
            'judge_name',
            'doc_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
