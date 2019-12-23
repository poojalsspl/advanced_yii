<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "judgment_parties".
 *
 * @property int $judgment_party_id
 * @property string $username
 * @property int $judgment_code
 * @property string $party_name
 * @property string $party_flag
 * @property string $doc_id
 * @property string $exam_status
 */
class JudgmentParties extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_parties';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code'], 'integer'],
            [['doc_id'], 'required'],
            [['username', 'party_name'], 'string', 'max' => 50],
            [['party_flag', 'exam_status'], 'string', 'max' => 1],
            [['doc_id'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'judgment_party_id' => 'Judgment Party ID',
            'username' => 'Username',
            'judgment_code' => 'Judgment Code',
            'party_name' => 'Party Name',
            'party_flag' => 'Party Flag',
            'doc_id' => 'Doc ID',
            'exam_status' => 'Exam Status',
        ];
    }
}
