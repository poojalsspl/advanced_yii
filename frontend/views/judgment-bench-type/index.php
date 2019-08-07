<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JudgmentBenchTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Bench Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-bench-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judgment Bench Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bench_type_id',
            'bench_type_text',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
