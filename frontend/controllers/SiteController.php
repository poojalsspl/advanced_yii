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
use common\models\User;
use frontend\models\PasswordResetRequestForm;
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
use app\models\CourseMast;
use yii\helpers\Html;
use yii\helpers\Url;

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
                'only' => ['logout','create', 'update', 'delete'],
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
        return $this->render('index');
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
    /*static pages end*/

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
        $qry = Yii::$app->db->createCommand("SELECT MAX(enrol_no+1) FROM student");
        $sum = $qry->queryScalar();
        $split = str_split($sum,6); // splits a string into an array.
        $enrol_no = $year.$month.$split[1];
        $model->enrol_no = $enrol_no;

        if (Yii::$app->request->post()) {
            $model->load(\Yii::$app->request->post());
            $college = new CollegeMast();
            $college_name =  $college->getCollegeName($model->college_code);
            $model->college_name = $college_name ;  

            $course = new CourseMast();
            $course_name =  $course->getCourseName($model->course_code);
            $model->course_name = $course_name ;
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


     public function actionStudentDoc()
    {
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
            $model->doc_tenth = UploadedFile::getInstance($model, 'doc_tenth');
            $model->doc_twelve = UploadedFile::getInstance($model, 'doc_twelve');
            $model->doc_id_proof = UploadedFile::getInstance($model, 'doc_id_proof');

            $model->doc_tenth->saveAs('uploads/'.$path.'/'.$doc_tenth.'.'.$model->doc_tenth->extension );
            $model->doc_twelve->saveAs('uploads/'.$path.'/'.$doc_twelve.'.'.$model->doc_twelve->extension );
            $model->doc_id_proof->saveAs('uploads/'.$path.'/'.$doc_id_proof.'.'.$model->doc_id_proof->extension );

            $model->doc_tenth = $path.'/'.$doc_tenth.'.'.$model->doc_tenth->extension;
            $model->doc_twelve = $path.'/'.$doc_twelve.'.'.$model->doc_twelve->extension;
            $model->doc_id_proof = $path.'/'.$doc_id_proof.'.'.$model->doc_id_proof->extension;

            if ($model->save() && $user->SetStatus($id,'2')) {
                Yii::$app->session->setFlash('success', "Documents Uploaded Successfully."); 
                 return $this->redirect(['document']);

              } else {
                  Yii::$app->session->setFlash('error', "Please upload all documents.");
              }
            return $this->redirect(['dashboard']);
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
        $sql = (new \yii\db\Query());
        $sql->select(['student_name','college_name','course_code','course_name']) 
           ->from('student')
           ->where('userid=:userid', [':userid' => $id]);
        $command = $sql->createCommand();
     
        $model = $command->queryAll(); 
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
                Yii::$app->session->setFlash('success', 'Thank you for registration.');
            return $this->refresh();
               }
        }
           
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

   

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

    /**
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
