<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\JudgmentDataPoint;

$this->title = 'DataPoints';


?>

 <table class="table table-striped">
  <thead>
    <tr>
      
      <th>Element Name</th>
      <th>Datapoint</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($models as $modelSingle) { ?>
    <tr>
      
      <td><?= $modelSingle->element_name ?></td>
      <td><?= $modelSingle->data_point ?></td>
      
    </tr>

    <?php } ?>
  </tbody>
</table>

