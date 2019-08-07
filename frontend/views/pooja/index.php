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
    
        <ul class="treeview-menu">
        <li><a href="/advanced_yii/jcatg-mast" ><i class="fa fa-circle-o"></i>Judgment Category</a></li>
        <li><a href="/advanced_yii/jsub-catg-mast" ><i class="fa fa-circle-o"></i>Judgment Subcategory </a></li>
        <li><a href="/advanced_yii/judgment-bench-type" ><i class="fa fa-circle-o"></i>Bench Master </a></li>
        <li><a href="/advanced_yii/judgment-disposition" ><i class="fa fa-circle-o"></i>Disposition Master </a></li>
        <li><a href="/advanced_yii/judgment-jurisdiction" ><i class="fa fa-circle-o"></i>Jurisdiction Master </a></li>
        <li><a href="/advanced_yii/judgment-act" ><i class="fa fa-circle-o"></i>Acts Referred</a></li>
        <li><a href="/advanced_yii/judgment-advocate" ><i class="fa fa-circle-o"></i>Judgment Advocates</a></li>
        <li><a href="/advanced_yii/judgment-citation" ><i class="fa fa-circle-o"></i>Judgment Citations</a></li>
        <li><a href="/advanced_yii/judgment-ext-remark" ><i class="fa fa-circle-o"></i>Judgment Ext Reference</a></li>
        <li><a href="/advanced_yii/judgment-judge" ><i class="fa fa-circle-o"></i>Judgment Coram</a></li>
        <li><a href="/advanced_yii/judgment-parties" ><i class="fa fa-circle-o"></i>Appellant – Respondent</a></li>
        <li><a href="/advanced_yii/judgment-mast" ><i class="fa fa-circle-o"></i>Judgments</a></li>
        </ul>

         <ul class="treeview-menu">
        <li><a href="/advanced_yii/bareact-catg-mast" ><i class="fa fa-circle-o"></i>BareactCatg Category</a></li>
        <li><a href="/advanced_yii/bareact-mast" ><i class="fa fa-circle-o"></i>Barect Master </a></li>
        <li><a href="/advanced_yii/city-mast" ><i class="fa fa-circle-o"></i>City Master </a></li>
        <li><a href="/advanced_yii/country-mast" ><i class="fa fa-circle-o"></i>Country Master </a></li>
        <li><a href="/advanced_yii/state-mast" ><i class="fa fa-circle-o"></i>State Master</a></li>
        <li><a href="/advanced_yii/court-mast" ><i class="fa fa-circle-o"></i>Court Master </a></li>
        <li><a href="/advanced_yii/journal-mast" ><i class="fa fa-circle-o"></i>Journal Mast</a></li>
        <li><a href="/advanced_yii/judgment-cited-by" ><i class="fa fa-circle-o"></i>Cited By</a></li>
        <li><a href="/advanced_yii/judgment-overruledby" ><i class="fa fa-circle-o"></i>Overruled By</a></li>
        <li><a href="/advanced_yii/judgment-overrules" ><i class="fa fa-circle-o"></i>OverRules</a></li>

         </ul>   

    </div>


</div>
