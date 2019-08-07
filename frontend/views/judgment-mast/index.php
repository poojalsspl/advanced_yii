<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\grid\ActionColumn;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\JudgmentMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Judgment Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="judgment-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <!--  <p>
        <?php// Html::a('Create Judgment Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

/*            'judgment_code',
            'court_code',*/
             
            'court_name',
            'judgment_date',
            'jyear',
            'judgment_title',

            // 'appeal_numb',
            // 'appellant_name',
            // 'appellant_adv',
            // 'appellant_adv_count',
            // 'respondant_name',
            // 'respondant_adv',
            // 'respondant_adv_count',
            // 'appeal_status',
            // 'citation',
            // 'citation_count',
            // 'judges_name',
            // 'judges_count',
            // 'hearing_date',
            // 'hearing_place',
            // 'judgment_abstract:ntext',
            // 'judgment_text:ntext',
            // 'judgment_source_code',
            // 'judgment_type',
            // 'judgment_source_name',
            // 'jcatg_description',
            // 'jcatg_id',
            // 'jsub_catg_description',
            // 'jsub_catg_id',
            // 'overrule_judgment',
            // 'overruled_by_judgment',
            // 'judgment_ext_remark_flag',
           //['class' => 'yii\grid\ActionColumn'],
           ['class' => ActionColumn::className(),'template'=>'{view} {update}' ],

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
