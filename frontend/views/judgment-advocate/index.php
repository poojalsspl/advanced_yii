<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JudgmentAdvocateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Advocates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-advocate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judgment Advocate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'judgment_code',
            'advocate_name',
            'advocate_flag',
            'doc_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
