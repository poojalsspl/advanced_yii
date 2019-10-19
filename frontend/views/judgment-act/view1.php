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

<table id="list" class="display nowrap" style="width:60%;" border="1">
  <thead>
    <tr>
      
       <th><center>Act Title</center></th>
     
    </tr>
  </thead>
  <tbody>
  <?php foreach ($model as $row): ?>
    <tr>

      
       <?php echo $row['act_title']; ?>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="" height="5px"><br>
      
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php
die;
?>









