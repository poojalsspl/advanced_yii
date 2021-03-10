<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_survey".
 *
 * @property int $u_id
 * @property int $std_id
 * @property int $adv_id
 * @property int|null $survey_id
 * @property int $sno
 * @property int|null $catg_code
 * @property int|null $question_id
 * @property string|null $question_name
 * @property string|null $answer
 */
class UserSurvey extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_survey';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['u_id', 'std_id', 'adv_id'], 'required'],
            [['u_id', 'std_id', 'adv_id', 'survey_id', 'sno', 'catg_code', 'question_id'], 'integer'],
            [['answer'], 'string', 'max' => 200],
            [['question_name'], 'string', 'max' => 100],
            [['u_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'std_id' => 'Std ID',
            'adv_id' => 'Adv ID',
            'survey_id' => 'Survey ID',
            'sno' => 'Serial Number',
            'catg_code' => 'Catg Code',
            'question_id' => 'Question ID',
            'question_name' => 'Question',
            'answer' => 'Answer',
        ];
    }
}
