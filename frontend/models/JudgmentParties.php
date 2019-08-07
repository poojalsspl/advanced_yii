<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_parties".
 *
 * @property int $judgment_party_id
 * @property int $judgment_code
 * @property string $party_name
 * @property string $party_flag
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
            [['party_name'], 'string', 'max' => 50],
            [['party_flag'], 'string', 'max' => 1],
            [['judgment_code'], 'exist', 'skipOnError' => true, 'targetClass' => JudgmentMast::className(), 'targetAttribute' => ['judgment_code' => 'judgment_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'judgment_party_id' => 'Judgment Party ID',
            'judgment_code' => 'Judgment Code',
            'party_name' => 'Party Name',
            'party_flag' => 'Party Flag',
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
