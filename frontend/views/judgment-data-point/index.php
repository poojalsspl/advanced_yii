<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JudgmentDataPointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Data Points';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-data-point-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judgment Data Point', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'judgment_code',
            'element_code',
            'element_name',
            'data_point',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
