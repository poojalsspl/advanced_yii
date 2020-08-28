<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\BareactMast */

$this->title = $model->bareact_code;
$this->params['breadcrumbs'][] = ['label' => 'Bareact Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bareact-mast-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->bareact_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->bareact_code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'doc_id',
            //'bareact_code',
            'bareact_desc',
            //'act_group_code',
            'act_group_desc',
            //'act_catg_code',
            'act_catg_desc',
            //'act_status',
            //'enact_date',
            //'ref_doc_id',
           // 'act_sub_catg_code',
            'act_sub_catg_desc',
            //'tot_section',
            //'tot_chap',
            //'country_code',
            //'country_name',
        ],
    ]) ?>

</div>
