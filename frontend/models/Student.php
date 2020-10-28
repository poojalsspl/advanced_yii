<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int|null $userid
 * @property string|null $student_name
 * @property string|null $college_code
 * @property string|null $college_name
 * @property string|null $course_code
 * @property string|null $course_name
 * @property int|null $course_fees
 * @property string|null $course_status
 * @property string $enrol_no
 * @property int|null $semester
 * @property string|null $regs_date
 * @property string|null $completion_date
 * @property string|null $result_date
 * @property string|null $cert_delvdate
 * @property string|null $dob
 * @property string|null $gender
 * @property string $profile_pic
 * @property int|null $city_code
 * @property int|null $state_code
 * @property int|null $country_code
 * @property int|null $pincode
 * @property string|null $mobile
 * @property string|null $email
 * @property string|null $qual_desc
 * @property string|null $address
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'course_fees', 'semester', 'city_code', 'state_code', 'country_code', 'pincode'], 'integer'],
            [['enrol_no','profile_pic'], 'required'],
            [['regs_date', 'completion_date', 'result_date', 'cert_delvdate', 'dob'], 'safe'],
            [['address'], 'string'],
            [['student_name', 'college_name', 'course_name', 'email'], 'string', 'max' => 50],
            [['college_code'], 'string', 'max' => 8],
            [['course_code'], 'string', 'max' => 8],
            [['college_code','course_code','country_code','state_code','city_code'], 'required'],
            [['course_status'], 'string', 'max' => 20],
            [['enrol_no'], 'string', 'max' => 11],
            [['gender'], 'string', 'max' => 1],
            [['mobile'], 'string', 'max' => 12],
            [['profile_pic', 'qual_desc'], 'string', 'max' => 100],
            [['profile_pic'], 'file', 'extensions' => 'jpg, jpeg, png',],
            [['enrol_no'], 'unique'],
        ];
    }

   

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'student_name' => 'Student Name',
            'college_code' => 'College',
            'college_name' => 'College Name',
            'course_code' => 'Course Code',
            'course_name' => 'Course Name',
            'course_fees' => 'Course Fees',
            'course_status' => 'Course Status',
            'enrol_no' => 'Enrol No',
            'semester' => 'Semester',
            'regs_date' => 'Regs Date',
            'completion_date' => 'Completion Date',
            'result_date' => 'Result Date',
            'cert_delvdate' => 'Cert Delvdate',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'profile_pic' => 'Profile Pic',
            'city_code' => 'City Code',
            'state_code' => 'State Code',
            'country_code' => 'Country Code',
            'pincode' => 'Pincode',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'qual_desc' => 'Qualification Description',
            'address' => 'Address',
        ];

    }

      public function getCourseMast()
    {
      return $this->hasOne(CourseMast::className(), ['course_code' => 'course_code']);
    }

}
