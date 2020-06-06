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
    h3{
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
<section class="" id="download">
    <center><a href="/advanced_yii/site/about-pioneer">CERTIFICATION BY NAAC GRADE AUTONOMOUS EDUCATIONAL INSTITUTE</a></center>
    </section>

<!--Slider Section End -->
<div class="container">
     
<span><h1 align="center">Research Courses Offered</h1></span>
        <div class="row">
            <div class="col-lg-6">
                
                <h3>Certificate In Case Law Analytics And Research</h3>
                <hr>
                <p>Case Law Analytics & Research is a short term 3 (Three) Months Certificate Course, ofered by Pioneer Institute. This Course includes study of Judgments delivered by various High Courts, Tribunals and Supreme Court of India. It stands .....</p>
             <p><a class="btn btn_new" href="course-mast/view/?id=ADCLR001">Read More &raquo;</a>
               
                </p>
            </div>
            <div class="col-lg-6">
                <h3>Diploma in Case Law Research & Analytics</h3>
                <hr>
                <p>This course includes in depth study of Judgments delivered by various High Courts, Tribunals and Supreme Court of India. The diploma in case law analytic and research provides a strong foundation and a launching pad......... </p>

                <p> <?= Html::a('Read More ' . "&raquo;",'course-mast/view/?id=ADCLR002', ['class' => 'btn btn_new'])?></p>
            </div>
            
        </div>
   
</div>

   
