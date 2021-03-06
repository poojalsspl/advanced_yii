<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\JudgmentCitation;
use frontend\models\JudgmentMast;
use yii\widgets\LinkPager;


$this->title = 'Citations Referred';
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
     
      
    </tr>

    <?php }} ?>
  </tbody>
</table>
<!-- display pagination -->
    <?php 
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>


