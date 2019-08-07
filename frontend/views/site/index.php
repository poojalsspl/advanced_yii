<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

use kartik\widgets\ActiveForm;
$this->title = 'My Yii Application';
?>
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
     

        <div class="row">
            <div class="col-lg-4">
                
                <h2>Law Data Analytics</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="#">Read More &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Law Data Mining</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="#">Read More &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Law Data Warehousing</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="#">Read More &raquo;</a></p>
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

                <p><a class="btn btn-default" href="#">Read More &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Law Researchers</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="#">Read More &raquo;</a></p>
            </div>
        </div>

   
</div>

   
