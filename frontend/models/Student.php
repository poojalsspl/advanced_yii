<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $userid
 * @property string $student_name
 * @property string $college_code
 * @property string $college_name
 * @property string $course_code
 * @property string $course_name
 * @property int $course_fees
 * @property string $course_status
 * @property string $enrol_no
 * @property string $regs_date
 * @property string $completion_date
 * @property string $dob
 * @property string $gender
 * @property int $city_code
 * @property int $state_code
 * @property int $country_code
 * @property string $mobile
 * @property string $email
 * @property string $qual_desc
 * @property string $photo_url
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
            [['userid', 'course_fees', 'city_code', 'state_code', 'country_code'], 'integer'],
            [['enrol_no'], 'required'],
            [['regs_date', 'completion_date', 'dob'], 'safe'],
            [['student_name', 'college_name', 'course_name', 'email'], 'string', 'max' => 50],
            [['college_code'], 'string', 'max' => 4],
            [['course_code'], 'string', 'max' => 8],
            [['college_code','course_code','country_code','state_code','city_code'], 'required'],
            [['course_status'], 'string', 'max' => 20],
            [['enrol_no'], 'string', 'max' => 11],
            [['gender'], 'string', 'max' => 1],
            [['mobile'], 'string', 'max' => 12],
            [['qual_desc'], 'string', 'max' => 100],
           
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
            'college_code' => 'College Code',
            'college_name' => 'College Name',
            'course_code' => 'Course Code',
            'course_name' => 'Course Name',
            'course_fees' => 'Course Fees',
            'course_status' => 'Course Status',
            'enrol_no' => 'Enrol No',
            'regs_date' => 'Regs Date',
            'completion_date' => 'Completion Date',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'city_code' => 'City Code',
            'state_code' => 'State Code',
            'country_code' => 'Country Code',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'qual_desc' => 'Qualification Description',
           
        ];
    }
}
