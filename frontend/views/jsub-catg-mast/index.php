<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JsubCatgMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jsub Catg Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jsub-catg-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jsub Catg Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jsub_catg_id',
            'jcatg_id',
            'jsub_catg_description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
