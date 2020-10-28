<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "judgment_advocate".
 *
 * @property int $id
 * @property string $username
 * @property int $judgment_code
 * @property string $advocate_name
 * @property string $advocate_flag
 * @property string $doc_id
 * @property string $exam_status
 */
class JudgmentAdvocate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_advocate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code'], 'integer'],
            [['username', 'advocate_name'], 'string', 'max' => 50],
            [['advocate_flag', 'exam_status'], 'string', 'max' => 1],
            [['doc_id'], 'string', 'max' => 40],
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
            'advocate_name' => 'Advocate Name',
            'advocate_flag' => 'Advocate Flag',
            'doc_id' => 'Doc ID',
            'exam_status' => 'Exam Status',
        ];
    }
}
