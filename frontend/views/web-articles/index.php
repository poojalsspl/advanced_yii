<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\WebArticlesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web Articles';

?>
<div class="web-articles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Web Articles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'art_date',
            //'pub_date',
            //'username',
            'title',
            //'abstract_image',
            //'slider_image',
            //'body:ntext',
            //'art_catg_id',
            'sef_title',
            //'sef_description',
            //'sef_keyword',
            //'sef_alt',
            //'status',
            'author',
            //'abstract_image_title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
