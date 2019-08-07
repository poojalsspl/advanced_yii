<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_cited_by".
 *
 * @property int $id
 * @property int $judgment_code
 * @property string $judgment_source_code
 * @property int $judgment_code_ref
 * @property string $judgment_source_code_ref
 * @property string $judgment_title_ref
 *
 * @property JudgmentMast $judgmentCode
 */
class JudgmentCitedBy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_cited_by';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code', 'judgment_code_ref'], 'integer'],
            [['judgment_source_code', 'judgment_source_code_ref', 'judgment_title_ref'], 'required'],
            [['judgment_source_code', 'judgment_source_code_ref'], 'string', 'max' => 40],
            [['judgment_title_ref'], 'string', 'max' => 255],
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
            'judgment_source_code' => 'Judgment Source Code',
            'judgment_code_ref' => 'Judgment Code Ref',
            'judgment_source_code_ref' => 'Judgment Source Code Ref',
            'judgment_title_ref' => 'Judgment Title Ref',
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
