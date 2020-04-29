<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticleCatgMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Article Catg Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-catg-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article Catg Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'art_catg_id',
            'art_catg_name',
            //'role',
            //'parent_catg_id',
           // 'menu_flag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
