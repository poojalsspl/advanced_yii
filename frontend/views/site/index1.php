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
             
            <?= ColumnChart::widget([
'height' => '800px',
'dataProvider' => $dataProvider,
'columns' => [
    'shrt_name:string',  // first column: domain
    'total',          // second column: data
    [               // third column: tooltip
        'value' => function($model, $a, $i, $w) {
            return "$model->state_name: $model->total";
        },
        'type' => 'string',
        'role' => 'tooltip',
    ],
],
])
?>
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
                                       <a href="web-articles/view/?id=4"><h4>AI & Law</h4></a>
                                       <h6>Can AI Replace Law</h6>
                                   </div>
                               </div>

                                AI, term used for Artificial intellegence,is like robots replacing humans. As many companies are now focusing AI in law.Question that arises,can lawyers be replaced by Robots or Machines. While we all know computers work on digital data or boolean for, while human mind follows the lograthmic nature of thought.

                                <i class="fa fa-quote-right"></i>
                            </div>
                         </div>
                      
                        <div class="col-lg-4">
                            <div class="test-inner ">
                               <div class="test-author-thumb d-flex">
                                   <img src="/advanced_yii/frontend/web/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <a href="web-articles/view/?id=4"><h4>Roles Of Legal Analyst</h4></a>
                                       <h6>Legal Analyst responsibilities</h6>
                                   </div>
                               </div>

                                 A legal analyst works mainly in a law firm.Legal analyst is a law research professional. The roles are pertaining to the various activities in legal proceedings. The roles of the legal analyst depends on the experiance and the level of responsibilities allocated.Among the gammut of roles main can be the case law research.

                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                         <div class="col-lg-4">
                            <div class="test-inner">
                               <div class="test-author-thumb d-flex">
                                   <img src="/advanced_yii/frontend/web/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <a href="web-articles/view/?id=4"><h4>Law Analytics</h4></a>
                                       <h6>Data Driven Legal Analtics</h6>
                                   </div>
                               </div>

                                Law Analytics as seems to be still in the sunrise era, but its time this market can shiver the tech arena of Law. The law analytics mainly data driven and machines can supplement the law reasearch profession to dig data for analysis and research. Law Analytics can also have a impact on the nature of business of Law companies,save time.

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
                                       <h4>Case Law Analytics</h4>
                                       <h6>Data points with Value</h6>
                                   </div>
                               </div>

                                Case laws are one of the most researched documents among the legal fraternity. Addding weight to the case law research,is case law analytics.Case Law analtics can always influence the the way lawyers appears with their legal proceedings. The Case Law Analytics enables the lawyers to stay focused on the key points with efficient use can help in predictive analysis.

                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="test-inner ">
                               <div class="test-author-thumb d-flex">
                                   <img src="/advanced_yii/frontend/web/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <h4>Big Data In Law</h4>
                                       <h6>Data Mining in Law</h6>
                                   </div>
                               </div>

                                Big Data and Datamining is taking on the law.Legal data means volumes of data,dig data.Data Mining of legal data assist in descision making,arguments made by lawyers in a court of law. Law companies and lawyers are now exploring the legal data that has been influencing the lawyer in the process of the complete legal proceedings.


                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                         <div class="col-lg-4">
                            <div class="test-inner">
                               <div class="test-author-thumb d-flex">
                                   <img src="/advanced_yii/frontend/web/images/landing/test-1.jpg" alt="Testimonial author" class="img-fluid">
                                   <div class="test-author-info">
                                       <h4>Legal Data Science</h4>
                                       <h6>Legal Data With Graphical Charts</h6>
                                   </div>
                               </div>

                        Legal Data Science is blossoming in legal arena.Legal data growth is prolific,data science is like a loaded ship on deck, set to sail deep seas. Legal Data Science in simple worlds are scraping of valuable information from the unstructed legal data and presenting in a format that makes decision making easy.Legal Data Science combines with Law data & analytics.

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
                                    <img src="/advanced_yii/frontend/web/images/college_logo/8.jpg" class="img-responsive">
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
                                    <img src="/advanced_yii/frontend/web/images/college_logo/46.jpg" class="img-responsive">
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
                                    <img src="/advanced_yii/frontend/web/images/college_logo/81.jpg" class="img-responsive">
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
                                    <img src="/advanced_yii/frontend/web/images/college_logo/82.jpg" class="img-responsive">
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
                                    <img src="/advanced_yii/frontend/web/images/college_logo/122.jpg" class="img-responsive">
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
                                    <img src="/advanced_yii/frontend/web/images/college_logo/154.jpg" class="img-responsive">
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
                                    <img src="/advanced_yii/frontend/web/images/college_logo/169.jpg" class="img-responsive">
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
                                    <img src="/advanced_yii/frontend/web/images/college_logo/178.jpg" class="img-responsive">
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
                                    <img src="/advanced_yii/frontend/web/images/college_logo/276.jpg" class="img-responsive">
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
<!-- <div class="container">
<div class='row'>
  <div class="col-xs-12">
     <div id="imageCarousel" class="carousel slide" data-interval="2000"
                     data-ride="carousel" data-pause="hover" data-wrap="true">
                     <ol class="carousel-indicators">
                        <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#imageCarousel" data-slide-to="1"></li>
                        <li data-target="#imageCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner"> -->
