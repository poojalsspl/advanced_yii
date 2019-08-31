<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property string $student_code
 * @property int $userid
 * @property string $student_name
 * @property string $college_code
 * @property string $college_name
 * @property string $course_code
 * @property string $course_name
 * @property int $course_fees
 * @property string $start_date
 * @property string $end_date
 * @property string $course_status
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
            [['userid', 'course_fees'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['student_code', 'college_code'], 'string', 'max' => 4],
            [['student_name', 'college_name', 'course_name'], 'string', 'max' => 50],
            [['course_code'], 'string', 'max' => 7],
            [['course_status'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'student_code' => 'Student Code',
            'userid' => 'Userid',
            'student_name' => 'Student Name',
            'college_code' => 'College Code',
            'college_name' => 'College Name',
            'course_code' => 'Course Code',
            'course_name' => 'Course Name',
            'course_fees' => 'Course Fees',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'course_status' => 'Course Status',
        ];
    }
}
