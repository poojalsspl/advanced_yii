<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UnivMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Univ Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="univ-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Univ Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'univ_code',
            'univ_name',
            
            [
              'attribute' => 'city_code',
              'value' => 'city.city_name'
            ],
            [
              'attribute' => 'state_code',
              'value' => 'state.state_name'
            ],
            [
              'attribute' => 'country_code',
              'value' => 'country.country_name'
            ],
            //'univ_desc:ntext',
            //'univ_type',
            //'univ_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
