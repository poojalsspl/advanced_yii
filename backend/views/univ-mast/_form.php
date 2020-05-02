<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use frontend\models\CountryMast;
use frontend\models\StateMast;
use frontend\models\CityMast;


/* @var $this yii\web\View */
/* @var $model backend\models\UnivMast */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="univ-mast-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'univ_name')->textInput(['maxlength' => true]) ?>

    <?php $country = ArrayHelper::map(CountryMast::find()->all(), 'country_code', 'country_name'); ?>

    <?= $form->field($model, 'country_code')->dropDownList($country, ['id'=>'country_code','prompt'=>'Select...'])->label('Country');?>

    <?=$form->field($model, 'state_code')->widget(DepDrop::classname(), [
                                    'data'=>ArrayHelper::map(StateMast::find()->all(), 'state_code', 'state_name' ),
                                    'options'=>['id'=>'state_code', 'placeholder' => 'Select state'],
                                    'pluginOptions'=>[
                                    'depends'=>['country_code'],
                                    'placeholder'=>'Select state',
                                    'url'=>\yii\helpers\Url::to(['univ-mast/subcat'])
                                     ]
                                    ])->label('State');?>

    <?=$form->field($model, 'city_code')->widget(DepDrop::classname(), [
                                    'data'=>ArrayHelper::map(CityMast::find()->all(), 'city_code', 'city_name' ),
                                    'options'=>['placeholder' => 'Select city'],
                                    'pluginOptions'=>[
                                    'depends'=>['state_code'],
                                    'placeholder'=>'Select city',
                                    'url'=>\yii\helpers\Url::to(['univ-mast/subcity'])
                                    ]
                                ])->label('City');?>

    <?= $form->field($model, 'univ_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'univ_type')->textInput(['maxlength' => true]) ?>

    <?php $univ = ['Active'=>'Active','Not Active'=>'Not Active'];?>
    <?= $form->field($model, 'univ_status')->dropDownList($univ, ['prompt'=>'Select...'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
