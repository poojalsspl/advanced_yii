<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

use kartik\widgets\ActiveForm;
use sjaakp\gcharts\ColumnChart;
use yii\bootstrap\Carousel;
$this->title = 'My Yii Application';

?>
<style type="text/css">
  /*.features-icons {
    padding-top: 112px;
    padding-bottom: 112px;
}*/
/*.text-center {
    text-align: center!important;
}
.bg-light {
    background-color: #f8f9fa!important;
    padding-top: 50px;
    padding-bottom: 50px;
}
.features-icons .features-icons-item .features-icons-icon i {
    font-size: 50px;
}*/
span h1{
    color: #185886;
    } 
    h3{
        color: #185886;
    }
    a.btn.btn_new{
        background-color:#185886; 
        color: #ffffff;
    }


.imageCarousel .item img {
    width: 50%;
    height:50%;
}
</style>
 

  <!-- ====columnchart==== -->
  <span><h1 align="center">Law College Analytics Statewise</h1></span>
<?= ColumnChart::widget([
'height' => '400px',
'dataProvider' => $dataProvider,
'columns' => [
    'state_name:string',  // first column: domain
    'total',          // second column: data
    [               // third column: tooltip
        'value' => function($model, $a, $i, $w) {
            return "$model->state_name: $model->total";
        },
        'type' => 'string',
        'role' => 'tooltip',
    ],
],
// 'options' => [
//     'title' => 'Law College Analytics Statewise',
//     'titleTextStyle'=> [
//       'bold'=> 'true',
//       'italic'=> 'true',
//       'fontSize'=> '18',
//       'color'=>'#185886',
//   ],
// ],
]) ?>

<!-- ===== end columnchart===== --->




<!-- ==== courses ====-->
<div class="container">
     
<span><h1 align="center">Research Courses Offered</h1></span>
        <div class="row">
            <div class="col-lg-6">
                
                <h3>Workshop Case Law Research</h3>
                <hr>
                <p>Case Law Research is a workshop related with the various case laws delivered by india court of law.This is an online program. Case law research workshop is custom designed for law students.online platform is provided to the law student to research in depth the various case law and generate the fixed data points in case laws.The objective of the workshop is to make an student understand the fixed data pointsin a case law.A luacnhing pad law research workshop for law foreeig themself as legal research analyst.</p>
             <p><a class="btn btn_new" href="course-mast/view/?id=CLRW">Read More &raquo;</a>
               
                </p>
            </div>
            <div class="col-lg-6">
                <h3>Diploma in Case Law Research & Analytics</h3>
                <hr>
                <p>This Diploma course includes in depth study of Judgments delivered by various High Courts, Tribunals and Supreme Court of India. The diploma in case law analytic and research provides a strong foundation and a launching pad for students looking to persue their career as law research analyst. The study of variable data point in the predefined case law elements enables the law research students to understand various fixed and variable data point in judgments that has impact in the final disposition of judgments.....</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'course-mast/view/?id=ADCLR002', ['class' => 'btn btn_new'])?></p>
            </div>
            
        </div>
  
</div>

<!-- ==== end courses ====-->

