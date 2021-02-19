<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "mkt_student".
 *
 * @property int $std_id
 * @property string $username
 * @property string|null $password
 * @property string|null $regs_date
 * @property string|null $student_name
 * @property string|null $gender
 * @property string|null $qual_name
 * @property int|null $qual_year
 * @property string|null $edu_status
 * @property string|null $dob
 * @property string|null $mobile_number
 * @property string|null $document
 * @property int|null $country_code
 * @property int|null $state_code
 * @property int|null $city_code
 * @property string|null $college_name
 * @property string|null $univ_name
 * @property int|null $allocated_qty
 * @property int|null $target_qty
 * @property string|null $start_date
 * @property string|null $end_date
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
            [['regs_date', 'dob', 'start_date', 'end_date'], 'safe'],
            [['qual_year', 'country_code', 'state_code', 'city_code', 'allocated_qty', 'target_qty'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['mobile_number'], 'number'],
            [['mobile_number'], 'match', 'pattern' => '/^[6-9][0-9]{9}$/'],
            [['password', 'qual_name'], 'string', 'max' => 25],
            [['student_name', 'college_name', 'univ_name'], 'string', 'max' => 100],
            [['gender', 'edu_status'], 'string', 'max' => 1],
            [['document'], 'string', 'max' => 200],
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
            'college_name' => 'College Name',
            'univ_name' => 'Univ Name',
            'allocated_qty' => 'Allocated Qty',
            'target_qty' => 'Target Qty',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
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
