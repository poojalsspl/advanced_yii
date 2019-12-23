<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StateMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'State Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="state-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create State Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'state_code',
            'state_name',
            'shrt_name',
            'zone',
            'country_code',
            //'country_name',
            //'country_shrt_name',
            //'cr_date',
            //'status',
            [
            'label' => 'countryCode',
            'value' => 'countryCode.country_name',
           ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    


</div>
