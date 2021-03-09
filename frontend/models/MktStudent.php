<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "mkt_student".
 *
 * @property int $std_id
 * @property string $referral_code
 * @property string|null $lawhub_id
 * @property string $username
 * @property string|null $password
 * @property string|null $regs_date
 * @property string|null $student_name
 * @property string|null $gender
 * @property string|null $qual_name
 * @property string|null $qual_year
 * @property string|null $edu_status ongoing 0/completed 1
 * @property string|null $dob
 * @property string|null $mobile_number
 * @property string|null $document
 * @property int|null $country_code
 * @property int|null $state_code
 * @property int|null $city_code
 * @property string|null $addr
 * @property int|null $pincode
 * @property string|null $college_name
 * @property string|null $univ_name
 * @property int|null $allocated_qty
 * @property int|null $target_survey
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int $log_status
 * @property string|null $course_code
 * @property string|null $course_name
 */
class MktStudent extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mkt_student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username','password'], 'required'],
            [['regs_date', 'qual_year', 'dob', 'start_date', 'end_date'], 'safe'],
            [['country_code', 'state_code', 'city_code', 'pincode', 'allocated_qty', 'target_survey', 'log_status'], 'integer'],
            [['referral_code', 'mobile_number'], 'string', 'max' => 10],
            [['lawhub_id'], 'string', 'max' => 12],
            [['username', 'course_name'], 'string', 'max' => 50],
            [['mobile_number'], 'number'],
            [['mobile_number'], 'match', 'pattern' => '/^[6-9][0-9]{9}$/'],
            [['password', 'qual_name'], 'string', 'max' => 25],
            [['student_name', 'college_name', 'univ_name'], 'string', 'max' => 100],
            [['gender', 'edu_status'], 'string', 'max' => 1],
            [['document'], 'string', 'max' => 200],
            [['addr'], 'string', 'max' => 300],
            [['course_code'], 'string', 'max' => 8],
            [['username'], 'unique'],
        ];

        
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_id' => 'Id',
            'referral_code' => 'Referral code',
            'lawhub_id' => 'Lawhub ID',
            'username' => 'Username',
            'password' => 'Password',
            'regs_date' => 'Regs Date',
            'student_name' => 'Student Name',
            'gender' => 'Gender',
            'qual_name' => 'Qual Name',
            'qual_year' => 'Qual Year',
            'edu_status' => 'Edu Status',
            'dob' => 'Dob',
            'mobile_number' => 'Mobile Number',
            'document' => 'Document',
            'country_code' => 'Country Code',
            'state_code' => 'State Code',
            'city_code' => 'City Code',
            'addr' => 'Addr',
            'pincode' => 'Pincode',
            'college_name' => 'College Name',
            'univ_name' => 'Univ Name',
            'allocated_qty' => 'Allocated Qty',
            'target_survey' => 'Target Survey',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'log_status' => 'Log Status',
            'course_code' => 'Course Code',
            'course_name' => 'Course Name',       
        ];
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        throw new \yii\base\NotSupportedException();
    }

    public function validateAuthKey($authKey)
    {
        throw new \yii\base\NotSupportedException();
    }

    public static function findIdentity($id)
    {
        //return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
        return self::findOne();
    }

     public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }

     public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

     public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
