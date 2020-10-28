<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;


//use frontend\models\ElementMast;
?>


<div class="judgment-mast-index">


    <h1><?php echo 'List of judgments For <b>Judgment Elements</b> ' ?></h1>

   <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'judgment_title',
            'court_name',
            'judgment_date',
            'start_date',
            'completion_date',
            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Actions',
            'template' => '{Edit}', 
            'buttons' => [
               'Edit' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['judgment-element/create', 'doc_id'=>$model->doc_id]);
                       },
            'format' => 'raw',
              ],
                 'contentOptions' => [ "class"=>'action-btns', 'width'=>''],
        ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
