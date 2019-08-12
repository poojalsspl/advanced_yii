<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PoojaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Crud List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pooja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?php //Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php /*GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'judgment_code',
            'court_code',
            'judgment_date',
            'jyear',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */ ?>

    <div>
    
        <ul>
        <li><a href="/advanced_yii/jcatg-mast" >Judgment Category</a></li>
        <li><a href="/advanced_yii/jsub-catg-mast" >Judgment Subcategory </a></li>
        <li><a href="/advanced_yii/judgment-bench-type" >Bench Master </a></li>
        <li><a href="/advanced_yii/judgment-disposition" >Disposition Master </a></li>
        <li><a href="/advanced_yii/judgment-jurisdiction" >Jurisdiction Master </a></li>
        <li><a href="/advanced_yii/judgment-act" >Acts Referred</a></li>
        <li><a href="/advanced_yii/judgment-advocate" >Judgment Advocates</a></li>
        <li><a href="/advanced_yii/judgment-citation" >Judgment Citations</a></li>
        <li><a href="/advanced_yii/judgment-ext-remark" >Judgment Ext Reference</a></li>
        <li><a href="/advanced_yii/judgment-judge" >Judgment Coram</a></li>
        <li><a href="/advanced_yii/judgment-parties" >Appellant – Respondent</a></li>
        <li><a href="/advanced_yii/judgment-mast" >Judgments</a></li>
        </ul>

         <ul>
        <li><a href="/advanced_yii/bareact-catg-mast" >BareactCatg Category</a></li>
        <li><a href="/advanced_yii/bareact-mast" >Barect Master </a></li>
        <li><a href="/advanced_yii/city-mast" >City Master </a></li>
        <li><a href="/advanced_yii/country-mast" >Country Master </a></li>
        <li><a href="/advanced_yii/state-mast" >State Master</a></li>
        <li><a href="/advanced_yii/court-mast" >Court Master </a></li>
        <li><a href="/advanced_yii/journal-mast" >Journal Mast</a></li>
        <li><a href="/advanced_yii/judgment-cited-by" >Cited By</a></li>
        <li><a href="/advanced_yii/judgment-overruledby" >Overruled By</a></li>
        <li><a href="/advanced_yii/judgment-overrules" >OverRules</a></li>

         </ul>   

    </div>


</div>
