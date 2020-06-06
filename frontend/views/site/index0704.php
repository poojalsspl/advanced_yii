<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

use kartik\widgets\ActiveForm;
use sjaakp\gcharts\ColumnChart;
$this->title = 'Law Hub';
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
    .bg-light {
    background-color: #f8f9fa!important;
    padding-top: 50px;
    padding-bottom: 50px;
    }
    .features-icons .features-icons-item .features-icons-icon i {
    font-size: 50px;
   }

     #section-testimonial {
    padding-bottom: 50px;
    padding-top: 50px;
    background: #F9FAFF;
}
.align-items-center {
    -ms-flex-align: center!important;
    align-items: center!important;
}
#section-testimonial.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
#section-testimonial @media (min-width: 992px)
.col-lg-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
}
#section-testimonial .test-inner:hover {
    -webkit-box-shadow: 0 7px 22px rgba(0, 0, 0, 0.08);
    box-shadow: 0 7px 22px rgba(0, 0, 0, 0.08);
}
#section-testimonial .test-inner {
    position: relative;
    padding: 30px;
    background: #fff;
    border-top-right-radius: 35px;
    margin-bottom: 25px;
    -webkit-transition: all .7s ease;
    -o-transition: all .7s ease;
    transition: all .7s ease;
}
#section-testimonial .test-author-thumb {
    margin-bottom: 15px;
}
#section-testimonial .d-flex {
    display: -ms-flexbox!important;
    display: flex!important;
}
.test-author-thumb img {
    width: 90px;
    height: 90px;
    border-radius: 100%;
    border: 1px dotted #ddd;
    padding: 5px;
}
.img-fluid {
    max-width: 100%;
    height: auto;
}
#section-testimonial img {
    vertical-align: middle;
    border-style: none;
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

<!--columnchart-->
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
// ],
]) ?>

<!--columnchart--->


  <br>
  <!--Course Content-->
<section class="" id="download">
    <center><a href="/site/about-pioneer">CERTIFICATION BY NAAC GRADE AUTONOMOUS EDUCATIONAL INSTITUTE </a></<center>
    </section>
<!--Slider Section End -->
<div class="container">
     <span><h1 align="center">Research Courses Offered</h1></span>

        <div class="row">
            <div class="col-lg-6">
                
                <h3>Workshop Case Law Research</h3>
                <hr>
                <p>Case Law Research is a 2 days workshop related with the various case laws delivered by india court of law.This 2 days online case law research workshop is custom designed for law students. An online platform is provided to the law student to analysis and research in depth the various case law and generate the data points that are available in the case law and each data point has it own important in research a case law with a relevant objective </p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/course-mast/view/?id=CLRW', ['class' => 'btn btn_new'])?></p>

            </div>
            <div class="col-lg-6">
                <h3>Diploma in Case Law Research & Analytics</h3>
                <hr>
                <p>This course includes in depth study of Judgments delivered by various High Courts, Tribunals and Supreme Court of India. The diploma in case law analytic and research provides a strong foundation and a launching pad for students looking to persue their career as law research analyst. The study of variable data point in the predefined case law elements enables the law research students to understand various..</p>

                <p> <?= Html::a('Read More ' . "&raquo;",'/course-mast/view/?id=ADCLR002', ['class' => 'btn btn_new'])?></p>
            </div>
            
        </div>

  
</div>
 <!--Course Content End-->
