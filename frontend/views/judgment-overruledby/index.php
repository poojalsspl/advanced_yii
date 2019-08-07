<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JudgmentOverruledbySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Overruledbies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-overruledby-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judgment Overruledby', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'judgment_code',
            'over_ruledby_code',
            'over_ruledby_title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
