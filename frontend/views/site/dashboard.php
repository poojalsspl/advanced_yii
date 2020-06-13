<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\CourseMast;
use frontend\models\JudgmentAdvocate;
use frontend\models\JudgmentJudge;
use frontend\models\JudgmentParties;
use frontend\models\JudgmentRef;
use frontend\models\JudgmentAct;
use frontend\models\JudgmentElement;
use frontend\models\JudgmentCitation;
use frontend\models\JudgmentDataPoint;
use frontend\models\SyllabusDetail;
use frontend\models\Articles;
use frontend\models\FdpView;
use frontend\models\JudgmentMast;
use frontend\models\CountryMast;
use frontend\models\StateMast;
use frontend\models\CityMast;
use frontend\models\StudentDocs;
use sjaakp\gcharts\PieChart;

$username = Yii::$app->user->identity->username;
//$this->params['breadcrumbs'][] = $this->title;
$this->title = 'Dashboard';

?>


<div class="template">
    <div class ="body-content">
         <section class="content">
            <div class="row">
                <!--SideBar Menu-->
                <div class="col-md-3">
                    <!-- Profile  -->
                    <div class="box box-primary">
                      <div class="box-header with-border">
                            <h3 class="box-title">Student Detail</h3>
                        </div>
                        <div class="box-body box-profile">
                            <?php 
                            foreach ($model as $key => $value) {
                                $userid = $value['userid'];                              
                                $course_code = $value['course_code'];
                                $course_name = $value['course_name'];
                                $course_fees = $value['course_fees'];
                                $course_status = $value['course_status'];
                                $start_date = $value['start_date'];
                                $completion_date = $value['completion_date'];
                                $result_date = $value['result_date'];
                                $cert_delvdate = $value['cert_delvdate'];
                                $country_code = $value['country_code'];
                                $state_code = $value['state_code'];
                                $city_code = $value['city_code'];
                                $mobile = $value['mobile'];
                                $email = $value['email'];
                                $pincode = $value['pincode'];
                                $address = $value['address'];
                                $stage = $value['stage'];

                                $course = CourseMast::find('course_duration')->where(['course_code'=>$value['course_code']])->one();
                                $course_duration = $course->course_duration;
                                if ($course_duration<=1){$month = 'Month';}else{ $month = 'Months';}

                                $country = CountryMast::find('country_name')->where(['country_code'=>$country_code])->one();
                                $country_name = $country->country_name;

                                $state = StateMast::find('state_name')->where(['state_code'=>$state_code])->one();
                                $state_name = $state->state_name;

                                $city = CityMast::find('city_name')->where(['city_code'=>$city_code])->one();
                                $city_name = $city->city_name;

                                $path = Yii::$app->homeUrl . 'frontend/web/uploads/profile_img';
                                $image = $value['profile_pic'];
                                if ($image==""){$image = "profile.jpg";}


                            ?>
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo $img = $path.'/'.$image ; ?>" alt="User profile picture">
                            <h3 class="profile-username text-center"><?php echo $value['student_name']; ?></h3>
                            <!-- <p class="text-muted text-center"><?php //echo $value['qual_desc']; ?></p> -->
                             <ul class="list-group list-group-unbordered">
                                 <li class="list-group-item" style="padding: 5px 3px;">
                                     <b>Registration Date</b> <span class="pull-right"><?php echo $value['regs_date']; ?></span>
                                 </li>
                                 <li class="list-group-item" style="padding: 5px 3px;">
                                      <?php $gender = $value['gender'];?>
                                     <b>Gender</b> <span class="pull-right"><?php if ($gender=='F'){echo "Female";}else{echo "Male";} ?></span>
                                 </li>
                                 <li class="list-group-item" style="padding: 5px 3px;">
                                     <b>DOB</b> <span class="pull-right"><?php echo $value['dob']; ?></span>
                                 </li>
                                 <li class="list-group-item" style="padding: 5px 3px;">
                                     <b>Qualification</b> <span class="pull-right"><?php echo $value['qual_desc']; ?></span>
                                 </li>
                                 <!-- <li class="list-group-item">
                                     <b>Mobile</b> <span class="pull-right"><?php //echo $value['mobile']; ?></span>
                                 </li> -->
                                 <li class="list-group-item" style="padding: 5px 3px;">
                                     <b>College</b><span class="pull-right">
                                         <?php echo $value['college_name']; ?>
                                     </span>
                                 </li>
                                 <li class="list-group-item" style="padding: 5px 3px;">
                                     <b>Enroll. No.</b><span class="pull-right">
                                         <?php echo $value['enrol_no']; ?>
                                     </span>
                                 </li>
                                 <li class="list-group-item" style="padding: 5px 3px;">
                                     <b>Semester</b><span class="pull-right">
                                         <?php echo $value['semester']; ?>
                                     </span>
                                 </li>
                             </ul>
                             
                             <?php } ?>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Course Details</h3>
                        </div>
                        <div class="box-body">
                          <ul class="list-group list-group-unbordered">
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Course Name</b><span>
                              <?= $course_name; ?>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Fees</b><span class="pull-right">
                              <?= $course_fees; ?>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Course status</b><span class="pull-right">
                              <?= $course_status; ?>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Course Start Date</b><span class="pull-right">
                              <?= $start_date; ?>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Course to be Completed</b><span class="pull-right">
                              <?= $completion_date; ?>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Result Date</b><span class="pull-right">
                              <?= $result_date; ?>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Certificate Dispatch Date</b><span class="pull-right">
                              <?= $cert_delvdate; ?>
                            </span>
                            </li>
                          </ul>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Contact Details</h3>
                             <span class="pull-right"><a href="/advanced_yii/site/edits?uid=<?php echo $userid; ?>">Edit</a></span>
                        </div>
                        <div class="box-body">
                          <ul class="list-group list-group-unbordered">
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Country</b><span class="pull-right">
                              <?= $country_name; ?>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>State</b><span class="pull-right">
                              <?= $state_name; ?> 
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>City</b><span class="pull-right">
                              <?= $city_name; ?>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Pin Code</b><span class="pull-right">
                              <?= $pincode; ?>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Address</b><span>
                              <?= $address; ?>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Mobile</b><span class="pull-right">
                              <?= $mobile; ?>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Email</b><span class="pull-right">
                              <?= $email; ?>
                            </span>
                            </li>
                          </ul>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Documents</h3>
                        </div>
                        <div class="box-body">
                                <?php $student_docs = StudentDocs::find()->where(['username'=> $username])->all();
                             foreach ($student_docs as $all_docs) {
                              $tenth = $all_docs['doc_tenth'];
                              $twelth = $all_docs['doc_twelve'];
                              $idproof = $all_docs['doc_id_proof'];
                              $marksheet = $all_docs['marksheet'];
                              $certificate = $all_docs['passing_certificate'];
                              
                              $path = Yii::$app->homeUrl . 'frontend/web/uploads';
                             }
                             ?>
                          <ul class="list-group list-group-unbordered">
                     
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>10th Board</b><span class="pull-right">
                               <a href="<?php echo $img = $path.'/'.$tenth ; ?>" target="_blank" alt="pending">Preview</a> 
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>12th Board</b><span class="pull-right">
                              <a href="<?php echo $img = $path.'/'.$twelth ; ?>" target="_blank" alt="pending">Preview</a>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Id Proof</b><span class="pull-right">
                             <a href="<?php echo $img = $path.'/'.$idproof ; ?>" target="_blank" alt="pending">Preview</a>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Semester Marksheet</b><span class="pull-right">
                            <a href="<?php echo $img = $path.'/'.$marksheet ; ?>" target="_blank" alt="pending"><?php if ($marksheet){echo "Preview";}else{echo"Pending";}?></a>
                            </span>
                            </li>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <b>Course Completion Certificate</b><span class="pull-right">
                              <a href="<?php echo $img = $path.'/'.$certificate ; ?>" target="_blank" alt="pending">Preview</a>
                            </span>
                            </li>
                           </ul>
                            
                          
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Other Courses Offered</h3>
                        </div>
                        <div class="box-body">
                          <ul class="list-group list-group-unbordered">
                           <?php $other_courses = CourseMast::find()->select('course_name')->where(['!=', 'course_code', $course_code])->all();
                             foreach ($other_courses as $all_courses) {
                               
                            
                            ?>
                            <li class="list-group-item" style="padding: 5px 3px;">
                            <?php echo $all_courses['course_name'];?>
                            </li>
                            <?php } ?>
                            
                            
                          </ul>
                        </div>
                    </div>
    
                </div>
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#timeline" data-toggle="tab">Summary</a></li>
                           <li><a href="#activity" data-toggle="tab">Charts</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="timeline">
                                <ul class="timeline timeline-inverse">
                                    <li class="time-label"></li>
                                    <li>
                                        <i class="fa fa-bell bg-blue"></i>
                                        <div class="timeline-item">
                                            <span class="time"></span>
                                            <h3 class="timeline-header"><a href="#"></a></h3>
                                            <div class="timeline-body">
                                               <a class="btn btn-primary" href="/advanced_yii/judgment-mast/index">Stage - 1</a>
                                               <?php if ($course_code == 'RCCLRW01'){ ?>
                                                <a class="btn btn-primary" href="/advanced_yii/project">Stage - 2</a>
                                                <?php   } ?>

                                                 <?php if ($course_code == 'RDCLRA01'){ ?>  
                                                <a class="btn btn-primary" href="/advanced_yii/judgment-mast/j-element-list">Stage - 2</a>

                                                <a class="btn btn-primary" href="/advanced_yii/articles/sample">Stage - 3</a>
                                                <?php   } ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa fa-bars bg-aqua"></i>
                                        <div class="timeline-item">
                                            <span class="time"></span>
                                            <h3 class="timeline-header"><a href="#">Research Job Summary</a></h3>
                                                <div class="timeline-body">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <th>Job Name</th>
                                                            <th>Total</th>
                                                            <th>Pending</th>
                                                            <th>Completed</th>
                                                        </tr>
                                                        <?php 
                                                        $tot_article = Articles::find()->where(['username'=>$username])->count();
                                                        $complete_article = Articles::find()->where(['username'=>$username])->andWhere(['not', ['completion_date' => null]])->count();
                                                        $pending_article = Articles::find()->where(['username'=>$username])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count();
                                                        ?>
                                                         <?php if ($course_code == 'RCCLRW01'){ ?>
                                                        <tr hidden="hidden">
                                                            <td>Article Alloted</td>
                                                            <td><?= $tot_article;?></td>
                                                            <td><?= $pending_article;?></td>
                                                            <td><?= $complete_article;?></td>
                                                        </tr>
                                                      <?php } ?>
                                                        <tr>
                                                            <td>Judgment Alloted</td>
                                                            <td><?= $tot_judgment;?></td>
                                                            <td><?= $tot_judgment_pending; ?></td>
                                                            <td><?= $tot_judgment_worked; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Supreme Court Judgments Alloted</td>
                                                            <td><?= $sc_judgment;?></td>
                                                            <td><?= $sc_judgment_pending;?></td>
                                                            <td><?= $sc_judgment_worked; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>High Court Judgments Alloted</td>
                                                            <td><?= $hc_judgment;?></td>
                                                            <td><?= $hc_judgment_pending; ?></td>
                                                            <td><?= $hc_judgment_worked; ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                        </div>
                                    </li>
                                    <li>
                                      <i class="fa fa-asterisk bg-aqua"></i>
                                      <div class="timeline-item">
                                        <!-- <span class="time"></span>
                                        <h3 class="timeline-header"><a href="#"></a></h3> -->
                                        <div class="timeline-body">
                                          <table class="table table-striped">
                                            <tr>
                                              <th>Name</th>
                                              <th>Completed</th>
                                              <th>Pending</th>
                                            </tr>
                                            <?php
                                              $comp_fdp = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['completion_date' => null]])->count();
                                              $comp_abstract = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['judgment_abstract' => null]])->count('judgment_abstract');

                                            $sql="Select count(distinct('judgment_code')) as tot_count from judgment_element where username = '$username'";
                                            $command = Yii::$app->getDb()->createCommand($sql);
                                              $records = $command->queryAll();
                                              foreach ($records as $valuetot) {
                                              }
                                              $elecount = $valuetot['tot_count'];

                                              $sqldp="Select count(distinct('judgment_code')) as tot_dpcount from judgment_data_point where username = '$username'";
                                            $commanddp = Yii::$app->getDb()->createCommand($sqldp);
                                              $recordsdp = $commanddp->queryAll();
                                              foreach ($recordsdp as $dpvalue) {
                                              }
                                              $dpcount = $dpvalue['tot_dpcount'];

                                              $comp_article = Articles::find()->where(['username'=>$username])->andWhere(['not', ['completion_date' => null]])->count();

                                            

                                            ?>
                                            <tr>
                                              <td>FIXED DATA POINTS</td>
                                              <td><button class="bg-green"><?= $comp_fdp;?></button></td>
                                              <td></td>
                                            </tr>
                                            <tr>
                                              <td>ABSTRACT</td>
                                              <td><button class="bg-green"><?= $comp_abstract?></button></td>
                                              <td></td>
                                            </tr>
                                            <tr>
                                              <td>ELEMENTS</td>
                                              <td><button class="bg-green"><?=$elecount?></button></td>
                                              <td></td>
                                            </tr>
                                            <tr>
                                              <td>VARIABLE DATA POINTS</td>
                                              <td><button class="bg-green"><?=$dpcount?></button></td>
                                              <td></td>
                                            </tr>
                                            <tr>
                                              <td>LEGAL ARTICLE</td>
                                              <td><button class="bg-green"><?= $comp_article?></button></td>
                                              <td></td>
                                            </tr>
                                            <tr>
                                              <td>PROJECT REPORT</td>
                                              <td></td>
                                              <td></td>
                                            </tr>
                                          </table>
                                        </div>
                                      </div>
                                    </li>
                                    <li>
                                        <i class="fa fa-book bg-purple"></i>
                                        <div class="timeline-item">
                                            <span class="time"></span>
                                            <h3 class="timeline-header"><a href="#">Syllabus</a></h3>
                                            <div class="timeline-body">
                                              <table class="table table-striped">
                                                  <tr>
                                                      <th>Name</th>
                                                      <th>Total</th>
                                                      <th>Allotted Days</th>
                                                      <th>Stage</th>
                                                  </tr>
                                                  <?php
                            $syllabus_all = SyllabusDetail::find('syllabus_catg_name,tot_count,tot_days,stage')->where(['course_code'=>$course_code])->all();
                            foreach($syllabus_all as $syllabus){
                            ?>
                                                  <tr>
                                                      <td><?= $syllabus->syllabus_catg_name;?></td>
                                                      <td><?= $syllabus->tot_count;?></td>
                                                      <td><?= $syllabus->tot_days; ?></td>
                                                      <td><?= $syllabus->stage; ?></td>
                                                  </tr>
                                                  <?php } ?>
                                              </table>  
                                            </div>
                                        </div>
                                    </li>
                                    <li class="time-label">
                                        <span class="bg-green">
                                          Analytics Summary
                                        </span>  
                                    </li>
                                    <li>
                                        <i class="fa fa-asterisk bg-purple"></i>
                                        <div class="timeline-item">
                                            <span class="time"></span>
                                            <h3 class="timeline-header"><a href="#">Fixed Data Points</a></h3>
                                            <div class="timeline-body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>Advocates</th>
                                                        <th>Judges</th>
                                                        <th>SearchTag</th>
                                                        <th>Citations Journals</th>
                                                        <th>UnCited Journals</th>
                                                        <th>Judgment Referred</th>
                                                        <th>Acts/Sections</th>
                                                    </tr>
                                                     <?php
                                                     $tot_advocate = JudgmentAdvocate::find()->where(['username'=>$username])->andWhere(['work_status'=>'C'])->count();
                                                     $tot_judge = JudgmentJudge::find()->where(['username'=>$username])->andWhere(['work_status'=>'C'])->count();
                                                     $tot_searchtag = JudgmentMast::find()->where(['username'=>$username])->andWhere(['work_status'=>'C'])->andWhere(['not', ['search_tag_count' => null]])->sum('search_tag_count');
                                                     $tot_citation = JudgmentCitation::find()->where(['username'=>$username])->andWhere(['not', ['citation' => null]])->andWhere(['work_status'=>'C'])->count();
                                                     $tot_uncited = JudgmentCitation::find()->where(['username'=>$username])->andWhere(['is', 'citation', new \yii\db\Expression('null')])->count();
                                                     $tot_ref = JudgmentRef::find()->where(['username'=>$username])->andWhere(['work_status'=>'C'])->count();
                                                     $tot_act = JudgmentAct::find()->where(['username'=>$username])->andWhere(['work_status'=>'C'])->count();
                                                     ?>

                                                    <tr>
                                                        <td><a href="/advanced_yii/judgment-mast/judgment-advocates"><?= $tot_advocate;?></a></td>
                                                        <td><a href="/advanced_yii/judgment-mast/judgment-judges"><?= $tot_judge;?></a></td>
                                                        <td><a href="#"><?= $tot_searchtag;?></a></td>
                                                        <td><a href="/advanced_yii/judgment-mast/judgment-citations"><?= $tot_citation;?></a></td>
                                                        <td><a href="/advanced_yii/judgment-mast/judgment-uncited"><?= $tot_uncited;?></a></td>
                                                        <td><a href="/advanced_yii/judgment-mast/judgment-referred"><?= $tot_ref;?></a></td>
                                                        <td><a href="/advanced_yii/judgment-mast/judgment-acts"><?= $tot_act;?></a></td>
                                                        
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="vdp" <?php if ($course_code == 'RCCLRW01'){ ?> hidden <?php   } ?>>  
                                        <i class="fa fa-circle bg-blue"></i>
                                        <div class="timeline-item">
                                            <span class="time"></span>
                                            <h3 class="timeline-header"><a href="#">Variable Data Points</a></h3>
                                            <div class="timeline-body">
                                                <table class="table table-striped">
                                                   <tr>
                                                      <th>Judgment Elements</th>
                                                      <th>Data Points</th> 
                                                   </tr>
                                                   <?php 
                                                   $tot_element = JudgmentElement::find()->where(['username'=>$username])->count();
                                                   $tot_datapoint = JudgmentDataPoint::find()->where(['username'=>$username])->count();
                                                   ?>
                                                   <tr>
                                                       <td><a href="/advanced_yii/judgment-mast/judgment-elements"><?= $tot_element;?></a></td>
                                                       <td><a href="/advanced_yii/judgment-mast/judgment-datapoints"><?= $tot_datapoint;?></a></td>
                                                   </tr> 
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa fa-clock-o bg-gray"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="activity">
                                                <!-- Post -->
                            <h2><center>Graphical Representation of Data Points</center></h2>
                  <div class="row">
                  <div class="col-sm-6" style="border: 1px solid #000000">
                    <h5><b><a target="_blank" href="/advanced_yii/site/chart-disposition"><center>Disposition</center></a></b></h5>
                    <?= PieChart::widget([
                    //'height' => '600px',
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'disposition_text:string',
                        'total'
                          ],
                    'options' => [
                        //'title' => 'Disposition',
                        'is3D' => true,
                    ],
                      ]) ?>
                   
                  </div>
                  <div class="col-sm-6" style="border: 1px solid #000000">
                    <h5><b><a target="_blank" href="/advanced_yii/site/chart-bench"><center>Judgment Bench</center></a></b></h5>
                    <?= PieChart::widget([
                   // 'height' => '600px',
                    'dataProvider' => $dataProviderbench,
                    'columns' => [
                        'bench_type_text:string',
                        'total'
                          ],
                    'options' => [
                        //'title' => 'Judgment Bench',
                        'is3D' => true,
                    ],
                      ]) ?>
                   
                  </div>
                  </div>
                  <!-- /.row -->
                  <div class="row">

                    <div class="col-sm-6" style="border: 1px solid #000000">
                      
                      <h5><b><a target="_blank" href="/advanced_yii/site/chart-jurisdiction"><center>Judgment Jurisdiction</center></a></b></h5>  
                       <?= PieChart::widget([
                    //'height' => '600px',
                    'dataProvider' => $dataProviderjrdct,
                    'columns' => [
                        'judgmnent_jurisdiction_text:string',
                        'total'
                          ],
                    'options' => [
                       // 'title' => 'Judgment Jurisdiction',
                        'is3D' => true,

                    ],
                      ]) ?>
                      
                    
                    </div>
                    <div class="col-sm-6" style="border: 1px solid #000000">
                      
                        <h5><b><a target="_blank" href="/advanced_yii/site/chart-jcatg"><center>Judgment Category</center></a></b></h5> 
                       <?= PieChart::widget([
                   // 'height' => '600px',
                    'dataProvider' => $dataProviderjcatg,
                    'columns' => [
                        'jcatg_description:string',
                        'total'
                          ],
                    'options' => [
                        //'title' => 'Judgment Category',
                        'is3D' => true,
                    ],
                      ]) ?>
                      
                    
                    </div>
                    
                  </div>
                   <!-- /.row -->
                  <div class="row">

                    <div class="col-sm-6" style="border: 1px solid #000000">
                      
                       <h5><b><a target="_blank" href="/advanced_yii/site/chart-bareact"><center>Bareact</center></a></b></h5>  
                       <?= PieChart::widget([
                    //'height' => '600px',
                    'dataProvider' => $dataProviderbareact,
                    'columns' => [
                        'bareact_desc:string',
                        'total'
                          ],
                    'options' => [
                        //'title' => 'Bareact',
                        'is3D' => true,
                    ],
                      ]) ?>
                      
                    
                    </div>
                  </div>
                  
                  




                            </div>
                        </div>
                    </div>
                </div>
            </div><!---row--->
         </section>
            <!---section--->
    </div>
      <!---body-content--->
</div>
      <!---template--->            

