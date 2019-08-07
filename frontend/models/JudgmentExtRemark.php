<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_ext_remark".
 *
 * @property int $judgment_code
 * @property string $judgment_remark
 *
 * @property JudgmentMast $judgmentCode
 */
class JudgmentExtRemark extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_ext_remark';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code'], 'required'],
            [['judgment_code'], 'integer'],
            [['judgment_remark'], 'string'],
            [['judgment_code'], 'unique'],
            [['judgment_code'], 'exist', 'skipOnError' => true, 'targetClass' => JudgmentMast::className(), 'targetAttribute' => ['judgment_code' => 'judgment_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'judgment_code' => 'Judgment Code',
            'judgment_remark' => 'Judgment Remark',
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
