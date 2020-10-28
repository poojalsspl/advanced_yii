<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_parties".
 *
 * @property int $judgment_party_id
 * @property string|null $username
 * @property int|null $judgment_code
 * @property string|null $party_name
 * @property string|null $party_flag
 * @property string|null $appeal_numb
 * @property string $doc_id
 * @property string|null $exam_status
 * @property string|null $work_status
 *
 * @property JudgmentMast $judgmentCode
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
            [['party_name'], 'string'],
            [['party_flag', 'exam_status'], 'string', 'max' => 1],
            [['appeal_numb'], 'string', 'max' => 250],
            [['username'],'string'],
            [['work_status'], 'string', 'max' => 2],
            /*[['judgment_code'], 'exist', 'skipOnError' => true, 'targetClass' => JudgmentMast::className(), 'targetAttribute' => ['judgment_code' => 'judgment_code']],*/
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
            'party_flag' => 'Party Type',
            'appeal_numb' => 'Appeal Numb',
            'doc_id' => 'Doc ID',
            'exam_status' => 'Exam Status',
            'work_status' => 'Work Status',
        ];

       
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJudgmentCode()
    {
        return $this->hasOne(JudgmentMast::className(), ['judgment_code' => 'judgment_code']);
    }
}
