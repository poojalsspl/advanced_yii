<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentRef;
use frontend\models\JudgmentMastSearch;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentRef */
/* @var $form yii\widgets\ActiveForm */
$this->params['breadcrumbs'][] = ['label' => 'Judgment Allocated', 'url' => ['judgment-mast/index']];
?>

<?php
$jcode  = '';
if($_GET)
{
$jcode  = $_GET['jcode'];

}
$judgment = ArrayHelper::map(JudgmentMast::find()
  //->andWhere(['not in','judgment_code',$j_code])
  ->where(['judgment_code'=>$jcode])
  ->all(),
    'judgment_code',
    function($result) {

        return $result['court_name'].'::'.$result['judgment_title'];
    });
?>
<?php $form = ActiveForm::begin(); ?>
 <?= $form->field($model, 'judgment_code')->widget(Select2::classname(), [
    'data' => $judgment,
    'initValueText' => $jcode,
    'disabled'=>true,
    'options' => ['placeholder' => 'Select Judgment Code','value'=>$jcode],
   
     ])->label('Judgment Title'); ?>
     <?php ActiveForm::end(); ?>
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
      <th>Referred Judgment Title </th>
      <th>  <?php //echo Html::a('Delete All', ['deleteall','jcode'=>$judegmentCode],['class' =>  'btn btn-danger pull-right']) ?></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($judgmentRef as $judgmentRefSingle) { ?>
    <tr>
      <th scope="row"><?= $judgmentRefSingle->id ?></th>
      <td><?= $judgmentRefSingle->judgment_title_ref ?></td>
      <td><?php //echo Html::a('<span class="glyphicon glyphicon-trash"></span>', ['singledelete','id'=>$judgmentRefSingle->id,'jcode'=>$jcode],['class' => 'btn btn-block btn-danger btn-xs']) ?></td>
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



