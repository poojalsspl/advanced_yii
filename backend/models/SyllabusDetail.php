<?php

namespace backend\models;
use backend\models\SyllabusCatgMast;
use app\models\CourseMast;

use Yii;

/**
 * This is the model class for table "syllabus_detail".
 *
 * @property string|null $course_code
 * @property string|null $course_name
 * @property string|null $syllabus_catg_code
 * @property string|null $syllabus_catg_name
 * @property int|null $tot_count
 * @property int|null $max_marks
 * @property int|null $pass_marks
 * @property int|null $tot_days
 * @property int|null $stage
 */
class SyllabusDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'syllabus_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
            [['tot_count', 'max_marks', 'pass_marks', 'tot_days', 'stage'], 'integer'],
            [['course_code'], 'string', 'max' => 8],
            [['course_name', 'syllabus_catg_name'], 'string', 'max' => 50],
            [['syllabus_catg_code'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'course_code' => 'Course',
            'course_name' => 'Course Name',
            'syllabus_catg_code' => 'Syllabus Category',
            'syllabus_catg_name' => 'Syllabus Catg Name',
            'tot_count' => 'Total Count',
            'max_marks' => 'Max Marks',
            'pass_marks' => 'Pass Marks',
            'tot_days' => 'Total Days',
            'stage' => 'Stage',
        ];
    }

    public function getSyllabusName(){
         return $this->hasOne(SyllabusCatgMast::className(), ['syllabus_catg_code' => 'syllabus_catg_code']);
    }

    public function getCourseName(){
         return $this->hasOne(CourseMast::className(), ['course_code' => 'course_code']);
    }
}
