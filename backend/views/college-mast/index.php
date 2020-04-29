<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CollegeMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'College Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="college-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create College Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'college_code',
            'college_name',
            //'univ_code',
            'univ_name',
            'estd_yr',
            //'college_desc:ntext',
            //'college_logo',
            //'sponsor',
            //'startdate',
            //'enddate',
            //'address',
            //'zipcode',
            //'email:email',
            //'website',
            //'fax',
            //'tele',
            //'mobile',
            //'country_name',
            //'country_code',
            //'state_name',
            //'state_code',
            'city_name',
            //'city_code',
            //'prospectus',
            //'total_students',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
