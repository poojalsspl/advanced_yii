<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JournalMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Journal Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Journal Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'journal_code',
            'journal_name',
            'shrt_name',
            'pub_freq',
            'remark',
            //'court_code',
            //'court_name',
            //'city_code',
            //'state_code',
            //'country_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
