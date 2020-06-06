<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAct */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Acts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="judgment-act-view">

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
            'j_doc_id',
            'judgment_code',
            'judgment_title',
            'id',
            'doc_id',
            'act_group_code',
            'act_group_desc',
            'act_catg_code',
            'act_catg_desc',
            'act_sub_catg_code',
            'act_sub_catg_desc',
            'act_title',
            'country_code',
            'country_shrt_name',
            'bareact_code',
            'bareact_desc',
            'court_code',
            'court_name',
            'court_shrt_name',
            'bench_code',
            'bench_name',
            'level',
        ],
    ]) ?>

</div>
