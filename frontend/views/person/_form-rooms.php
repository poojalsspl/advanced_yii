<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;

?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_inner',
    'widgetBody' => '.container-rooms',
    'widgetItem' => '.room-item',
    'limit' => 4,
    'min' => 1,
    'insertButton' => '.add-room',
    'deleteButton' => '.remove-room',
    'model' => $modelsRoom[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'description'
    ],
]); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Description</th>
            <th class="text-center">
                <button type="button" class="add-room btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
            </th>
        </tr>
    </thead>
    <tbody class="container-rooms">
    <?php foreach ($modelsRoom as $indexRoom => $modelRoom): ?>
        <tr class="room-item">
            <td class="vcenter">
                <?php
                    // necessary for update action.
                    if (! $modelRoom->isNewRecord) {
                        echo Html::activeHiddenInput($modelRoom, "[{$indexHouse}][{$indexRoom}]id");
                    }
                ?>
                <?= $form->field($modelRoom, "[{$indexHouse}][{$indexRoom}]description")->label(false)->textInput(['maxlength' => true]) ?>
            </td>
            <td class="text-center vcenter" style="width: 90px;">
                <button type="button" class="remove-room btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
            </td>
        </tr>
     <?php endforeach; ?>
    </tbody>
</table>
<?php DynamicFormWidget::end(); ?>