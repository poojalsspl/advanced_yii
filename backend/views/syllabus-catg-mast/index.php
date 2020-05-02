<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\SyllabusCatgMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Syllabus Catg Mast';
// $this->params['breadcrumbs'][] = $this->title;
?>
<style>
table th,td{
    padding: 10px;
}
</style>
<div class="syllabus-catg-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Syllabus Catg Mast', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<table border="1">
    <tr>
            <th>Syllabus Catg Code</th>
            <th>Syllabus Catg Name</th>
            <th>Action</th>
    </tr>
    <?php foreach($syllabus as $field){ ?>
    <tr>
           <td><?= $field->syllabus_catg_code; ?></td>
           <td><?= $field->syllabus_catg_name; ?></td>        
           <td><?= Html::a("Update", ['syllabus-catg-mast/update', 'id' => $field->syllabus_catg_code]); ?> | <?= Html::a("Delete", ['syllabus-catg-mast/delete', 'id' => $field->syllabus_catg_code]); ?></td>
    </tr>
    <?php } ?>
</table>
  


</div>
