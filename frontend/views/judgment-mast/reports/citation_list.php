<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\JudgmentCitation;

$this->title = 'Citation referred ';


?>

 <table class="table table-striped">
  <thead>
    <tr>
     <th>Citation</th>
     </tr>
  </thead>
  <tbody>
  <?php foreach ($models as $modelSingle) { 
?>
    <tr>
      <td><?= $modelSingle->citation ?></td>
    </tr>

    <?php } ?>
  </tbody>
</table>

