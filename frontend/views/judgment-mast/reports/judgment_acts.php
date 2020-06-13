<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\JudgmentAct;
use frontend\models\JudgmentMast;
use yii\widgets\LinkPager;

$this->title = 'Acts/Sections';
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
      <th>Acts/Section Count</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($models as $key => $model) { 
  $jcode = $model['j_doc_id'];
   $judgment_title = JudgmentMast::find()->select('judgment_title')->where(['username'=>$username])->andWhere(['doc_id' => $jcode])->all();
   foreach($judgment_title as $j_title){
    ?>
    <tr>
      
      <td><?= $j_title['judgment_title'] ?></td>
      <td><a href="/advanced_yii/judgment-mast/acts-list?dcode=<?php echo $jcode; ?>"><?= $model['acts_count'] ?></a></td>

      
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



