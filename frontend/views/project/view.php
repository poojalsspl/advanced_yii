<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Project */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

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
            'project_title',
            'pabstract',
            'judges',
            'advocates',
            'acts',
            'citation',
            'refrence',
            'preceeding',
            'disposition',
            'bench',
            'jurisdiction',
            'searchtag',
            'jcategory',
            'jsubcategory',
            'jlength',
            'bibliography',
            'overruled',
            'completion_date',
            'start_date',
        ],
    ]) ?>

</div>
