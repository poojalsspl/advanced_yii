<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\JudgmentCitation;
use frontend\models\JudgmentMast;

$this->title = 'Judgments DataPoint';
//print_r($models);die;
 /*foreach ($models as $key => $model) { 
    print_r($model);die;
  }*/
  $username = \Yii::$app->user->identity->username;
?>

<table class="table table-striped">
  <thead>
    <tr>
      
      <th>Judgment Title</th>
      <th>DataPoint Count</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($models as $key => $model) { 
  $doc_id = $model['doc_id'];
   $judgment_title = JudgmentMast::find()->select('judgment_title')->where(['username'=>$username])->andWhere(['doc_id' => $doc_id])->all();
   foreach($judgment_title as $j_title){
    ?>
    <tr>
      
      <td><?= $j_title['judgment_title'] ?></td>
      <td><a href="/advanced_yii/judgment-mast/datapoints-list?doc_id=<?php echo $doc_id; ?>"><?= $model['datapoint_count'] ?></a></td>

      
    </tr>

    <?php }} ?>
  </tbody>
</table>


