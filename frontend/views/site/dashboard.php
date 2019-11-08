<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\CourseMast;
use frontend\models\SyllabusDetail;


//$this->params['breadcrumbs'][] = $this->title;


?>


<div class="template">
    <div class ="body-content">
        <div class="col-md-12">
            <div class="row">

                <!--SideBar Menu-->
                <div class="col-md-4 border-green side-menu">
                    <div class="row side-menu-content">
                        <div class="box box-v2">   
                     <!--        <div class="box-body">
                                
                              
                                  <a href="/judgment-mast/index" class="btn theme-blue-button btn-block">Judgment Mast</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Advocate</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Parties</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Referred</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Coram</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Overrules</a>
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Citation</a>
                              
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Overruled by</a>
                              
                              
                                  <a href="" class="btn theme-blue-button btn-block">Judgment Ext Remark</a>
                              
                             
                            </div> -->
                             <?php $form = ActiveForm::begin(); ?>
                              <div class="box-body">
                                
                                  <table>
                                     <?php foreach ($model as $key => $value) {
                                       
                                      ?>
                               <tr>
                                    <td>Name</td>
                                    <td><?php echo $value['student_name']; ?></td>
                                </tr> 
                                <tr>
                                    <td>College Name</td>
                                    <td><?=$value['college_name']; ?></td>
                                </tr>  
                                <tr>
                                    <td></td>
                                    <td><?php $value['course_code']; ?></td>
                                </tr> 
                                 <?php $course = CourseMast::find('course_duration')->where(['course_code'=>$value['course_code']])->one();
                                    
                                    $course_duration = $course->course_duration;
                                    if ($course_duration<=1){$month = 'Month';}else{ $month = 'Months';}
                                    
                                 ?>
                                     
                                <tr>
                                    <td>Course</td>
                                    <td><?=$value['course_name']; ?></td>
                                </tr> 
                                <tr>
                                    <td>Duration</td>
                                    <td><?= $course_duration.' '.$month ;?></td>
                                </tr>
                                <?php
                            $syllabus_all = SyllabusDetail::find('syllabus_catg_name,tot_count')->where(['course_code'=>$value['course_code']])->all();
                                
                               // print_r($syllabus);die;
                            foreach($syllabus_all as $syllabus){
                                ?>
                                
                                <tr>
                                    <td><?php echo $syllabus->syllabus_catg_name; ?></td>
                                    <td><?php echo $syllabus->tot_count; ?></td>
                                </tr>
                            <?php } ?>
                                
                                
                               <!--  <tr>
                                    <td>Status</td>
                                    <td><?php //echo 'Pending'; ?></td>
                                </tr>   
                                     <tr>
                                    <td>Acts worked on</td>
                                    <td><?php //echo '222'; ?></td>
                                </tr>
                                <tr>
                                    <td>Judgment Elements</td>
                                    <td><?php //echo '15'; ?></td>
                                </tr>   
                                <tr>
                                    <td>Unique DataPoints</td>
                                    <td><?php //echo '222'; ?></td>
                                </tr>    -->
                                <?php } ?>   
                             </table>
                            </div>
                             <?php $form = ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            

                 <div class="col-md-8 border-green">
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
                                    <td><a href="/advanced_yii/judgment-mast/total-list"><?php echo $tot_judgment;?></a></td>
                                    <td><a href="/advanced_yii/judgment-mast/total-pending"><?php echo $tot_judgment_pending; ?></a></td>
                                    <td><a href="/advanced_yii/judgment-mast/total_completed"><?php echo $tot_judgment_worked; ?></a></td>
                                    <td><a href="/advanced_yii/judgment-mast/index" class="btn theme-blue-button btn-block">Begin</a></td>
                                </tr> 
                                <tr>
                                    <th>Supreme Court Judgments Alloted</th>
                                   <td><?php echo $sc_judgment;?></td>
                                    <td><?php echo $sc_judgment_pending; ?></td>
                                    <td><?php echo $sc_judgment_worked; ?></td>
                                    <td></td>
                                </tr>  
                                <tr>
                                    <th>High Court Judgments Alloted</th>
                                    <td><?php echo $hc_judgment;?></td>
                                    <td><?php echo $hc_judgment_pending; ?></td>
                                    <td><?php echo $hc_judgment_worked; ?></td>
                                    <td></td>
                                </tr> 
                               <!--  <tr>
                                    <th>Article Writing</th>
                                    <td>15</td>
                                    <td>5</td>
                                    <td>10</td>
                                    <td><a href="/advanced_yii/judgment-mast/index" class="btn theme-blue-button btn-block">Begin</a></td>
                                </tr>     -->

                             </table>

                            <!-----end of table----->
                        </div>
                    
                </div>
                </div>
            </div>
             </div>
        
    </div>
</div>
                

