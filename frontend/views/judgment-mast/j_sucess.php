<?php 
//$jcode = $_GET['jcode'];
//$doc_id = $_GET['doc_id'];
use frontend\models\JudgmentMast;
use yii\helpers\ArrayHelper;


$judgment = ArrayHelper::map(JudgmentMast::find()->where(['judgment_code'=>$jcode])->all(),
    'judgment_code','judgment_title');
 foreach ($judgment as $jtitle) {
 $jtitle;
  }

?>
<p>
	All forms for the judgment <h3><?php echo $jtitle; ?></h3> completed. You may update forms anytime.
</p>
 <a class="btn btn-primary" href="/advanced_yii/judgment-mast/index">List of judgment</a>