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
        <div class="col-md-12">
            <div class="row">

                <!--SideBar Menu-->
                <div class="col-md-5 border-green ">
                    <div class="row">
                       <div class="box-v2 box-info">
                        <div class="box-header with-border box-header-custom">
                                <div class="row">
                                    <div class="col-md-12 align-left">
                                        <span class="profile-title">Personal Information</span>
                                    </div>
                                       
                                    
                                </div>
                            </div>
                             <?php $form = ActiveForm::begin(); ?>
                              <div class="box-body">
                                
                                  <table>
                                     <?php foreach ($model as $key => $value) {
                                       
                                      ?>
                               <tr>
                                    <th>Name</th>
                                    <td><?php echo $value['student_name']; ?></td>
                                </tr> 
                                <tr>
                                    <th>College Name</th>
                                    <td><?=$value['college_name']; ?></td>
                                </tr>  
                                <tr>
                                    <th></th>
                                    <td><?php $value['course_code']; ?></td>
                                </tr> 
                                 <?php $course = CourseMast::find('course_duration')->where(['course_code'=>$value['course_code']])->one();
                                    
                                    $course_duration = $course->course_duration;
                                    if ($course_duration<=1){$month = 'Month';}else{ $month = 'Months';}
                                    
                                 ?>
                                     
                                <tr>
                                    <th>Course</th>
                                    <td><?=$value['course_name']; ?></td>
                                </tr> 
                                <tr>
                                    <th>Duration</th>
                                    <td><?= $course_duration.' '.$month ;?></td>
                                </tr>
                                <?php
                            $syllabus_all = SyllabusDetail::find('syllabus_catg_name,tot_count')->where(['course_code'=>$value['course_code']])->all();
                                
                               // print_r($syllabus);die;
                            foreach($syllabus_all as $syllabus){
                                ?>
                                
                                <tr>
                                    <th><?php echo $syllabus->syllabus_catg_name; ?></th>
                                    <td><?php echo $syllabus->tot_count; ?></td>
                                </tr>
                            <?php } ?>
                                
                             
                                <?php } ?>  

                             </table>
                            </div>
                             <?php $form = ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 border-green">
                    
                </div>
                 <?php 
                       $tot_article = Articles::find()->where(['username'=>$username])->count();
                       $complete_article = Articles::find()->where(['username'=>$username])->andWhere(['not', ['completion_date' => null]])->count();
                       $pending_article = Articles::find()->where(['username'=>$username])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count();

                       ?>
            

                 <div class="col-md-6 border-green">
                    <div class="row">
                        <div class="box-v2 box-info">
                            <div class="box-header with-border box-header-custom">
                                <div class="row">
                                    <div class="col-md-12 align-left">
                                        <span class="profile-title">Research Job Summary</span>
                                    </div>
                                       
                                    
                                </div>
                            </div>
                            <!-- /.box-header -->
                            
                               
                            <!----table------->
                            <table class="table table-striped">
                                <tr>
                                    <th>Job Name</th>
                                    <th>Total</th>
                                    <th>Pending</th>
                                    <th>Completed</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Judgment Alloted</th>
                                    <td><a href="/advanced_yii/judgment-mast/total-list"><?= $tot_judgment;?></a></td>
                                    <td><a href="/advanced_yii/judgment-mast/total-pending"><?= $tot_judgment_pending; ?></a></td>
                                    <td><a href="/advanced_yii/judgment-mast/total-completed"><?= $tot_judgment_worked; ?></a></td>
                                    <td><a href="/advanced_yii/judgment-mast/index" class="btn theme-blue-button btn-block">Begin</a></td>
                                </tr> 
                                <tr>
                                    <th>Supreme Court Judgments Alloted</th>
                                   <td><a href="/advanced_yii/judgment-mast/total-sc-list"><?= $sc_judgment;?></a></td>
                                    <td><a href="/advanced_yii/judgment-mast/total-sc-pending"><?= $sc_judgment_pending; ?></a></td>
                                    <td><a href="/advanced_yii/judgment-mast/total-sc-completed"><?= $sc_judgment_worked; ?></a></td>
                                    <td></td>
                                </tr>  
                                <tr>
                                    <th>High Court Judgments Alloted</th>
                                    <td><a href="/advanced_yii/judgment-mast/total-hc-list"><?= $hc_judgment;?></a></td>
                                    <td><a href="/advanced_yii/judgment-mast/total-hc-pending"><?= $hc_judgment_pending; ?></a></td>
                                    <td><a href="/advanced_yii/judgment-mast/total-hc-completed"><?= $hc_judgment_worked; ?></a></td>
                                    <td></td>
                                </tr> 
                                <tr>
                                    <th>Article Writing</th>
                                    <td><?= $tot_article;?></td>
                                    <td><?= $pending_article;?></td>
                                    <td><?= $complete_article;?></td>
                                    <td><a href="/advanced_yii/articles/index" class="btn theme-blue-button btn-block">Article Writing</a></td>
                                </tr>    

                             </table>

                            <!-----end of table----->
                        </div>
                    
                </div>
                </div>

            </div><!---row--->
            <?php
        $tot_advocate = JudgmentAdvocate::find()->where(['username'=>$username])->count();
        $tot_judge = JudgmentJudge::find()->where(['username'=>$username])->count();
        $tot_citation = JudgmentCitation::find()->where(['username'=>$username])->count();
        $tot_ref = JudgmentRef::find()->where(['username'=>$username])->count();
        $tot_act = JudgmentAct::find()->where(['username'=>$username])->count();
        $tot_element = JudgmentElement::find()->where(['username'=>$username])->count();
        $tot_datapoint = JudgmentDataPoint::find()->where(['username'=>$username])->count();
        
         
         ?>
            <div class="row">
              <div class="col-md-12 border-green">
                <div class="row">
                        <div class="box-v2 box-info">
                            <div class="box-header with-border box-header-custom">
                                <div class="row">
                                    <div class="col-md-12 align-left">
                                        <span class="profile-title">Analysis Summary</span>
                                    </div>
                                       
                                    
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <table class="table table-bordered">
                              <tr>
                                <th>Advocates</th>
                                <th>Judges</th>
                                <th>Citations Journals</th>
                                <th>Judgment Referred</th>
                                <th>Acts/Sections</th>
                                <th>Elements</th>
                                <th>DataPoints</th>
                                <th></th>
                              </tr>
                              <tr>
                                <td><a href="/advanced_yii/judgment-mast/judgment-advocates"><?php echo $tot_advocate?></a></td>
                                <td><a href="/advanced_yii/judgment-mast/judgment-judges"><?php echo $tot_judge?></a></td>
                                <td><a href="/advanced_yii/judgment-mast/judgment-citations"><?php echo $tot_citation?></a></td>
                                <td><a href="/advanced_yii/judgment-mast/judgment-referred"><?php echo $tot_ref?></a></td>
                                <td><a href="/advanced_yii/judgment-mast/judgment-acts"><?php echo $tot_act?></a></td>
                                <td><a href="/advanced_yii/judgment-mast/judgment-elements">
                                <?php echo $tot_element?></a></td>
                                <td><a href="/advanced_yii/judgment-mast/judgment-datapoints"><?php echo $tot_datapoint?></a></td>
                                <td></td>
                                
                              </tr>
                              
                            </table>
                          </div>
                        </div>
              </div>

            </div>
                       <?php 
                       $tot_article = Articles::find()->where(['username'=>$username])->count();
                       $complete_article = Articles::find()->where(['username'=>$username])->andWhere(['not', ['completion_date' => null]])->count();
                       $pending_article = Articles::find()->where(['username'=>$username])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count();

                       ?>



             </div>
        
    </div>
</div>
                

