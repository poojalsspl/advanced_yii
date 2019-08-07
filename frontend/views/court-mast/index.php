<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CourtMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Court Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="court-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Court Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'court_code',
            'court_name',
            'court_shrt_name',
            'court_type',
            'bench_status',
            //'court_status',
            //'city_code',
            //'city_name',
            //'state_code',
            //'state_name',
            //'country_code',
            //'country_name',
            //'court_remark',
            //'court_address',
            //'bench_code',
            //'court_type_shrt_name',
            //'court_group_code',
            //'court_group_name',
            //'court_type_name',
            //'bench_name',
            //'court_flag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
