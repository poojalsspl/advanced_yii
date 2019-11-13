<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\JudgmentRef;

$this->title = 'Judgment Referred';
//print_r($models);die;

?>

 <table class="table table-striped">
  <thead>
    <tr>
      <th>Judgment Title Referred</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($models as $modelSingle) { ?>
    <tr>
      <td><?= $modelSingle->judgment_title_ref ?></td>
    </tr>

    <?php } ?>
  </tbody>
</table>

