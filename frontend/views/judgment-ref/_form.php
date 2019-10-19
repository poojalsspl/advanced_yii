<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentRef;
use frontend\models\JudgmentMastSearch;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentRef */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$jcode  = '';
if($_GET)
{
$jcode  = $_GET['jcode'];

}
?>
<?php
    $searchModel       = new JudgmentMastSearch();
    $dataProvider      = $searchModel->search(Yii::$app->request->queryParams);
    $judegmentCode     = $jcode;
    $judgmentRef = JudgmentRef::find()->where(['judgment_code'=>$judegmentCode])->all();
?>

<div class="judgment-ref-form tab-content box box-info col-md-12">

    <table class="table table-bordered table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>Judgment Title Ref</th>
      <th>  <?= Html::a('Delete All', ['deleteall','jcode'=>$judegmentCode],['class' =>  'btn btn-danger pull-right']) ?></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($judgmentRef as $judgmentRefSingle) { ?>
    <tr>
      <th scope="row"><?= $judgmentRefSingle->id ?></th>
      <td><?= $judgmentRefSingle->judgment_title_ref ?></td>
      <td><?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['singledelete','id'=>$judgmentRefSingle->id,'jcode'=>$jcode],['class' => 'btn btn-block btn-danger btn-xs']) ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            
            'court_name',
            'judgment_date',
           
            'judgment_title',
            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Actions',
            'template' => '{Add}', 
            'buttons' => [
                'Add' => function ($url, $model, $key) use ($judegmentCode) {
                    return Html::a('<span class="glyphicon glyphicon-plus"></span>', ['adddata','id'=>$model->judgment_code,'jcode'=>$judegmentCode],['class' => 'btn btn-block btn-primary btn-xs add-data']);
                },
                'format' => 'raw',
              ],
            'contentOptions' => [ "class"=>'action-btns', 'width'=>''],
        ],
      ],
    ]); ?>

</div>

<style type="text/css">
.position-check
{
    margin: -38px 25px 26px 16px;
}
        
</style>



