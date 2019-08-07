<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_advocate".
 *
 * @property int $id
 * @property int $judgment_code
 * @property string $advocate_name
 * @property string $advocate_flag
 * @property string $doc_id
 *
 * @property JudgmentMast $judgmentCode
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
            [['advocate_name'], 'string', 'max' => 50],
            [['advocate_flag'], 'string', 'max' => 1],
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
            'advocate_name' => 'Advocate Name',
            'advocate_flag' => 'Advocate Flag',
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
