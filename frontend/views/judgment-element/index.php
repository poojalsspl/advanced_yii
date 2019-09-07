<?php
use yii\helpers\Html;
?>
 
<style>
table th,td{
    padding: 10px;
}
</style>
 
<?= Html::a('Create', ['judgment-element/create'], ['class' => 'btn btn-success']); ?>
 
<table border="1">
    <tr>
        <th>Code</th>
        <th>Text</th>
       
    </tr>
    <?php foreach($model as $field){ ?>
    <tr>
        <td><?= $field->judgment_code; ?></td>
        <td><?= $field->element_text; ?></td>
       
        <td><?= Html::a("Edit", ['judgment-element/edit', 'judgment_code' => $field->judgment_code]); ?> | <?= Html::a("Delete", ['judgment-element/delete', 'judgment_code' => $field->judgment_code]); ?></td>
    </tr>
    <?php } ?>
</table>