<?php
use yii\helpers\Html;
$this->title = 'Record Not Found';
?>
<h1><?= Html::encode($this->title) ?></h1>
<br>
<div class="container">
	<div class="row">
		<div class="box box-v3">
            <div class="box-header with-border box-header-custom">
                <div class="row">
                    <div class="col-sm-12">
                        <span><center>Content is not available.</center></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <p>If you want to upload document, you may upload document </p>
        <a href="<?php echo Yii::$app->params['domainName']?>/site/student-doc" class="btn btn-primary">Upload Document</a>
    </div>
</div>


