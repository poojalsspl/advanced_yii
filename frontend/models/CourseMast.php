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
            [['course_code', 'course_duration_unit'], 'string', 'max' => 8],
            [['course_name',  'course_eligibility'], 'string', 'max' => 50]
        ];
    }  

    public function getCourseName($course){
        $query = (new \yii\db\Query())
        ->select('course_name')
        ->from('course_mast')
        ->where('course_code=:course_code', [':course_code' => $course]);

        $command = $query->createCommand();


        // Execute the command:
        $rows = $command->queryAll();
        ;
         return $rows[0]['course_name'];
     } 
}





