<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\BareactDetl */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bareact Detls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bareact-detl-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'level',
            'sno',
            'doc_id',
            'bareact_code',
            'bareact_desc',
            'act_group_code',
            'act_group_desc',
            'act_catg_code',
            'act_catg_desc',
            'act_sub_catg_code',
            'act_sub_catg_desc',
            'act_title',
            'enact_date',
            'act_status_mast',
            'act_status_detl',
            'pdoc_id',
            'pdoc_txt',
            'sdoc_id',
            'sdoc_txt',
            'cdoc_id',
            'act_state',
            'sec_id',
            'chapt_no',
            'chapt_title',
            'sec_title',
            'ref_doc_id',
            'body:ntext',
            'docid_ind',
        ],
    ]) ?>

</div>
