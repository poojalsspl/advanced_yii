<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

use kartik\widgets\ActiveForm;
$this->title = 'My Yii Application';
?>
<style type="text/css">
   span h1{
    color: #185886;
    } 
    h2{
        color: #185886;
    }
    a.btn.btn_new{
        background-color:#185886; 
        color: #ffffff;
    }
</style>
<!--Slider Section Start-->
<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    
    <!-- Carousel items -->
    <div class="carousel-inner carousel-zoom">
        <div class="active item">
            <?=Html::img('@web/images/landing/data_warehouse.jpg', ['class' => 'slider-image'])?>
          <div class="carousel-caption slider-caption">
          </div>
        </div>

        <div class="item">
            <?=Html::img('@web/images/landing/law_analytics.jpg', ['class' => 'slider-image'])?>
          <div class="carousel-caption slider-caption">
          </div>
        </div>
              <div class="item">
            <?=Html::img('@web/images/landing/data_mining.jpg', ['class' => 'slider-image'])?>
          <div class="carousel-caption slider-caption">
          </div>
        </div>
             <div class="item">
            <?=Html::img('@web/images/landing/Legal_Fraternity.jpg', ['class' => 'slider-image'])?>
          <div class="carousel-caption slider-caption">
          </div>
        </div>

 
    </div>
      <!-- Carousel nav -->
    <a class="carousel-control left slider-carousel" href="#carousel" data-slide="prev">‹</a>
    <a class="carousel-control right slider-carousel" href="#carousel" data-slide="next">›</a>
   
</div>
<br>
<!--Slider Section End -->
<div class="container">
     
<span><h1>Research Courses Offered</h1></span>
        <div class="row">
            <div class="col-lg-4">
                
                <h2>Judgment Analysis</h2>
                <hr>
                <p>Judgment Analysis is a basic level research course. The main objective of this short term course is to get  law students aware of various fixed data points in judgments. These data points are always usefull for any research analysis that can pivot around the judgment or the conclusion of any case....</p>

                <p><a class="btn btn_new" href="site/course-judgment-analysis">Read More &raquo;</a>
               
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Law Data Mining</h2>
                <hr>
                <p>Judgment Analysis is a basic level research course. The main objective of this short term course is to get  law students aware of various fixed data points in judgments. These data points are always usefull for any research analysis that can pivot around the judgment or the conclusion of any case....</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/site/course-judgment-analysis', ['class' => 'btn btn_new'])?></p>
            </div>
            <div class="col-lg-4">
                <h2>Law Data Warehousing</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea .....</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/site/course-judgment-analysis', ['class' => 'btn btn_new'])?></p>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-4">
                
                <h2>Legal Fraternity</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/site/course-judgment-analysis', ['class' => 'btn btn_new'])?></p>
            </div>
            <div class="col-lg-4">
                <h2>Law Researchers</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/site/course-judgment-analysis', ['class' => 'btn btn_new'])?></p>
            </div>
        </div>

   
</div>

   
