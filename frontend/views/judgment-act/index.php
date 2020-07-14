<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JudgmentActSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Acts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-act-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judgment Act', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'j_doc_id',
            //'judgment_code',
            'judgment_title',
            'id',
            'doc_id',
            //'act_group_code',
            //'act_group_desc',
            //'act_catg_code',
            //'act_catg_desc',
            //'act_sub_catg_code',
            //'act_sub_catg_desc',
            //'act_title',
            //'country_code',
            //'country_shrt_name',
            //'bareact_code',
            //'bareact_desc',
            //'court_code',
            //'court_name',
            //'court_shrt_name',
            //'bench_code',
            //'bench_name',
            //'level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
