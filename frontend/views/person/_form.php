<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

?>

<div class="person-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

     <div class="row">
        <div class="col-sm-6">
            <?= $form->field($modelPerson, 'first_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($modelPerson, 'last_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.container-items',
        'widgetItem' => '.house-item',
        'limit' => 10,
        'min' => 1,
        'insertButton' => '.add-house',
        'deleteButton' => '.remove-house',
        'model' => $modelsHouse[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'description',
        ],
    ]); ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Houses</th>
                <th style="width: 450px;">Rooms</th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-house btn btn-success btn-xs"><span class="fa fa-plus"></span></button>
                </th>
            </tr>
        </thead>
        <tbody class="container-items">
        <?php foreach ($modelsHouse as $indexHouse => $modelHouse): ?>
            <tr class="house-item">
                <td class="vcenter">
                    <?php
                        // necessary for update action.
                        if (! $modelHouse->isNewRecord) {
                            echo Html::activeHiddenInput($modelHouse, "[{$indexHouse}]id");
                        }
                    ?>
                    <?= $form->field($modelHouse, "[{$indexHouse}]description")->label(false)->textInput(['maxlength' => true]) ?>
                </td>
                <td>
                    <?= $this->render('_form-rooms', [
                        'form' => $form,
                        'indexHouse' => $indexHouse,
                        'modelsRoom' => $modelsRoom[$indexHouse],
                    ]) ?>
                </td>
                <td class="text-center vcenter" style="width: 90px; verti">
                    <button type="button" class="remove-house btn btn-danger btn-xs"><span class="fa fa-minus"></span></button>
                </td>
            </tr>
         <?php endforeach; ?>
        </tbody>
    </table>
    <?php DynamicFormWidget::end(); ?>
    
    <div class="form-group">
        <?= Html::submitButton($modelPerson->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>