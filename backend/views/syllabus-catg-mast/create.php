<?php



use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SyllabusCatgMast */

$this->title = 'Create Syllabus Catg Mast';
$this->params['breadcrumbs'][] = ['label' => 'Syllabus Catg Masts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="syllabus-catg-mast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
