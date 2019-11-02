<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentElement */

/*$this->title = $model->id;

$this->params['breadcrumbs'][] = $this->title;*/
$this->params['breadcrumbs'][] = ['label' => 'Judgment Elements', 'url' => ['index']];
\yii\web\YiiAsset::register($this);
?>
<div class="judgment-element-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'judgment_code',
            //'element_code',
            'element_name',
            'element_text:ntext',
            //'weight_perc',
            'element_word_length',
        ],
    ]) ?>

</div>
