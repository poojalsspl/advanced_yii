<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CountryMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Country Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Country Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'country_code',
            'country_name',
            'shrt_name',
            'court_group_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
