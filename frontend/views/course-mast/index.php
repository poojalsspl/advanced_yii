<?php
use yii\helpers\Html;
?>
 
<style>
table th,td{
    padding: 10px;
}
</style>
 
<?= Html::a('Create', ['course-mast/creates'], ['class' => 'btn btn-success']); ?>
 
<table border="1">
    <tr>
        <th>Course Code</th>
        <th>Course Name</th>
        <th>Course Duration</th>
        <th>Course Fees</th>
        <th>Action</th>
    </tr>
    <?php foreach($model as $field){ ?>
    <tr>
        <td><?= $field->course_code; ?></td>
        <td><?= $field->course_name; ?></td>
        <td><?= $field->course_duration; ?></td>
        <td><?= $field->course_fees; ?></td>
        <td><?= Html::a("Edit", ['course-mast/edits', 'course_code' => $field->course_code]); ?> | <?= Html::a("Delete", ['course-mast/delete', 'course_code' => $field->course_code]); ?></td>
    </tr>
    <?php } ?>
</table>