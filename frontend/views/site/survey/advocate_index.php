<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AdvocateMastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advocate Masts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advocate-mast-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'adv_id',
            'advocate_name',
            'email_id:email',
            'dob',
            'gender',
            //'mobile',
            //'image',
            //'court_code',
            'court_name',
            //'country_code',
            //'state_code',
            //'city_code',
            //'regs_numb',
            //'regs_year',
            //'qual_type',
            //'mkt_username',
            //'crdt',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
