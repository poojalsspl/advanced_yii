<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "question_answer".
 *
 * @property int|null $catg_code
 * @property int|null $question_id
 * @property string|null $question_name
 * @property string|null $answer
 * @property int|null $type_id
 * @property int|null $option_id
 */
class QuestionAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catg_code', 'question_id', 'type_id', 'option_id'], 'integer'],
            [['question_name'], 'string', 'max' => 200],
            [['answer'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'catg_code' => 'Catg Code',
            'question_id' => 'Question ID',
            'question_name' => 'Question Name',
            'answer' => 'Answer',
            'type_id' => 'Type ID',
            'option_id' => 'Option ID',
        ];
    }
}
