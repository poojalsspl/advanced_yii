<?php
namespace app\models;
 
use Yii;
 
class CourseMast extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    

    public static function tableName()
    {
        return 'course_mast';
    }


     
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_duration', 'course_fees', 'tot_student', 'tot_completed', 'tot_ongoing'], 'integer'],
            [['course_intro', 'course_objective', 'course_syllabus', 'course_content', 'course_summary', 'course_marking'], 'string'],
            [['course_code'], 'string', 'max' => 8],
            [['course_name', 'course_level_name', 'course_eligibility'], 'string', 'max' => 50]
        ];
    }   
}





