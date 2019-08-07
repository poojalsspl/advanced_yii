<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_overruledby".
 *
 * @property int $id
 * @property int $judgment_code
 * @property int $over_ruledby_code
 * @property string $over_ruledby_title
 *
 * @property JudgmentMast $judgmentCode
 */
class JudgmentOverruledby extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_overruledby';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code', 'over_ruledby_code'], 'required'],
            [['judgment_code', 'over_ruledby_code'], 'integer'],
            [['over_ruledby_title'], 'string', 'max' => 255],
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
            'over_ruledby_code' => 'Over Ruledby Code',
            'over_ruledby_title' => 'Over Ruledby Title',
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
