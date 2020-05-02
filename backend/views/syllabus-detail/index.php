<?php
/* @var $this yii\web\View */
?>
<h1>syllabus-detail/index</h1>

<?php
use yii\helpers\Html;
?>
 
<style>
table th,td{
    padding: 10px;
}
</style>
 
<?= Html::a('Create', ['syllabus-detail/create'], ['class' => 'btn btn-success']); ?>
 
<table border="1">
    <tr>
        <th>Course Code</th>
        <th>Course Name</th>
        <th>Course Duration</th>
        <th>Syllabus Cat. code</th>
        <th>Syllabus Cat. Name</th>
        <th>Total count</th>
        <th>Max Marks</th>
        <th>Stage</th>
    </tr>
    <?php foreach($model as $field){ ?>
    <tr>
        <td><?= $field->course_code; ?></td>
        <td><?= $field->course_name; ?></td>
        <td><?= $field->tot_days; ?></td>
        <td><?= $field->syllabus_catg_code; ?></td>
        <td><?= $field->syllabus_catg_name; ?></td>
        <td><?= $field->tot_count; ?></td>
        <td><?= $field->max_marks; ?></td>
        <td><?= $field->stage; ?></td>

    </tr>
    <?php } ?>
</table>
