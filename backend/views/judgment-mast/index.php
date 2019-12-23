<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JudgmentMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judgment Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            //'college_code',
            //'judgment_code',
            //'court_code',
            'court_name',
            //'court_type',
            //'appeal_numb',
            //'appeal_numb1',
            //'judgment_date',
            //'judgment_date1',
            'judgment_title',
            //'appeal_status',
            //'disposition_id',
            //'disposition_id1',
            //'disposition_text',
            //'bench_type_id',
            //'bench_type_id1',
            //'bench_type_text',
            //'judgment_jurisdiction_id',
            //'judgment_jurisdiction_id1',
            //'judgmnent_jurisdiction_text',
            //'judgment_abstract:ntext',
            //'judgment_analysis:ntext',
            //'judgment_text:ntext',
            //'judgment_text1:ntext',
            //'search_tag',
            //'doc_id',
            //'judgment_type',
            //'judgment_type1',
            //'jcatg_id',
            //'jcatg_id1',
            //'jcatg_description',
            //'jsub_catg_id',
            //'jsub_catg_id1',
            //'jsub_catg_description',
            //'overrule_judgment',
            //'overruled_by_judgment',
            //'remark',
            //'time',
            //'approved',
            //'approved_date',
            //'status_1',
            //'status_2',
            //'completion_status',
            'completion_date',
            //'research_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
