<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\JudgmentJudge;

$this->title = 'Judges Appeared';


?>

 <table class="table table-striped">
  <thead>
    <tr>
     <th>Judge Name</th>
     </tr>
  </thead>
  <tbody>
  <?php foreach ($models as $modelSingle) { 
?>
    <tr>
      <td><?= $modelSingle->judge_name ?></td>
    </tr>

    <?php } ?>
  </tbody>
</table>

