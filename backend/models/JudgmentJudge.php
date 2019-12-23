<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "judgment_judge".
 *
 * @property int $id
 * @property string $username
 * @property int $judgment_code
 * @property string $judge_name
 * @property string $doc_id
 * @property string $exam_status
 */
class JudgmentJudge extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_judge';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code'], 'integer'],
            [['username', 'judge_name'], 'string', 'max' => 50],
            [['doc_id'], 'string', 'max' => 40],
            [['exam_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'judgment_code' => 'Judgment Code',
            'judge_name' => 'Judge Name',
            'doc_id' => 'Doc ID',
            'exam_status' => 'Exam Status',
        ];
    }
}
