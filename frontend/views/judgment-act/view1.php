<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentAct */

//echo '<pre>';print_r($model); die;
\yii\web\YiiAsset::register($this);
// echo "<pre>";
// // print_r($bareact);die;
// print_r(json_decode($model));
// echo "</pre>";
?>
<div class="model_array"><?php  echo json_encode($model) ?></div>

<table id="list" class="display nowrap" style="width:100%;" border="1">
  <thead>
    <tr>
      <th>Doc Id</th>
      <th>act_group_desc</th>
      <th>act_catg_desc</th>
      <th>act_title</th>
      <th>act_sub_catg_desc</th>
      <th>level</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($model as $row): ?>
    <tr>
      <td><?php echo $row['doc_id']; ?></td>
      <td><?php echo $row['act_group_desc']; ?></td>
      <td><?php echo $row['act_catg_desc']; ?></td>
      <td><?php echo $row['act_title']; ?></td>
      <td><?php echo $row['act_sub_catg_desc']; ?></td>
      <td><?php echo $row['level']; ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php
die;
?>








<div class="judgment-act-view">

    <h1><?= Html::encode($this->title) ?></h1>

      <?= GridView::widget([
        'dataProvider' => $model,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'doc_id',
            'act_group_desc',
            'act_group_code',
            'act_catg_desc',
            'act_title',
            //'act_group_code',
            //'act_group_desc',
            //'act_catg_code',
            //'act_catg_desc',
            //'act_sub_catg_code',
            //'act_sub_catg_desc',
            //'act_title',
            //'country_code',
            //'country_shrt_name',
            //'bareact_code',
            //'bareact_desc',
            //'court_code',
            //'court_name',
            //'court_shrt_name',
            //'bench_code',
            //'bench_name',
            //'level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

   

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
