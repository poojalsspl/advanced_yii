<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

//use frontend\models\ElementMast;
?>

<div class="judgment-mast-index">


    <h1><?php echo 'List of judgments allocated  ' ?></h1>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Judgment Title</th>
                <th>Court Name</th>
                <th>Judgment Date</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($models as $modelsdata){?>
            <tr>
                <td><?php echo $modelsdata['judgment_title'];?></td>
                <td><?php echo $modelsdata['court_name'];?></td>
                <td><?php echo $modelsdata['judgment_date'];?></td>
                <td><?php echo '<a href = "/advanced_yii/judgment-element/create?jcode='.$modelsdata['judgment_code'].'&doc_id='.$modelsdata['doc_id'].'"><span class="glyphicon glyphicon-pencil"></span></a>'; ?></td>
               
            </tr>
           <?php } ?>
           
        </tbody>
    </table>
