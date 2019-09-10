<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model frontend\models\JudgmentElement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="judgment-element-form">

    <?php $form = ActiveForm::begin(); ?>

   
      
      
        <table>
             <?php
    foreach ($products as $index => $product) {
        for ($i=0; $i < 6; $i++) { 
            # code...
        
        ?>
            <tr>
        <?php
    echo "<td>". $form->field($product, "[$i]element_name")->label($product->element_name)."</td>";
    echo "<td>". $form->field($product, "[$i]element_text")->label($product->element_text)->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'advanced'
    ])."</td>";
?>
</tr>
<?php
}
}

    ?>
   
</table>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php 

   // $this->registerJs("CKEDITOR.replace('judgmentelement-element_text',{toolbar : 'Basic'})");

?>
