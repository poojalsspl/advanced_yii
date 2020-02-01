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

$username = Yii::$app->user->identity->username;
//$this->params['breadcrumbs'][] = $this->title;


?>


<div class="template">
    <div class ="body-content">
         <section class="content">
            <div class="row">
                <!--SideBar Menu-->
                <div class="col-md-3">
                    <!-- Profile  -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <?php 
                            foreach ($model as $key => $value) {
                                $course_name = $value['course_name'];
                                $course = CourseMast::find('course_duration')->where(['course_code'=>$value['course_code']])->one();
                                $course_duration = $course->course_duration;
                                if ($course_duration<=1){$month = 'Month';}else{ $month = 'Months';}
                                $path = Yii::$app->homeUrl . 'frontend/web/uploads/profile_img';
                                $image = $value['profile_pic'];
                                if ($image==""){$image = "profile.jpg";}


                            ?>
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo $img = $path.'/'.$image ; ?>" alt="User profile picture">
                            <h3 class="profile-username text-center"><?php echo $value['student_name']; ?></h3>
                            <p class="text-muted text-center"><?php echo $value['qual_desc']; ?></p>
                             <ul class="list-group list-group-unbordered">
                                 <li class="list-group-item">
                                     <b>DOB</b> <span class="pull-right"><?php echo $value['dob']; ?></span>
                                 </li>
                                 <li class="list-group-item">
                                     <b>Mobile</b> <span class="pull-right"><?php echo $value['mobile']; ?></span>
                                 </li>
                                 <li class="list-group-item">
                                     <b>College</b><span>
                                         <?php echo $value['college_name']; ?>
                                     </span>
                                 </li>
                             </ul>
                             <a href="#" class="btn btn-primary btn-block"><b>Update</b></a>
                             <?php } ?>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Course</h3>
                        </div>
                        <div class="box-body">
                            <strong><i class="fa fa-book margin-r-5"></i> Course Name</strong>
                            <p class="text-muted">
                                <?= $course_name; ?>
                            </p>
                            <hr>
                            <strong><i class="fa fa-clock-o margin-r-5"></i> Duration</strong>
                            <p class="text-muted">
                                <?= $course_duration.' '.$month ;?>
                            </p>
                            <hr>
                            <strong><i class="fa fa-calendar margin-r-5"></i> Srart Date</strong>
                            <p class="text-muted"></p>
                            <hr>
                            <strong><i class="fa fa-calendar margin-r-5"></i> End Date</strong>
                            <p class="text-muted"></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#timeline" data-toggle="tab">Summary</a></li>
                            <li><a href="#settings" data-toggle="tab">Marks</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="timeline">
                                <ul class="timeline timeline-inverse">
                                    <li class="time-label"></li>
                                    <li>
                                        <i class="fa fa-bell bg-blue"></i>
                                        <div class="timeline-item">
                                            <span class="time"></span>
                                            <h3 class="timeline-header"><a href="#"></a></h3>
                                            <div class="timeline-body">
                                                <a class="btn btn-primary btn-xs" href="/advanced_yii/judgment-mast/index">Phase - I</a>
                                                <a class="btn btn-success btn-xs" href="/advanced_yii/articles/index">Phase - II</a>
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
                                                            <th style="width: 10px">#</th>
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
                                                        <tr>
                                                            <td>1.</td>
                                                            <td>Article Alloted</td>
                                                            <td><?= $tot_article;?></td>
                                                            <td><?= $pending_article;?></td>
                                                            <td><?= $complete_article;?></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>2.</td>
                                                            <td>Judgment Alloted</td>
                                                            <td><?= $tot_judgment;?></td>
                                                            <td><?= $tot_judgment_pending; ?></td>
                                                            <td><?= $tot_judgment_worked; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3.</td>
                                                            <td>Supreme Court Judgments Alloted</td>
                                                            <td><?= $sc_judgment;?></td>
                                                            <td><?= $sc_judgment_pending;?></td>
                                                            <td><?= $sc_judgment_worked; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4.</td>
                                                            <td>High Court Judgments Alloted</td>
                                                            <td><?= $hc_judgment;?></td>
                                                            <td><?= $hc_judgment_pending; ?></td>
                                                            <td><?= $hc_judgment_worked; ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <i class="fa fa-bell bg-aqua"></i>
                                        <div class="timeline-item">
                                            <span class="time"></span>
                                            <h3 class="timeline-header"><a href="#"></a></h3>
                                            <div class="timeline-body">
                                                <a class="btn btn-primary btn-xs" href="/advanced_yii/judgment-mast/index">Begin</a>
                                                <a class="btn btn-success btn-xs" href="/advanced_yii/articles/index">Article Writing</a>
                                            </div>
                                        </div>
                                    </li> -->
                                    <li>
                                        <i class="fa fa-asterisk bg-purple"></i>
                                        <div class="timeline-item">
                                            <span class="time"></span>
                                            <h3 class="timeline-header"><a href="#">Analytics Summary</a></h3>
                                            <div class="timeline-body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>Advocates</th>
                                                        <th>Judges</th>
                                                        <th>Citations Journals</th>
                                                        <th>Judgment Referred</th>
                                                        <th>Acts/Sections</th>
                                                    </tr>
                                                     <?php
                                                     $tot_advocate = JudgmentAdvocate::find()->where(['username'=>$username])->count();
                                                     $tot_judge = JudgmentJudge::find()->where(['username'=>$username])->count();
                                                     $tot_citation = JudgmentCitation::find()->where(['username'=>$username])->count();
                                                     $tot_ref = JudgmentRef::find()->where(['username'=>$username])->count();
                                                     $tot_act = JudgmentAct::find()->where(['username'=>$username])->count();
                                                     ?>

                                                    <tr>
                                                        <td><a href="/advanced_yii/judgment-mast/judgment-advocates"><?= $tot_advocate;?></a></td>
                                                        <td><a href="/advanced_yii/judgment-mast/judgment-judges"><?= $tot_judge;?></a></td>
                                                        <td><a href="/advanced_yii/judgment-mast/judgment-citations"><?= $tot_citation;?></a></td>
                                                        <td><a href="/advanced_yii/judgment-mast/judgment-referred"><?= $tot_ref;?></a></td>
                                                        <td><a href="/advanced_yii/judgment-mast/judgment-acts"><?= $tot_act;?></a></td>
                                                        
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
                            <div class="tab-pane" id="settings">
                                
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

