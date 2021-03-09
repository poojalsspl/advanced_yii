<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\LoginForm1;
use common\models\LoginForm2;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ChangePasswordForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\UserMast;
use app\models\Student;
use frontend\models\StudentDocs;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use frontend\models\CountryMast;
use frontend\models\StateMast;
use frontend\models\CityMast;
use frontend\models\CollegeMast;
use frontend\models\JudgmentMast;
use frontend\models\JudgmentAct;
use frontend\models\MktStudent;
use frontend\models\AdvocateMast;
use frontend\models\AdvocateMastSearch;
use frontend\models\AdvocateSurvey;
use frontend\models\SurveyMast;
use frontend\models\UserSurvey;
use frontend\models\SurveyQuestions;
use frontend\models\MktStudentDoc;
use app\models\CourseMast;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\StatecollegelistView;
use yii\data\ActiveDataProvider;
use frontend\models\WebArticles;
use yii\helpers\Json;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','create', 'update', 'delete','change-password'],
                'rules' => [
                    [
                        
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    
                ],
            ],
      
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'landing';
    $dataProvider = new ActiveDataProvider([
    'query' => StatecollegelistView::find()->orderBy(['state_name' => SORT_ASC]),
    'pagination' => false
    ]);

    $date = date('Y-m-d');
    $query = CollegeMast::find()->select('college_code,college_name,city_name,college_logo')->where(['sponsor'=>'Y'])->andWhere(['<=','startdate',$date])->andWhere(['>=','enddate',$date])->all();

    
        
         return $this->render('index1', [
        'dataProvider' => $dataProvider,
        'models'=> $query,
        
    ]);
    }

    public function actionAdmin3()
    {
      return $this->render('admin3');
    } 

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/dashboard']);
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
            $user = new User();
            $userdata = User::find()->where(['id'=>Yii::$app->user->id])->one();
            if($userdata->log_det == '0')
             {
                return $this->redirect(['site/registration']);
             }else if($userdata->log_det == '1'){
               
               return $this->redirect(['site/student-doc']);
             } else if($userdata->log_det == '2'){
             	return $this->redirect(['site/dashboard']);
             }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    

     

    public function actionLoginbkup1()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/dashboard']);
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
            return $this->redirect(['judgment-mast/index']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLoginbkup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/dashboard']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $usermodel = new UserMast();
            $userdata = UserMast::find()->where(['id'=>Yii::$app->user->id])->one();
            if($userdata->status==0)
             {
               return $this->redirect(['judgment-mast/index']);
             }
            
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

   /* public function actionStudent()
{
         $id = Yii::$app->user->identity->id;
         $user = new LoginForm();

           $model = new \app\models\Student();
           if (Yii::$app->request->post()) {
            $model->load(\Yii::$app->request->post());
           $model->userid= $id;
           $model->start_date= date('Y-m-d');  
           $model->end_date= date('Y-m-d');
            if ($model->save()){
                 return $this->redirect(['dashboard']);
            }
        }
           
      return $this->render('student', [
            'model' => $model,
        ]);

}*/

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

       public function actionChangePassword()
    {
     $id = \Yii::$app->user->id;
   try {
        $model = new ChangePasswordForm($id);
      
    } catch (InvalidParamException $e) {
        throw new BadRequestHttpException($e->getMessage());
    }
 
    if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->changePassword()) {
       
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('success', 'Password Changed!');
        return $this->goHome();

    } 
        return $this->render('changePassword', [
            'model' => $model,
        ]);
     }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    /*static pages start*/
    public function actionAbout()
    {
       return $this->render('about');
    }
    
    public function actionFaq()
    {

        return $this->render('faq');
    }

    public function actionAboutPioneer()
    {

        return $this->render('about-pioneer');
    }

    public function actionCourseJudgmentAnalysis()
    {
        return $this->render('course-judgment-analysis');
    }

    public function actionCourseJudgmentPrecis()
    {
        return $this->render('course-judgment-precis');
    }

     public function actionCourseJudgmentCustomized()
    {
        return $this->render('course-judgment-customized');
    }

    public function actionCourseJudgmentAdvancePrecis()
    {
        return $this->render('course-judgment-advance-precis');
    }

    public function actionCourseJudgmentAdvanceLegal()
    {
        return $this->render('course-judgment-advance-legal');
    }

    public function actionCourseJudgmentArticleWriting()
    {
        return $this->render('course-judgment-article-writing');
    }

    public function actionCourseJudgmentLegalElement()
    {
        return $this->render('course-judgment-legal-element');
    }

    public function actionCourseJudgmentSpecialised()
    {
        return $this->render('course-judgment-specialised');
    }

    public function actionReports()
    {
        return $this->render('reports');
    } 

    public function actionCheckValidJs()
    {
        return $this->render('check-valid-js');
    }

    public function actionBranch()
    { 
     return $this->render('branch');
    }

    public function actionMissing()
    {
        return $this->render('missing');
    }
    
     public function actionCollegeAnalytics()
    {   // for all states 
        $dataProvider = new ActiveDataProvider([
        'query' => StatecollegelistView::find()->orderBy(['state_name' => SORT_ASC]),
        'pagination' => false
        ]);
        
        //for mp
        $dataProvider_mp = new ActiveDataProvider([
        'query' => CollegeMast::find()->select(['count(city_code) AS total,city_name'])->where(['state_code'=>'20'])->groupBy(['city_name']),
        'pagination' => false
        ]);

        //for mh
        $dataProvider_mh = new ActiveDataProvider([
        'query' => CollegeMast::find()->select(['count(city_code) AS total,city_name'])->where(['state_code'=>'21'])->groupBy(['city_name']),
        'pagination' => false
        ]);

        return $this->render('college-analytics',
        [
          'dataProvider' => $dataProvider,
          'dataProvidermp' => $dataProvider_mp,
          'dataProvidermh' => $dataProvider_mh,
      ]);
    }
    /*static pages end*/

    /* chart section begin */

    /*  Disposition Chart */
     public function actionChartDisposition()
      {
        $username = Yii::$app->user->identity->username;
       $dataProvider = new ActiveDataProvider([
        'query' => JudgmentMast::find()->select(['count(disposition_id) AS total,disposition_text'])->where(['username'=>$username])->andWhere(['work_status'=>'C'])->groupBy(['disposition_text']),
        'pagination' => false
        ]); 
       return $this->render('charts/disposition', [
            'dataProvider' => $dataProvider,
      ]);
      }

       /*  Bench Chart */
      public function actionChartBench()
      {
        $username = Yii::$app->user->identity->username;
        $dataProvider = new ActiveDataProvider([
        'query' => JudgmentMast::find()->select(['count(bench_type_id) AS total,bench_type_text'])->where(['username'=>$username])->andWhere(['work_status'=>'C'])->groupBy(['bench_type_text']),
        'pagination' => false
        ]);
        return $this->render('charts/bench', [
            'dataProvider' => $dataProvider,
      ]);
      }

      /* Jurisdiction Chart */
      public function actionChartJurisdiction()
      {
        $username = Yii::$app->user->identity->username;
        $dataProvider = new ActiveDataProvider([
        'query' => JudgmentMast::find()->select(['count(judgment_jurisdiction_id) AS total,judgmnent_jurisdiction_text'])->where(['username'=>$username])->andWhere(['work_status'=>'C'])->groupBy(['judgmnent_jurisdiction_text']),
        'pagination' => false
        ]);
        return $this->render('charts/jurisdiction', [
            'dataProvider' => $dataProvider,
      ]);
      }

      /* Jcatg Chart */
      public function actionChartJcatg()
      {
        $username = Yii::$app->user->identity->username;
        $dataProvider = new ActiveDataProvider([
        'query' => JudgmentMast::find()->select(['count(jcatg_id) AS total,jcatg_description'])->where(['username'=>$username])->andWhere(['work_status'=>'C'])->groupBy(['jcatg_description']),
        'pagination' => false
        ]);
        return $this->render('charts/jcatg', [
            'dataProvider' => $dataProvider,
      ]);
      }

      /* Bareact Chart */
      public function actionChartBareact()
      {
        $username = Yii::$app->user->identity->username;
         $dataProvider = new ActiveDataProvider([
        'query' => JudgmentAct::find()->select(['count(bareact_code) AS total,bareact_desc'])->where(['username'=>$username])->andWhere(['work_status'=>'C'])->groupBy(['bareact_desc']),
        'pagination' => false
        ]);
        return $this->render('charts/bareact', [
            'dataProvider' => $dataProvider,
      ]);
      } 


    /*end of chart section*/

    //addded for fetching state list on registration form
       //addded for fetching state list on registration form
       public function actionSubcat() {
        $out = [];
        $statemodel = new StateMast();
        if (isset($_POST['depdrop_parents'])) {
            
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $out =  $statemodel->getSubCatList($cat_id); 
                   return \yii\helpers\Json::encode(['output'=>$out, 'selected'=>'']);
        }
        }

         echo \yii\helpers\Json::encode(['output'=>'', 'selected'=>'']);

        }

        //addded for fetching city list on registration form
        public function actionGetcity() {
          $out = [];
          $model = new CityMast();
        if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
          $cat_id = $parents[0];
          $out =  $model->getCityList($cat_id); 
           return \yii\helpers\Json::encode(['output'=>$out, 'selected'=>'']);
          }

         }

       echo \yii\helpers\Json::encode(['output'=>'', 'selected'=>'']);
       }

  /*==========Student Detail==========*/
    public function actionRegistration()
{
         $user = new LoginForm();
         $id = Yii::$app->user->identity->id;
         $username = Yii::$app->user->identity->username;
         $mobile = Yii::$app->user->identity->mobile_number;
         $model = new Student();
         $model->regs_date = date('Y-m-d');
         $model->userid = $id;
         $model->email = $username;
         $model->mobile = $mobile;
        $date = date('Y-m-d');
        $date = explode('-', $date);
        $year  = $date[0];
        $month = $date[1];
        $day   = $date[2];
        $qry = Yii::$app->db->createCommand("SELECT IFNULL(max(substr(enrol_no,7,3)),0) + 1 FROM student");
        $sum = $qry->queryScalar();
       //$split = str_split($sum,6);

         // splits a string into an array.
       $enrol_no = $year.$month.$sum;
        $model->enrol_no = $enrol_no;

        if (Yii::$app->request->post()) {
            $model->load(\Yii::$app->request->post());
            /*code for img*/
            $url = 'uploads/profile_img/';
            if (!file_exists($url)) 
            {
               FileHelper::createDirectory($url);
            }
            $profile_pic = mt_rand(10000, 99999);//genrate random number
            $model->profile_pic = UploadedFile::getInstance($model, 'profile_pic');
            $model->profile_pic->saveAs('uploads/profile_img/'.$profile_pic.'.'.$model->profile_pic->extension);//profile pic will save in uploads/profile_img/
            $model->profile_pic = $profile_pic.'.'.$model->profile_pic->extension;// save in database with random file name.extension
             /*code for img*/

            $college = new CollegeMast();
            $college_name =  $college->getCollegeName($model->college_code);
            $model->college_name = $college_name ;  

            $course = new CourseMast();
            $course_name =  $course->getCourseName($model->course_code);
            $model->course_name = $course_name ;
            $model->course_fees =  $model->courseMast->course_fees;
             if ($model->save() && $user->SetStatus($id,'1')) {
                Yii::$app->session->setFlash('success', "Student profile updated."); 
                 return $this->redirect(['student-doc']);

              } else {
                  Yii::$app->session->setFlash('error', "Student information not saved.");
              }
              
         }
        return $this->render('registration', [
            'model' => $model,
        ]);

     }

    

   
    

     public function actionEdits($uid)
    {
        $model = Student::find()->where(['userid' => $uid])->one();
 
        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
         
        // update record
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['dashboard']);
        }
         
        return $this->render('regs', ['model' => $model]);
    } 


     public function actionStudentDoc()
    {
        $user = new LoginForm(); 
        $id = Yii::$app->user->identity->id;
        $model = new StudentDocs();

        if ($model->load(Yii::$app->request->post())) 
        {
            $username = Yii::$app->user->identity->username;
            $model->username = $username;
            $url = 'uploads/';
            $start_date = date('Y');
            $month = date('m');
            $path = $start_date.'-'.$month;
            $tot = $url.$path;
            if (!file_exists($tot)) 
            {
               FileHelper::createDirectory($tot);
            }
            

            $doc_tenth = mt_rand(10000, 99999);
            $doc_twelve = mt_rand(100000, 999999);
            $doc_id_proof = mt_rand(1000000, 9999999);
            $marksheet    = mt_rand(1000, 9999);
            $passing_certificate = mt_rand(100, 999);
            $model->doc_tenth = UploadedFile::getInstance($model, 'doc_tenth');
            $model->doc_twelve = UploadedFile::getInstance($model, 'doc_twelve');
            $model->doc_id_proof = UploadedFile::getInstance($model, 'doc_id_proof');
            $model->marksheet = UploadedFile::getInstance($model, 'marksheet');
            $model->passing_certificate = UploadedFile::getInstance($model, 'passing_certificate');

            /*if ($model->marksheet){
              $marksheet = mt_rand(1, 99);
              $model->marksheet = UploadedFile::getInstance($model, 'marksheet');
              $model->marksheet->saveAs('uploads/'.$path.'/'.$marksheet.'.'.$model->marksheet->extension );
              $model->marksheet = $path.'/'.$marksheet.'.'.$model->marksheet->extension;
            }*/
              //print_r($model);die;
            // if ($_POST['StudentDocs']['passing_certificate']){
            //   $passing_certificate = mt_rand(100, 999);
            //   $model->passing_certificate = UploadedFile::getInstance($model, 'passing_certificate');
            //   $model->passing_certificate->saveAs('uploads/'.$path.'/'.$passing_certificate.'.'.$model->passing_certificate->extension );
            //   $model->passing_certificate = $path.'/'.$passing_certificate.'.'.$model->passing_certificate->extension;
            // }

            $model->doc_tenth->saveAs('uploads/'.$path.'/'.$doc_tenth.'.'.$model->doc_tenth->extension );
            $model->doc_twelve->saveAs('uploads/'.$path.'/'.$doc_twelve.'.'.$model->doc_twelve->extension );
            $model->doc_id_proof->saveAs('uploads/'.$path.'/'.$doc_id_proof.'.'.$model->doc_id_proof->extension );
            if ($model->marksheet){
            $model->marksheet->saveAs('uploads/'.$path.'/'.$marksheet.'.'.$model->marksheet->extension );
            }
            if ($model->passing_certificate){
            $model->passing_certificate->saveAs('uploads/'.$path.'/'.$passing_certificate.'.'.$model->passing_certificate->extension );
            }

            $model->doc_tenth = $path.'/'.$doc_tenth.'.'.$model->doc_tenth->extension;
            $model->doc_twelve = $path.'/'.$doc_twelve.'.'.$model->doc_twelve->extension;
            $model->doc_id_proof = $path.'/'.$doc_id_proof.'.'.$model->doc_id_proof->extension;
            if ($model->marksheet){
            $model->marksheet = $path.'/'.$marksheet.'.'.$model->marksheet->extension;
            }
            if ($model->passing_certificate){
            $model->passing_certificate = $path.'/'.$passing_certificate.'.'.$model->passing_certificate->extension;
            }

            if ($model->save() && $user->SetStatus($id,'2')) {
                Yii::$app->session->setFlash('success', "Documents Uploaded Successfully. Please wait for account verification"); 
                 return $this->redirect(['dashboard']);

              } else {
                  Yii::$app->session->setFlash('error', "Please upload all documents.");
              }
            //return $this->redirect(['dashboard']);
        }

        return $this->render('document', [
            'model' => $model,
        ]);
    }

       public function actionPdf_tenth($id) 
    {
        $model = StudentDocs::findOne($id);
        $completePath = Yii::getAlias('@app').'/web/uploads/'.$model->doc_tenth;
        if(!empty($completePath))
        {
            return Yii::$app->response->sendFile($completePath, $model->doc_tenth, ['inline'=>true]);
        }else
        {
            ?> 
            <script>
                alert("Record not found");
            </script>
            <?php
        }
        
    }

    public function actionPdf_twelve($id) 
    {
        $model = Documents::findOne($id);
        $completePath = Yii::getAlias('@web').'uploads/'.$model->doc_twelve;
        if(!empty($completePath))
        {
            return Yii::$app->response->sendFile($completePath, $model->doc_twelve, ['inline'=>true]);
        }else
        {
            ?> 
            <script>
                alert("Record not found");
            </script>
            <?php
        }
        
    }

    public function actionPdf_idproof($id) 
    {
        $model = Documents::findOne($id);
        $completePath = Yii::getAlias('@web').'uploads/'.$model->doc_id_proof;
        if(!empty($completePath))
        {
            return Yii::$app->response->sendFile($completePath, $model->doc_id_proof, ['inline'=>true]);
         }else
        {
           ?> 
            <script>
                alert("Record not found");
            </script>
            <?php 
        }
        
    }

     /*==========Student Detail==========*/

         public function actionDashboard()
     {
         $id = Yii::$app->user->identity->id;
         $username = Yii::$app->user->identity->username;
         $model = Student::find()->where(['email'=>$username])->all();
         $course_code = $model[0]['course_code'];

         
        /*    judgment   */
        $tot_judgment = JudgmentMast::find()->where(['username'=>$username])->count(); 
        $tot_judgment_worked = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['completion_date' => null]])->count();
        $tot_judgment_pending = JudgmentMast::find()->where(['username'=>$username])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count();

        /*   Supreme Court judgment   */
        $sc_judgment = JudgmentMast::find()->where(['username'=>$username])->andWhere(['court_code' => '1'])->count();
        $sc_judgment_worked = JudgmentMast::find()->where(['username'=>$username])->andWhere(['court_code' => '1'])->andWhere(['not', ['completion_date' => null]])->count();
        $sc_judgment_pending = JudgmentMast::find()->where(['username'=>$username])->andWhere(['court_code' => '1'])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count();

        /*   High Court judgment   */
        $hc_judgment = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['court_code' => '1']])->count();
        $hc_judgment_worked = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['court_code' => '1']])->andWhere(['not', ['completion_date' => null]])->count();
        $hc_judgment_pending = JudgmentMast::find()->where(['username'=>$username])->andWhere(['not', ['court_code' => '1']])->andWhere(['is', 'completion_date', new \yii\db\Expression('null')])->count();

        /*  Disposition Chart */
        $dataProvider = new ActiveDataProvider([
        'query' => JudgmentMast::find()->select(['count(disposition_id) AS total,disposition_text'])->where(['username'=>$username])->andWhere(['work_status'=>'C'])->groupBy(['disposition_text']),
        'pagination' => false
        ]); 

        /*  Bench Chart */
        $dataProvider_bench = new ActiveDataProvider([
        'query' => JudgmentMast::find()->select(['count(bench_type_id) AS total,bench_type_text'])->where(['username'=>$username])->andWhere(['work_status'=>'C'])->groupBy(['bench_type_text']),
        'pagination' => false
        ]);

        /* Jurisdiction Chart */
        $dataProvider_jrdct = new ActiveDataProvider([
        'query' => JudgmentMast::find()->select(['count(judgment_jurisdiction_id) AS total,judgmnent_jurisdiction_text'])->where(['username'=>$username])->andWhere(['work_status'=>'C'])->groupBy(['judgmnent_jurisdiction_text']),
        'pagination' => false
        ]);

        /* Jcatg Chart */
        $dataProvider_jcatg = new ActiveDataProvider([
        'query' => JudgmentMast::find()->select(['count(jcatg_id) AS total,jcatg_description'])->where(['username'=>$username])->andWhere(['work_status'=>'C'])->groupBy(['jcatg_description']),
        'pagination' => false
        ]);

        /* Bareact Chart */
        $dataProvider_bareact = new ActiveDataProvider([
        'query' => JudgmentAct::find()->select(['count(bareact_code) AS total,bareact_desc'])->where(['username'=>$username])->andWhere(['work_status'=>'C'])->groupBy(['bareact_desc']),
        'pagination' => false
        ]);

      

         return $this->render('dashboard', [
            'model' => $model,
            'tot_judgment' => $tot_judgment,
            'tot_judgment_worked' => $tot_judgment_worked,
            'tot_judgment_pending' => $tot_judgment_pending,
            'sc_judgment' => $sc_judgment,
            'sc_judgment_worked' => $sc_judgment_worked,
            'sc_judgment_pending' => $sc_judgment_pending,
            'hc_judgment' => $hc_judgment,
            'hc_judgment_worked' => $hc_judgment_worked,
            'hc_judgment_pending' => $hc_judgment_pending,
            'dataProvider' => $dataProvider,
            'dataProviderbench' => $dataProvider_bench,
            'dataProviderjrdct' => $dataProvider_jrdct,
            'dataProviderjcatg' => $dataProvider_jcatg,
            'dataProviderbareact' => $dataProvider_bareact,
            ]); 
       
    
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                //Yii::$app->session->setFlash('success', 'Thank you for registration.');
            return $this->render('signupsuccess');
               }
        }
           
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /***++++++++++++++++  Survey Module Start +++++++++++++++++
    
   // Function used : MktSignup, AllSignup, Mktlogin, AllLogin,  MktRegistration, StudentDashboard, //                 StudentLogout, AdvocateLogout, AdvocateRegistration, AdvLogin, AdvocateDashboard, AdvocateIndex, Survey, SurveySuccess
   
    ++++++++++++++++                      +++++++++++++++++***/

   
 /*marketing survey signup (for IIM)*/
    public function actionMktSignup()
     {
      $this->layout = 'survey';
      $model = new MktStudent();
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
        Yii::$app->session->setFlash('success', "Thank You for Registration.<br> Please login for further information.");
             return $this->redirect(['mkt-login']);
        }
 
        return $this->render('survey/signup_mkt', [
            'model' => $model,
        ]);
     }


     /*marketing survey signup*/
    public function actionAllSignup()
     {
      //$this->layout = 'survey';
      $model = new MktStudent();
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
        Yii::$app->session->setFlash('success', "Thank You for Registration.<br> Please login for further information.");
             return $this->redirect(['all-login']);
        }
 
        return $this->render('survey/allsignup', [
            'model' => $model,
        ]);
     }

     /*marketing survey login(for IIM)*/
    public function actionMktLogin()
    {
       $this->layout = 'survey'; 
        $model = new LoginForm1();
       if ($model->load(Yii::$app->request->post())){
       $username = $_POST['LoginForm1']['username'];
       $password = $_POST['LoginForm1']['password'];
       $_SESSION["username"] = $username;
       $_SESSION["password"] = $password;

      return $this->redirect(['mkt-registration']);

       }

         return $this->render('survey/mkt_login', [
                'model' => $model,
            ]);
        
    }

     /*marketing survey login*/
    public function actionAllLogin()
    {
       $this->layout = 'survey'; 
        $model = new LoginForm1();
       if ($model->load(Yii::$app->request->post())){
       $username = $_POST['LoginForm1']['username'];
       $password = $_POST['LoginForm1']['password'];
     $modeldata = MktStudent::find()->where(['username'=>$username])->andWhere(['password'=>$password])->one();
     if(!empty($modeldata)){

       $_SESSION["username"] = $username;
       $_SESSION["password"] = $password;
      return $this->redirect(['student-dashboard']);
       }else{
        Yii::$app->session->setFlash('error', "Invalid Username or password.");
        return $this->render('survey/mkt_login', [
                'model' => $model,
            ]);
       }

     }
         return $this->render('survey/mkt_login', [
                'model' => $model,
            ]);
    }

    /*marketing survey registration(for IIM)*/
        public function actionMktRegistration()
     {
        $this->layout = 'survey';
         $check_data = MktStudent::find()->where(['username'=>$_SESSION["username"]])->andWhere(['password'=>$_SESSION["password"]])->one();
          if(empty($check_data)){
           Yii::$app->session->setFlash('error', "Incorrect username or password.");
          return $this->redirect(['mkt-login']); 
          } else{
          $model = MktStudent::find()->where(['username'=>$_SESSION["username"]])->one();
              if($model->log_status == '0'){
                if (Yii::$app->request->post()) {
                  $model->load(\Yii::$app->request->post());
                  $url = 'uploads/survey_docs/';
                  if (!file_exists($url)) 
                  {
                    FileHelper::createDirectory($url);
                  }
                  $document = mt_rand(10000, 99999);
                  $model->document = UploadedFile::getInstance($model, 'document');
                  $model->document->saveAs('uploads/survey_docs/'.$document.'.'.$model->document->extension);
                  $model->document = $document.'.'.$model->document->extension;
                  $model->regs_date = date('Y-m-d');
                  $model->log_status = '1';
                  if ($model->save()){
                    Yii::$app->session->setFlash('success', "Student profile updated."); 
                    return $this->redirect(['student-dashboard']);
                  }else{
                    Yii::$app->session->setFlash('error', "Student information not saved.");
                  }
                }
              }
              if($model->log_status == '1'){
                return $this->redirect(['student-dashboard']);    
              }
          }
          return $this->render('survey/mkt_registration', [
            'model' => $model,
        ]);

     }

     /*marketing survey student dashboard*/
     public function actionStudentDashboard(){
      $this->layout = 'survey';
      $student = MktStudent::find()->where(['username'=>$_SESSION["username"]])->one();
      $sid = $student->std_id;
      $count = AdvocateMast::find()->where(['std_id'=>$sid])->count();
      $help = MktStudentDoc::find()->where(['survey_id'=>'1'])->orderBy('sno')->all();
    return $this->render('survey/student_dashboard',['student'=>$student,'count'=>$count,'help'=>$help]);    
     }

    /*marketing survey student logout*/
     public function actionStudentLogout()
    {
        session_unset();
        session_destroy();
        return $this->redirect('http://www.lawhub.in/');
    }

    /*marketing survey advocate logout*/
     public function actionAdvocateLogout()
    {
        session_unset();
        session_destroy();
        return $this->redirect('http://localhost/advanced_yii/site/adv-login');
    }

    /*marketing survey advocate registration*/
     public function actionAdvocateRegistration($sid)
    {
        if(empty($_SESSION["username"])){
        $this->layout = 'advocatesurvey';
        }else{
         $this->layout = 'survey'; 
        }
        $model = new AdvocateMast();     
                if (Yii::$app->request->post()) {
                  $model->load(\Yii::$app->request->post());
                  
                  
                  if(!empty($_SESSION["username"])){
                  $model->mkt_username = $_SESSION["username"];
                   }
                  if(!empty($model->court_code)){
                  $model->court_name  =  $model->courtCode->court_name;
                }
                 $model->std_id = $sid ;
                 $model->country_code = '1' ;
                 

                 
                 
                  if ($model->save()){
                    $surveymodel = SurveyQuestions::find()->select('distinct(question_id) question_id,survey_id,catg_code,question_name')->where(['survey_id'=>'1'])->orderBy('catg_code')->all();
                    foreach($surveymodel as $surveyque) {
                     $usersurvey = new UserSurvey();
                     $usersurvey->std_id = $sid;
                     $usersurvey->adv_id = $model->adv_id;
                     $usersurvey->survey_id = $surveyque->survey_id;
                     $usersurvey->catg_code = $surveyque->catg_code;
                     $usersurvey->question_id = $surveyque->question_id;
                     $usersurvey->question_name = $surveyque->question_name;
                     $usersurvey->save(false);
                    }
                    Yii::$app->session->setFlash('success', "Registration Complete."); 
                    return $this->redirect(['survey','adv_id'=>$model->adv_id]);
                  }else{
                    Yii::$app->session->setFlash('error', "information not saved.");
                  }
                }
              
            return $this->render('survey/advocate_registration', [
            'model' => $model,
        ]);
    }

    /*marketing survey advocate login*/
    public function actionAdvLogin()
    {
       $this->layout = 'advocatesurvey'; 
        $model = new LoginForm2();
       if ($model->load(Yii::$app->request->post())){
       $email_id = $_POST['LoginForm2']['email_id'];
       $password = $_POST['LoginForm2']['password'];
       $modeldata = AdvocateMast::find()->where(['email_id'=>$email_id])->andWhere(['password'=>$password])->one();
       if(!empty($modeldata)){
          $_SESSION["email_id"] = $email_id;
          $_SESSION["password"] = $password;
          return $this->redirect(['advocate-dashboard']);
       }else{
        Yii::$app->session->setFlash('error', "Invalid Username or password.");
        return $this->render('survey/advlogin', [
                'model' => $model,
            ]);
       }
       
       }
         return $this->render('survey/advlogin', [
                'model' => $model,
            ]);
    }

     /*marketing survey advocate dashboard*/
    public function actionAdvocateDashboard(){
     
      $this->layout = 'advocatesurvey'; 
      $model = AdvocateMast::find()->where(['email_id'=>$_SESSION["email_id"]])->one();
      return $this->render('survey/advocate_dashboard', [
                'model' => $model,
            ]);
    }

    /*marketing survey advocate list*/
    public function actionAdvocateIndex(){
      $this->layout = 'survey';
       $searchModel = new AdvocateMastSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('survey/advocate_index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } 

    /*marketing survey advocate list*/
    public function actionAdvocateMain(){
      $this->layout = 'survey';
       $searchModel = new AdvocateMastSearch();
       $dataProvider = $searchModel->search1(Yii::$app->request->queryParams);

        return $this->render('survey/advocate_index1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } 

    /*marketing survey */
    public function actionSurvey($adv_id){
      $this->layout = 'advocatesurvey'; 
      $surveyques = UserSurvey::find()->select('question_id,question_name,survey_id,catg_code')->where(['survey_id'=>'1'])->andWhere(['adv_id'=>$adv_id])->andWhere(['is', 'answer', new \yii\db\Expression('null')])->one();

      
      if(!empty($surveyques)){

        $count_ques = UserSurvey::find()->where(['survey_id'=>'1'])->andWhere(['adv_id'=>$adv_id])->count('question_id');

     $count_null_ans = UserSurvey::find()->where(['survey_id'=>'1'])->andWhere(['adv_id'=>$adv_id])->andWhere(['is', 'answer', new \yii\db\Expression('null')])->count();

     if ($count_ques == $count_null_ans) {
         \Yii::$app->db->createCommand("UPDATE advocate_mast SET surv_compstatus = 'P' WHERE adv_id=".$adv_id."")->execute(); 
     }else if($count_ques > $count_null_ans){
           \Yii::$app->db->createCommand("UPDATE advocate_mast SET surv_compstatus = 'PC' WHERE adv_id=".$adv_id."")->execute();
     }

      $ques_id =  $surveyques->question_id;
      $surv_id =  $surveyques->survey_id;

      $surveyans = SurveyQuestions::find()->select('answer,type_id')->where(['survey_id'=>$surv_id])->andWhere(['question_id'=>$ques_id])->all();

      $model = UserSurvey::find()->where(['survey_id'=>'1'])->andWhere(['adv_id'=>$adv_id])->andWhere(['question_id'=> $ques_id])->one();
      if ($model->load(Yii::$app->request->post())) {
        //var_dump($_POST['UserSurvey']['answer']);die;

        $model->answer = $_POST['UserSurvey']['answer'];
        if(is_array($_POST['UserSurvey']['answer'])){
          $model->answer = implode(',', $_POST['UserSurvey']['answer']);
        }
        $model->save();
        return $this->refresh();

      }
   
      return $this->render('survey/survey',[
        'surveyques'=>$surveyques,
        'surveyans'=>$surveyans,
        'model' => $model,
      ]); 
    }else{
        $advocatemodel = AdvocateMast::find()->select('surv_status')->where(['adv_id'=>$adv_id])->one();
        if($advocatemodel->surv_status == '0'){
         return $this->SurveyFinal($adv_id);
        }else{
       $today = date('Y-m-d');
      \Yii::$app->db->createCommand("UPDATE advocate_mast SET surv_status = '2',surv_date = '".$today."',surv_compstatus = 'C' WHERE adv_id=".$adv_id."")->execute(); 
      return $this->render('survey/survey_success'); 
    }
    }

    }



    public function SurveyFinal($adv_id){
        $this->layout = 'advocatesurvey'; 
        $surveyall = UserSurvey::find()->where(['survey_id'=>'1'])->andWhere(['adv_id'=>$adv_id])->all();
         
        \Yii::$app->db->createCommand("UPDATE advocate_mast SET surv_status = '1',surv_compstatus = 'C' WHERE adv_id=".$adv_id."")->execute(); 
        
        return $this->render('survey/survey_final',[
         'surveyall' => $surveyall
        ]);
    }



    /*marketing survey success*/
    public function actionSurveySuccess(){
      $this->layout = 'advocatesurvey'; 
       return $this->render('survey/survey_success'); 
    }

   
   /** ++++++++++++++ Survey Module End  ++++++++++++**/

    public function actionSignupbkup()
    {
        $model = new SignupForm();
        $usermodel = new UserMast();
        if ($model->load(Yii::$app->request->post())) {
            $email         = $_POST['SignupForm']['email'];
            $mobile_number = $_POST['SignupForm']['mobile_number'];
            if ($user = $model->signup()) {
                $id               = $user->id;
                $usermodel->id    = $id;
                $usermodel->email     = $email;
                $usermodel->mobile_1  = $mobile_number;
                $usermodel->sign_date = date('Y-m-d h:i:s');
                $usermodel->status    = 0;
                $usermodel->save(false);
            Yii::$app->session->setFlash('success', 'Thank you for registration.');
            //return $this->render('login'); 
            return $this->refresh();
               }
        }
           

        return $this->render('signup', [
            'model' => $model,
        ]);
    }


    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**zzz
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
