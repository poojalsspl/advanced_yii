<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CityMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'City Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create City Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'city_code',
            'city_name',
            'shrt_name',
            'state_code',
            //'state_name',
            //'state_shrt_name',
            //'country_code',
            //'country_name',
            //'country_shrt_name',
            //'court_stat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
