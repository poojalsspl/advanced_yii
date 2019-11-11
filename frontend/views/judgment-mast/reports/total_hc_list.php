<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\JudgmentMast;

$this->title = 'High Court Judgment Allocated';
$count = 1;

?>
 <table class="table table-striped table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>Judgment Title</th>
      <th>Judgment Date</th>
      <th>Court Name</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($models as $modelSingle) { ?>
    <tr>
      <th><?= $count++; ?></th>
      <td><?= $modelSingle->judgment_title ?></td>
      <td><?= $modelSingle->judgment_date ?></td>
      <td><?= $modelSingle->court_name ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

