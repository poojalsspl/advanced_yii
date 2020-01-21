<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */


AppAsset::register($this);

dmstr\web\AdminLteAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse <?= \dmstr\helpers\AdminLteHelper::skinClass()?>">
<?php $this->beginBody() ?>
<div class="wrapper">

    <?= $this->render(
        'header.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>

    <?= $this->render(
        'content.php',
        ['content' => $content, 'directoryAsset' => $directoryAsset]
    ) ?><br><br><br><br>

</div>
<div class="footer-wrapper footer-custom">
    <?= $this->render(
        'footer.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'class' => 'main-modal',
    'size' => 'modal-lg',
    'closeButton' => [
        'id'=>'close-button',
        'class'=>'close',
        'data-dismiss' =>'modal',
        ],
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'options' => [
        'data-backdrop' => 'static', 'keyboard' => true,
        'tabindex' => false
        ]
]);
echo "<div id='modalContent'><div style='text-align:center; margin-left: 1px !important;'>" . Html::img('@web/images/load.gif')  . "</div></div>";
echo '<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>';
yii\bootstrap\Modal::end();
?>

