<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentMast */

$this->title = $model->judgment_code;
$this->params['breadcrumbs'][] = ['label' => 'Judgment Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-mast-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->judgment_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->judgment_code], [
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
            'judgment_code',
            'court_code',
            'court_name',
            'appeal_numb',
            'judgment_date',
            'judgment_title',
            'appellant_name',
            'appellant_adv',
            'appellant_adv_count',
            'respondant_name',
            'respondant_adv',
            'respondant_adv_count',
            'appeal_status',
            'citation',
            'citation_count',
            'judges_name',
            'judges_count',
            'hearing_date',
            'hearing_place',
            'judgment_abstract:ntext',
            'judgment_text:ntext',
            'doc_id',
            'judgment_type',
            'judgment_source_name',
            'jcatg_description',
            'jcatg_id',
            'jsub_catg_description',
            'jsub_catg_id',
            'overrule_judgment',
            'overruled_by_judgment',
            'judgment_ext_remark_flag',
        ],
    ]) ?>

</div>
