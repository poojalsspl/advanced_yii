<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "syllabus_detail".
 *
 * @property string $course_code
 * @property string $course_name
 * @property string $syllabus_catg_code
 * @property string $syllabus_catg_name
 * @property int $tot_count
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
            [['tot_count'], 'integer'],
            [['course_code'], 'string', 'max' => 8],
            [['course_name', 'syllabus_catg_name'], 'string', 'max' => 50],
            [['syllabus_catg_code'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'course_code' => 'Course Code',
            'course_name' => 'Course Name',
            'syllabus_catg_code' => 'Syllabus Catg Code',
            'syllabus_catg_name' => 'Syllabus Catg Name',
            'tot_count' => 'Tot Count',
        ];
    }
}