<!--===== testimonial =====-->
<section class="section" id="section-testimonial">
        <div class="container">
           <!-- <div class="row align-items-center"> -->
               <!--  <div class="col-lg-12 col-sm-12 col-md-12"> -->
                    <!-- <div class="section-heading testimonial-heading"> -->
                        <span><h1 align="center">What they speak about us</h1></span>
                       
                   <!--  </div> -->
                <!-- </div> -->
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-4" style="flex: 0 0 33%;">
                            <div class="test-inner ">
                               <div class="test-author-thumb d-flex">
                                   <img src="/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <h4>Will Barrow</h4>
                                       <h6>Sunrise Paradise Hotel</h6>
                                   </div>
                               </div>

                                Quas ut distinctio tenetur animi nihil rem, amet dolorum totam. Ab repudiandae tempore qui fugiat amet ipsa id omnis ipsam, laudantium! Dolorem.

                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="test-inner ">
                               <div class="test-author-thumb d-flex">
                                   <img src="/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <h4>Will Barrow</h4>
                                       <h6>Sunrise Paradise Hotel</h6>
                                   </div>
                               </div>

                                Quas ut distinctio tenetur animi nihil rem, amet dolorum totam. Ab repudiandae tempore qui fugiat amet ipsa id omnis ipsam, laudantium! Dolorem.

                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                         <div class="col-lg-4">
                            <div class="test-inner">
                               <div class="test-author-thumb d-flex">
                                   <img src="/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <h4>Will Barrow</h4>
                                       <h6>Sunrise Paradise Hotel</h6>
                                   </div>
                               </div>

                                Quas ut distinctio tenetur animi nihil rem, amet dolorum totam. Ab repudiandae tempore qui fugiat amet ipsa id omnis ipsam, laudantium! Dolorem.

                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    
                     <div class="row">
                        <div class="col-lg-4">
                            <div class="test-inner ">
                               <div class="test-author-thumb d-flex">
                                   <img src="/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <h4>Will Barrow</h4>
                                       <h6>Sunrise Paradise Hotel</h6>
                                   </div>
                               </div>

                                Quas ut distinctio tenetur animi nihil rem, amet dolorum totam. Ab repudiandae tempore qui fugiat amet ipsa id omnis ipsam, laudantium! Dolorem.

                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="test-inner ">
                               <div class="test-author-thumb d-flex">
                                   <img src="/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <h4>Will Barrow</h4>
                                       <h6>Sunrise Paradise Hotel</h6>
                                   </div>
                               </div>

                                Quas ut distinctio tenetur animi nihil rem, amet dolorum totam. Ab repudiandae tempore qui fugiat amet ipsa id omnis ipsam, laudantium! Dolorem.

                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                         <div class="col-lg-4">
                            <div class="test-inner">
                               <div class="test-author-thumb d-flex">
                                   <img src="/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <h4>Will Barrow</h4>
                                       <h6>Sunrise Paradise Hotel</h6>
                                   </div>
                               </div>

                                Quas ut distinctio tenetur animi nihil rem, amet dolorum totam. Ab repudiandae tempore qui fugiat amet ipsa id omnis ipsam, laudantium! Dolorem.

                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    

                </div>
            <!-- </div> -->
        </div>
    </section>


<!--===== end testimonial =====-->

  <!-- ====slider=== -->
<div class="slider">
    <div id="about-slider">
      <div id="carousel-slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators visible-xs">
          <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-slider" data-slide-to="1"></li>
          <li data-target="#carousel-slider" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
  

           <div class="carousel-item">
            <div class="row">
          <div class="col-md-2">
            <div class="card">
             <?=Html::img('@web/images/landing/logo_pioneer.png', ['class' => 'img-responsive'])?>
             <span>Pioneer Institute</span>
            </div>
          </div>
             <div class="col-md-2">
            <div class="card">
             <?=Html::img('@web/images/landing/logo_pioneer.png', ['class' => 'img-responsive'])?>
             <span>Pioneer Institute</span>
            </div>
          </div>
             <div class="col-md-2">
            <div class="card">
             <?=Html::img('@web/images/landing/logo_pioneer.png', ['class' => 'img-responsive'])?>
             <span>Pioneer Institute</span>
            </div>
          </div>
              <div class="col-md-2">
            <div class="card">
             <?=Html::img('@web/images/landing/logo_pioneer.png', ['class' => 'img-responsive'])?>
             <span>Pioneer Institute</span>
            </div>
          </div>
        
            <div class="col-md-2">
            <div class="card">
             <?=Html::img('@web/images/landing/logo_pioneer.png', ['class' => 'img-responsive'])?>
             <span>Pioneer Institute</span>
            </div>
          </div>
               <div class="col-md-2">
            <div class="card">
             <?=Html::img('@web/images/landing/logo_pioneer.png', ['class' => 'img-responsive'])?>
             <span>Pioneer Institute</span>
            </div>
          </div>
        </div>


        <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>

        <a class=" right carousel-control hidden-xs" href="#carousel-slider" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
      <!--/#carousel-slider-->
    </div>
    
    <!--/#about-slider-->
  </div>
  <!--/end slider-->


