<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentRef */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Refs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="judgment-ref-view">

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
            'username',
            'judgment_code',
            'doc_id',
            'judgment_title',
            'judgment_code_ref',
            'court_code',
            'court_name',
            'doc_id_ref',
            'judgment_title_ref',
            'court_code_ref',
            'court_name_ref',
            'flag',
            'exam_status',
        ],
    ]) ?>

</div>
