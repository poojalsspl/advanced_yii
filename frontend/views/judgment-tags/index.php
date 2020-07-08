<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JudgmentTagsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-tags-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Judgment Tags', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'doc_id',
            'judgment_title',
            'tag_name',
            'tag_value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
