<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BareactDetlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bareact Detls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bareact-detl-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bareact Detl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'level',
            'sno',
            'doc_id',
            'bareact_code',
            //'bareact_desc',
            //'act_group_code',
            //'act_group_desc',
            //'act_catg_code',
            //'act_catg_desc',
            //'act_sub_catg_code',
            //'act_sub_catg_desc',
            //'act_title',
            //'enact_date',
            //'act_status_mast',
            //'act_status_detl',
            //'pdoc_id',
            //'pdoc_txt',
            //'sdoc_id',
            //'sdoc_txt',
            //'cdoc_id',
            //'act_state',
            //'sec_id',
            //'chapt_no',
            //'chapt_title',
            //'sec_title',
            //'ref_doc_id',
            //'body:ntext',
            //'docid_ind',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
