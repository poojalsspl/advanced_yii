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
.text-center {
    text-align: center!important;
}
.bg-light {
    background-color: #f8f9fa!important;
    padding-top: 50px;
    padding-bottom: 50px;
}
.features-icons .features-icons-item .features-icons-icon i {
    font-size: 50px;
}
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
.col-lg-4 {
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

.imageCarousel .item img {
    width: 50%;
    height:50%;
}
</style>
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
          <div class="item active">
           <!--  <img src="img/7.jpg" class="img-responsive" alt=""> -->
             <?=Html::img('@web/images/landing/data_warehouse.jpg', ['class' => 'img-responsive'])?>
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                <h2><span></span></h2>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                <p></p>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">
              
              </div>
            </div>
          </div>

          <div class="item">
          <!--   <img src="img/6.jpg" class="img-responsive" alt=""> -->
             <?=Html::img('@web/images/landing/data_mining.jpg', ['class' => 'img-responsive'])?>
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">
                <h2></h2>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.3s">
                <p></p>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.6s">
               
              </div>
            </div>
          </div>
          <div class="item">
           <!--  <img src="img/1.jpg" class="img-responsive" alt=""> -->
             <?=Html::img('@web/images/landing/Legal_Fraternity.jpg', ['class' => 'img-responsive'])?>
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                <h2></h2>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                <p></p>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">
            
              </div>
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
                <p>Case Law Research is a 2 days workshop related with the various case laws delivered by india court of law.This 2 days online case law research workshop is custom designed for law students. An online platform is provided to the law student to analysis and research in depth the various case law and generate the data points that are available in the case law and each data point has it own important in research a case law with a relevant objective</p>
             <p><a class="btn btn_new" href="course-mast/view/?id=CLRW">Read More &raquo;</a>
               
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

<!-- ==== end courses ====-->

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
                                   <img src="/advanced_yii/frontend/web/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <a href="web-articles/view/?id=4"><h4>Will Barrow</h4></a>
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
                                   <img src="/advanced_yii/frontend/web/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <a href="web-articles/view/?id=4"><h4>Will Barrow</h4></a>
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
                                   <img src="/advanced_yii/frontend/web/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <a href="web-articles/view/?id=4"><h4>Will Barrow</h4></a>
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
                                   <img src="/advanced_yii/frontend/web/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
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
                                   <img src="/advanced_yii/frontend/web/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
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
                                   <img src="/advanced_yii/frontend/web/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
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
 <!-- ====slider=== -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div id="imageCarousel" class="carousel slide" data-interval="2000"
                     data-ride="carousel" data-pause="hover" data-wrap="true">

                    <ol class="carousel-indicators">
                        <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#imageCarousel" data-slide-to="1"></li>
                        <li data-target="#imageCarousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="/advanced_yii/frontend/web/images/college_logo/adlaw-logo.png" class="img-responsive">
                                    <!-- <div class="carousel-caption">
                                        <h3>Dr. R. K. Barua Law College</h3>
                                        <p>Dibrugarh</p>
                                    </div> -->
                                </div>
                                <div class="col-sm-2">
                                    <img src="" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3></h3>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <img src="/advanced_yii/frontend/web/images/college_logo/logo_pioneer.png" class="img-responsive">
                                   <!--  <div class="carousel-caption">
                                        <h3>C. R. R. Law College</h3>
                                        <p>Eluru</p>
                                    </div> -->
                                </div>
                                <div class="col-sm-2">
                                    <img src="" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3></h3>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <img src="/advanced_yii/frontend/web/images/college_logo/advocate_mail.png" class="img-responsive">
                                   <!--  <div class="carousel-caption">
                                        <h3>Arunachal Law Academy,</h3>
                                        <p>Itanagar</p>
                                    </div> -->
                                </div>
                                <div class="col-sm-2">
                                    <img src="" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3></h3>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="/advanced_yii/frontend/web/images/college_logo/adlaw-logo.png" class="img-responsive">
                                    <!-- <div class="carousel-caption">
                                        <h3>Dr. R. K. Barua Law College</h3>
                                        <p>Dibrugarh</p>
                                    </div> -->
                                </div>
                                <div class="col-sm-2">
                                    <img src="" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3></h3>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <img src="/advanced_yii/frontend/web/images/college_logo/logo_pioneer.png" class="img-responsive">
                                   <!--  <div class="carousel-caption">
                                        <h3>C. R. R. Law College</h3>
                                        <p>Eluru</p>
                                    </div> -->
                                </div>
                                <div class="col-sm-2">
                                    <img src="" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3></h3>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <img src="/advanced_yii/frontend/web/images/college_logo/advocate_mail.png" class="img-responsive">
                                 <!--    <div class="carousel-caption">
                                        <h3>Arunachal Law Academy,</h3>
                                        <p>Itanagar</p>
                                    </div> -->
                                </div>
                                <div class="col-sm-2">
                                    <img src="" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3></h3>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="/advanced_yii/frontend/web/images/college_logo/adlaw-logo.png" class="img-responsive">
                                    <!-- <div class="carousel-caption">
                                        <h3>Dr. R. K. Barua Law College</h3>
                                        <p>Dibrugarh</p>
                                    </div> -->
                                </div>
                                <div class="col-sm-2">
                                    <img src="" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3></h3>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <img src="/advanced_yii/frontend/web/images/college_logo/logo_pioneer.png" class="img-responsive">
                                    <!-- <div class="carousel-caption">
                                        <h3>C. R. R. Law College</h3>
                                        <p>Eluru</p>
                                    </div> -->
                                </div>
                                <div class="col-sm-2">
                                    <img src="" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3></h3>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <img src="/advanced_yii/frontend/web/images/college_logo/advocate_mail.png" class="img-responsive">
                                    <!-- <div class="carousel-caption">
                                        <h3>Arunachal Law Academy,</h3>
                                        <p>Itanagar</p>
                                    </div> -->
                                </div>
                                <div class="col-sm-2">
                                    <img src="" class="img-responsive">
                                    <div class="carousel-caption">
                                        <h3></h3>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#imageCarousel" class="carousel-control left" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a href="#imageCarousel" class="carousel-control right" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>

            </div>
        </div>
    </div>




<!----=============================--->
<div class="container">
<div class='row'>
  <div class="col-xs-12">
     <div id="imageCarousel" class="carousel slide" data-interval="2000"
                     data-ride="carousel" data-pause="hover" data-wrap="true">
                     <ol class="carousel-indicators">
                        <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#imageCarousel" data-slide-to="1"></li>
                        <li data-target="#imageCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
<?php
$i=0;
foreach($models as $item) {
  echo "<div class='item active'>";
  echo "<div class='row'>";
      echo "<div class='col-xs-4'>";
      
    echo  Html::img('@web/images/college_logo/'.$item->college_logo, ['class' => 'img-responsive']);
        echo "<span><b>".$item->college_name."</b></span><br>";
         echo "<span>".$item->city_name."</span>";
      echo '</div>';
  echo '</div>';
  echo '</div>';
  $i++;
  if ($i % 10 == 0) {echo '</div><div class="row">';}
}
?>
</div>
<a href="#imageCarousel" class="carousel-control left" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a href="#imageCarousel" class="carousel-control right" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
</div>
</div>
</div>
</div>


<!-----==============================---->