<?php
// $i=0;
//   echo "<div class='item active'>";
//   echo "<div class='row'>";
// foreach($models as $item) {

  
//       echo "<div class='col-xs-4'>";
      
//     echo  Html::img('@web/images/college_logo/'.$item->college_logo, ['class' => 'img-responsive','style' => 'width:50px;height: 50px']);
//         echo "<span><b>".$item->college_name."</b></span><br>";
//          echo "<span>".$item->city_name."</span>";
//       echo '</div>';
 
 
//   $i++;
//  // if ($i % 10 == 0) {echo '</div><div class="row">';}
// }
//  echo '</div>';
//   echo '</div>';
?>


<!-- </div>
<a href="#imageCarousel" class="carousel-control left" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a href="#imageCarousel" class="carousel-control right" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
</div>
</div>
</div>
</div> -->


<!-----==============================---->
<hr>
<div class="container">
<div class='row'>
  <div class="col-sm-12">
     <div id="imageCarousel" class="carousel slide" data-interval="2000"
                     data-ride="carousel" data-pause="hover" data-wrap="true">
                     <ol class="carousel-indicators">
                        <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#imageCarousel" data-slide-to="1"></li>
                        <li data-target="#imageCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
<?php

$i = 0;
foreach ($models as $item) {

if ($i == 0) {
    echo '<div class="item active"><div class="row"><div class="col-sm-4"><img class="img-responsive" src="frontend/web/images/college_logo/' . $item->college_logo . '" >' .$item->college_name . ': <br><strong>' .$item->city_name . '</strong></div></div></div>';
    

} else {
    echo '<div class="item"><div class="row"><div class="col-xs-4"><img class="img-responsive" src="frontend/web/images/college_logo/' . $item->college_logo . '" >' .$item->college_name . ': <br><strong>' .$item->city_name . '</strong></div></div></div>';
}
$i++;
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


<hr style="color:#E5735A">
<hr style="color:#9AEA54 ">

  <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div id="imageCarousel 1" class="carousel slide" data-interval="2000"
                     data-ride="carousel" data-pause="hover" data-wrap="true">

                    <ol class="carousel-indicators">
                        <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#imageCarousel" data-slide-to="1"></li>
                        <li data-target="#imageCarousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                               <?php 
                                     /*$logo = $models[0]['college_logo'];
                                     $logo1 = $models[1]['college_logo'];
                                     $logo2 = $models[2]['college_logo'];*/
                               ?>
                                <div class="col-sm-2">

                                  <img src="/advanced_yii/frontend/web/images/college_logo/<?php //echo $logo;?>" class="img-responsive">
                                    <?php //echo $models[0]['college_name'] ?><br>
                                    <b><?php //echo $models[0]['city_name'] ?></b>
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
                                   <img src="/advanced_yii/frontend/web/images/college_logo/<?php //echo $logo1;?>" class="img-responsive">
                                   <?php //echo $models[1]['college_name'] ?><br>
                                   <b><?php //echo $models[1]['city_name'] ?></b>
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
                                <div class="col-sm-4">
                                   <img src="/advanced_yii/frontend/web/images/college_logo/<?php //echo $logo2;?>" class="img-responsive">
                                   <?php //echo $models[2]['college_name'] ?><br>
                                   <b><?php //echo $models[2]['city_name'] ?></b>
                                   <!--  <div class="carousel-caption">
                                        <h3>Arunachal Law Academy,</h3>
                                        <p>Itanagar</p>
                                    </div> -->
                                </div>
                                
                            </div>
                        </div>
                        <div class="item">
                          <div class="row">
                          <?php 
                          $count = 0;
                          //$x = print_r(array_chunk($models, 2));
                          foreach ($models as $singlemodel){
                            
                            ?>
                            
                                <div class="col-sm-4">
                                    <img src="/advanced_yii/frontend/web/images/college_logo/<?php echo $singlemodel->college_logo; ?>" class="img-responsive">
                                    <?php echo $singlemodel->college_name; ?><br>
                                    <?php echo $singlemodel->city_name; ?>
                                </div>
                                

                                
                           
                          <?php } ?>
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

    <?php

$this->registerJs("$('.carousel').each(function(e){
      
     console.log('hello');
        });
          ");



  ?>
