<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\models\JudgmentMast */

$this->title = $model->judgment_code;
//$this->params['breadcrumbs'][] = ['label' => 'Judgment Masts', 'url' => ['judgmentupdate']];
//$this->params['breadcrumbs'][] = $this->title;


?>


    <div class="template">
    <div class ="body-content">
        <div class="col-md-12">
            <div class="row">
                    <!--Content Section-->
                <div class="col-md-12 border-green">
                    <div class="row">
                        <div class="box box-v2">
                       
                         <div class="box-header with-border">
                                <div class="row">
                                    <div class="col-md-12 align-center">
                                        <span class="judgement-title">
                                           <?php echo $model->judgment_title;?>
                                        </span>
                                        
                                    </div>
                                </div>
                            </div>
                        
                        <p class="para2" align="center" style="font-size: 16px">
                            <span><b><?php echo $model->bench_name;?></b></span>
                        </p>
                       
                        <p class="para2" align="left">
                            <?php
                            $dateText="N/A";
                            if(checkdate(date("m",strtotime($model->judgment_date)),date("d",strtotime($model->judgment_date)),date("Y",strtotime($model->judgment_date)))){
                                $dateText=date("Y-m-d",strtotime($model->judgment_date));


                            }
                            ?>
                            
                              <div class="box-body">                                
                                <div class="judgement-detail">
                                    <div class=" col-md-12 judgment-detail-item">
                                        <div class="col-md-3">
                                             <label class="judgement-detail-item-label"><?='Judgement Date: '?></label>
                                        </div> 
                                        <div class="col-md-8"> 
                                             <span class="judgement-detail-item-description"><?php echo $dateText;?></span>
                                        </div>
                                    </div>    

                                     <div class=" col-md-12 judgment-detail-item">
                                        <div class="col-md-3">
                                            <label class="judgement-detail-item-label"><?='Court Name: '?></label>
                                         </div>
                                        <div class="col-md-8">  
                                        <span class="judgement-detail-item-description"><?php echo $model->court_name;?></span>
                                        </div>
                                    </div> 
                            
                      
                                     <div class=" col-md-12 judgment-detail-item">
                                        <div class="col-md-3">
                                            <label class="judgement-detail-item-label"><?='Appellant Names: '?></label>
                                         </div>
                                        <div class="col-md-8">  
                                        <span class="judgement-detail-item-description"><?php echo $model->appellant_name;?></span>
                                        </div>
                                    </div>
                                   
                            
                            <div class=" col-md-12 judgment-detail-item">
                                <div class="col-md-3">
                                     <label class="judgement-detail-item-label"><?='Respondent Names: '?></label>
                                </div>
                                <div class="col-md-8">
                                     <span class="judgement-detail-item-description"><?php echo $model->respondant_name;?></span>
                                </div>
                            </div>
                           
                            
                        
                            <div class=" col-md-12 judgment-detail-item">
                                <div class="col-md-3">
                                    <label class="judgement-detail-item-label"><?='Absract: '?></label>
                                </div>
                                <div class="col-md-8">
                                    <span class="judgement-detail-item-description judgement-abstract"><?php echo $model->judgment_abstract;?></span>
                                </div>  
                            </div>      
                            
                           
                        </div> 
                        
                        <div class="row">
                            <div class="col-md-12 align-center">
                                <span class="judgement-content-title">JUDGEMENT</span>  
                            </div>
                            <div class="col-md-12 judgement-content-container">
                                <span class="judgment-content"><?php echo $model->judgment_text;?></span>  
                            </div>    
                        </div>              
                       
                      
                 
                        </div>

                            </div>

                        </div>
                    </div>
                
                <!--End of Content Section-->
                                
            </div>
        </div>
    </div>
</div>


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->judgment_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Back', ['judgmentupdate', 'jcode' => $model->judgment_code,'doc_id' =>$model->doc_id], ['class' => 'btn btn-primary']) ?>
        
    </p>
      
