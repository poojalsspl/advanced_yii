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
<div class="model_array"></div>

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









