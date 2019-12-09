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
    <label><a href="/advanced_yii/site/about-pioneer">Brief profile of Institution providing Certificate & Diploma in Law Research Programs</a></label>
    </section>

<!--Slider Section End -->
<div class="container">
     
<span><h1 align="center">Research Courses Offered</h1></span>
        <div class="row">
            <div class="col-lg-4">
                
                <h3>Basic Judgment Analysis</h3>
                <hr>
                <p>Judgment Analysis is the basic level course offered by Adlaw. The main objective of this course is to make students aware of the various fixed data points (eg. Advocates name, judges name, description, disposition etc.)......</p>

                <p><a class="btn btn_new" href="site/course-judgment-analysis">Read More &raquo;</a>
               
                </p>
            </div>
            <div class="col-lg-4">
                <h3>Judgment Precis Analysis</h3>
                <hr>
                <p>Judgment Precis Analysis is the basic level Course offered by Adlaw. The main objective of this course is to make students aware of the various fixed data points (eg. Advocates name, judges name, description, disposition etc.)......</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/site/course-judgment-precis', ['class' => 'btn btn_new'])?></p>
            </div>
            <div class="col-lg-4">
                <h3>Customised Judgment Analysis</h3>
                <hr>
                <p>Customised Judgment Analysis is the advance level course offered by Adlaw where a student can select the module as per his choice of interest. This is also the most impactive course with the unique feature of customisation.......</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/site/course-judgment-analysis', ['class' => 'btn btn_new'])?></p>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-4">
                
                <h3>Advance Judgment Precis Analysis</h3>
                <hr>
                <p>Advance Judgment Precis Analysis is the intermediate level course offered by Adlaw. This course is the blended version of Judgment Precis Analysis and Judgment Analysis with Article Writing. This course mainly .......</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/site/course-judgment-analysis', ['class' => 'btn btn_new'])?></p>
            </div>
         
             <div class="col-lg-4">
                
                <h3>Advance Legal Elements Judgment Analysis</h3>
                <hr>
                <p>Advance Legal Elements Judgment Analysis is the advance level of all the courses offered by Adlaw. This course is for the students whose main focus is on the judgment reading and analysing. This course provides an opportunity ......</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/site/course-judgment-analysis', ['class' => 'btn btn_new'])?></p>
            </div>
            <div class="col-lg-4">
                <h3>Judgment Analysis with Article Writing</h3>
                <hr>
                <p>Judgment Analysis with Article Writing is the basic level course offered by Adlaw. This course revolves around two objective that is- firstly, making students knowledgeable regarding fixed data points (eg. Advocates name,.......</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/site/course-judgment-article-writing', ['class' => 'btn btn_new'])?></p>
            </div>
        </div>
        <div class="row">
              <div class="col-lg-4">
                <h3>Legal Element Precis Analysis</h3>
                <hr>
                <p>Legal Element Precis Analysis is the intermediate level of course offered by Adlaw. This course is the extended version of Judgment Precis Analysis  with the unique feature of Judgment elements (discussed in course .....</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/site/course-judgment-analysis', ['class' => 'btn btn_new'])?></p>
            </div>
            <div class="col-lg-4">
                <h3>Specialised Judgment Analysis</h3>
                <hr>
                <p>Specialised Judgment Analysis is the advance level course offered by Adlaw where a student can select the syllabus as per his area of interest in law. He can select two or three area of law where he want to specialise his interest......</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/site/course-judgment-analysis', ['class' => 'btn btn_new'])?></p>
            </div>
        </div>

   
</div>

   
