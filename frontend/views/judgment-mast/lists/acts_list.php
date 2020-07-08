<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\JudgmentAct;

$this->title = 'Acts & Sections Imposed ';

?>

 <table class="table table-striped">
  <thead>
    <tr>
     <th>Bareact Description</th>
     <th>Group</th>
     <th>Main Act Category</th>
     <th>Act SubCategory</th>
     <th>Act Title</th>
     </tr>
  </thead>
  <tbody>
  <?php foreach ($models as $modelSingle) { 
?>
    <tr>
      <td><?= $modelSingle->bareact_desc ?></td>
      <td><?= $modelSingle->act_group_desc ?></td>
      <td><?= $modelSingle->act_catg_desc ?></td>
      <td><?= $modelSingle->act_sub_catg_desc ?></td>
      <td><a href="/advanced_yii/judgment-mast/acts-title?brcode=<?php echo $modelSingle->bareact_code; ?>&title=<?php echo $modelSingle->sec_title ?>" ><?= $modelSingle->sec_title ?></a></td>

    </tr>

    <?php } ?>
  </tbody>
</table>

