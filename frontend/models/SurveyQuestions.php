<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "survey_questions".
 *
 * @property int|null $survey_id
 * @property string|null $survey_name
 * @property int $sno
 * @property int|null $catg_code
 * @property int|null $question_id
 * @property string $question_name
 * @property string|null $answer
 * @property int|null $type_id
 * @property int|null $option_id
 */
class SurveyQuestions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survey_questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['survey_id', 'sno', 'catg_code', 'question_id', 'type_id', 'option_id'], 'integer'],
            [['question_name'], 'required'],
            [['survey_name', 'question_name'], 'string', 'max' => 200],
            [['answer'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'survey_id' => 'Survey ID',
            'survey_name' => 'Survey Name',
            'sno' => 'Serial Number',
            'catg_code' => 'Catg Code',
            'question_id' => 'Question ID',
            'question_name' => 'Question Name',
            'answer' => 'Answer',
            'type_id' => 'Type ID',
            'option_id' => 'Option ID',
        ];
    }
}
