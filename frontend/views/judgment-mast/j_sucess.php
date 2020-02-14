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
<div>
<p>
	All forms for the judgment <h3><?php echo $jtitle; ?></h3> completed. You may update forms anytime.
</p>
<p>You may write abstract for this judgment also, if you haven't write before.</p><br><br>
 <a class="btn btn-primary" href="/advanced_yii/judgment-mast/index">List of judgment</a>
 <a class="btn btn-primary" href="/advanced_yii/judgment-mast/judgment-abstract?jcode=<?php echo $jcode; ?>&doc_id=<?php echo $doc_id; ?>">Abstract Writing</a>
</div>