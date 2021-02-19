<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "advocate_mast".
 *
 * @property int $adv_id
 * @property string|null $advocate_name
 * @property string|null $email_id
 * @property string|null $password
 * @property string|null $dob
 * @property string|null $gender
 * @property string|null $mobile
 * @property string|null $image
 * @property int|null $court_code
 * @property string|null $court_name
 * @property int|null $country_code
 * @property int|null $state_code
 * @property int|null $city_code
 * @property string|null $regs_numb
 * @property int|null $regs_year
 * @property int|null $qual_type
 * @property string|null $mkt_username
 * @property int $std_id
 * @property int|null $surv_status
 * @property string|null $surv_date
 * @property string|null $surv_compstatus
 * @property string $crdt
 */
class AdvocateMast extends \yii\db\ActiveRecord 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advocate_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dob', 'surv_date', 'crdt'], 'safe'],
            [['court_code', 'country_code', 'state_code', 'city_code', 'regs_year', 'qual_type','std_id', 'surv_status'], 'integer'],
            [['mobile'], 'number'],
            [['mobile'], 'match', 'pattern' => '/^[6-9][0-9]{9}$/'],
            [['email_id'], 'email'],
            [['advocate_name', 'court_name'], 'string', 'max' => 100],
            [['email_id','password','advocate_name','dob','state_code','city_code'], 'required'],
            [['email_id', 'mkt_username'], 'string', 'max' => 50],
            //[['image'], 'string', 'max' => 200],
            //[['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['password', 'regs_numb'], 'string', 'max' => 25],
            [['gender'], 'string', 'max' => 1],
            [['mobile'], 'string'],
            [['surv_compstatus'], 'string', 'max' => 2],
        ];

         
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'adv_id' => 'Adv ID',
            'advocate_name' => 'Advocate Name',
            'email_id' => 'Email(login username)',
            'password' => 'Password',
            'dob' => 'DOB',
            'gender' => 'Gender',
            'mobile' => 'Mobile',
            'image' => 'Image',
            'court_code' => 'Court Name',
            'court_name' => 'Court Name',
            'country_code' => 'Country Name',
            'state_code' => 'State Name',
            'city_code' => 'City Name',
            'regs_numb' => 'Registration Number(Bar Council Number)',
            'regs_year' => 'Registration Year',
            'qual_type' => 'Qualification Type',
            'mkt_username' => 'Mkt Username',
            'std_id' => 'Std ID',
            'surv_status' => 'Survey Status',
            'surv_date' => 'Survey Date',
            'surv_compstatus' => 'Survey Completion status',
            'crdt' => 'Create Date',
        ];
    }

    public function getCourtCode()
    {
        return $this->hasOne(CourtMast::className(), ['court_code' => 'court_code']);
    }

    //  public function upload()
    // {
    //     if ($this->validate()) {
    //         $this->image->saveAs('uploads/survey_docs/advocate/' . $this->image->baseName . '.' . $this->image->extension);
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
