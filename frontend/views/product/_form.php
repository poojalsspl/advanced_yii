<?php
use frontend\models\Parcel;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Json;
use yii\helpers\Url;
?>
<div class="product-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false, // TODO get this working with client validation
    ]); ?>

    <?= $model->errorSummary($form); ?>

    <fieldset>
        <legend>Product</legend>
        <?= $form->field($model->product, 'name')->textInput() ?>
    </fieldset>

    <fieldset>
        <legend>Parcels
            <?php
            // new parcel button
            echo Html::a('New Parcel', 'javascript:void(0);', [
              'id' => 'product-new-parcel-button', 
              'class' => 'pull-right btn btn-default btn-xs'
            ])
            ?>
        </legend>
        <?php
        
        // parcel table
        $parcel = new Parcel();
        $parcel->loadDefaultValues();
        echo '<table id="product-parcels" class="table table-condensed table-bordered">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>' . $parcel->getAttributeLabel('code') . '</th>';
        echo '<th>' . $parcel->getAttributeLabel('height') . '</th>';
        echo '<th>' . $parcel->getAttributeLabel('width') . '</th>';
        echo '<th>' . $parcel->getAttributeLabel('depth') . '</th>';
        echo '<th>' . $parcel->getAttributeLabel('date_ordered') . '</th>';
        echo '<td>&nbsp;</td>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        
        // existing parcels fields
        foreach ($model->parcels as $key => $_parcel) {
          echo '<tr>';
          echo $this->render('_form-product-parcel', [
            'key' => $_parcel->isNewRecord ? (strpos($key, 'new') !== false ? $key : 'new' . $key) : $_parcel->id,
            'form' => $form,
            'parcel' => $_parcel,
          ]);
          echo '</tr>';
        }
        
        // new parcel fields
        echo '<tr id="product-new-parcel-block" style="display: none;">';
        echo $this->render('_form-product-parcel', [
            'key' => '__id__',
            'form' => $form,
            'parcel' => $parcel,
        ]);
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        
        // OPTIONAL: register JS assets as required for widgets
        //\zhuravljov\widgets\DatePickerAsset::register($this);
        \kartik\select2\Select2Asset::register($this);
        \yii\jui\JuiAsset::register($this);
        ?>

        <?php ob_start(); // output buffer the javascript to register later ?>
      
        <script>
            
            // add parcel button
            var parcel_k = <?php echo isset($key) ? str_replace('new', '', $key) : 0; ?>;
            $('#product-new-parcel-button').on('click', function () {
                parcel_k += 1;
                $('#product-parcels').find('tbody')
                  .append('<tr>' + $('#product-new-parcel-block').html().replace(/__id__/g, 'new' + parcel_k) + '</tr>');
                
                // OPTIONAL: datepicker on copied row
                $('#Parcels_new' + parcel_k + '_date_ordered').datepicker({
                    "autoclose": true,
                    "todayHighlight": true,
                    "format": "yyyy-mm-dd",
                    "orientation": "top left"
                });

                
                // OPTIONAL: select2 on copied row
                $('#Parcels_new' + parcel_k + '_date_ordered').select2({
                    theme: 'krajee',
                    placeholder: '',
                    language: 'en',
                    tags: true
                });

                // OPTIONAL: autocomplete on copied row
                $('#Parcels_new' + parcel_k + '_date_ordered').autocomplete({
                    "source": function(request, response) {
                            $.getJSON('<?=Url::to(['//moduleName/controller/actionName']);?>', {
                            term: request.term
                        }, response);
                    }
                });
                
            });
            
            // remove parcel button
            $(document).on('click', '.product-remove-parcel-button', function () {
                $(this).closest('tbody tr').remove();
            });
            
            <?php
            // OPTIONAL: click add when the form first loads to display the first new row
            if (!Yii::$app->request->isPost && $model->product->isNewRecord) 
              echo "$('#product-new-parcel-button').click();";
            ?>
            
            // OPTIONAL: datepicker on existing rows
            $('#product-parcels').find('input.addDatepicker').datepicker({
                "autoclose": true,
                "todayHighlight": true,
                "format": "yyyy-mm-dd",
                "orientation": "top left"
            });
            
            // OPTIONAL: select2 on existing rows
            $('#product-parcels').find('select.addSelect2:visible').select2({
                theme: 'krajee',
                placeholder: '',
                language: 'en',
                tags: true
            });
            
            // OPTIONAL: autocomplete on existing rows
            $('#product-parcels').find('input.addAutocomplete:visible').autocomplete({
                "source": function(request, response) {
                        $.getJSON('<?=Url::to(['//moduleName/controller/actionName']);?>', {
                        term: request.term
                    }, response);
                }
            });

        </script>
        <?php $this->registerJs(str_replace(['<script>', '</script>'], '', ob_get_clean())); ?>

    </fieldset>

    <?= Html::submitButton('Save'); ?>
    <?php ActiveForm::end(); ?>

</div>