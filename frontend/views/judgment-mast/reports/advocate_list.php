<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\JudgmentAdvocate;

$this->title = 'Advocate Appeared';


?>

 <table class="table table-striped">
  <thead>
    <tr>
      
      <th>Advocate Type</th>
      <th>Advocate Name</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($models as $modelSingle) { 
       if($modelSingle->advocate_flag=='1'){
$flag_name = 'Petitioner';
}if($modelSingle->advocate_flag=='2'){
$flag_name = 'Appellant';
}if($modelSingle->advocate_flag=='3'){
$flag_name =  'Applicant';
}if($modelSingle->advocate_flag=='4'){
$flag_name =  'Defendant';
}if($modelSingle->advocate_flag=='5'){
$flag_name =  'Respondent';
}if($modelSingle->advocate_flag=='6'){
$flag_name =  'Intervener';
}

?>
    <tr>
      
      <td><?= $flag_name ?></td>
      <td><?= $modelSingle->advocate_name ?></td>
      
    </tr>

    <?php } ?>
  </tbody>
</table>

