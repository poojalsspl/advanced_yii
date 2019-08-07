<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_judge".
 *
 * @property int $id
 * @property int $judgment_code
 * @property string $judge_name
 * @property string $doc_id
 *
 * @property JudgmentMast $judgmentCode
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
            [['judge_name'], 'string', 'max' => 50],
            [['doc_id'], 'string', 'max' => 40],
            [['judgment_code'], 'exist', 'skipOnError' => true, 'targetClass' => JudgmentMast::className(), 'targetAttribute' => ['judgment_code' => 'judgment_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judgment_code' => 'Judgment Code',
            'judge_name' => 'Judge Name',
            'doc_id' => 'Doc ID',
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
