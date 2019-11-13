<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\JudgmentElement;

$this->title = 'Judgment Element';


?>

 <table class="table table-striped">
  <thead>
    <tr>
      
      <th width="10%">Element Name</th>
      <th>Element Text</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($models as $modelSingle) { ?>
    <tr>
      
      <td><?= $modelSingle->element_name ?></td>
      <td><?= $modelSingle->element_text ?></td>
      
    </tr>

    <?php } ?>
  </tbody>
</table>

