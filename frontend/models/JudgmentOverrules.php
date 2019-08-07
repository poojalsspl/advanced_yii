<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_overrules".
 *
 * @property int $id
 * @property int $judgment_code
 * @property int $over_rules_code
 * @property string $over_rules_title
 *
 * @property JudgmentMast $judgmentCode
 */
class JudgmentOverrules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_overrules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code', 'over_rules_code'], 'required'],
            [['judgment_code', 'over_rules_code'], 'integer'],
            [['over_rules_title'], 'string', 'max' => 255],
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
            'over_rules_code' => 'Over Rules Code',
            'over_rules_title' => 'Over Rules Title',
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
