<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\JudgmentRef;
use frontend\models\JudgmentMast;

$this->title = 'Judgment Referred';
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
      <th>Citation Count</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($models as $key => $model) { 
  $jcode = $model['judgment_code'];
   $judgment_title = JudgmentMast::find()->select('judgment_title')->where(['username'=>$username])->andWhere(['judgment_code' => $jcode])->all();
   foreach($judgment_title as $j_title){
    ?>
    <tr>
      
      <td><?= $j_title['judgment_title'] ?></td>
      <td><a href="/advanced_yii/judgment-mast/referred-list?jcode=<?php echo $jcode; ?>"><?= $model['referred_count'] ?></a></td>

      
    </tr>

    <?php }} ?>
  </tbody>
</table>


