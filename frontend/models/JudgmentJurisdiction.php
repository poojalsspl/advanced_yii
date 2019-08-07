<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_jurisdiction".
 *
 * @property int $judgment_jurisdiction_id
 * @property string $judgment_jurisdiction_text
 */
class JudgmentJurisdiction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_jurisdiction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_jurisdiction_id'], 'required'],
            [['judgment_jurisdiction_id'], 'integer'],
            [['judgment_jurisdiction_text'], 'string', 'max' => 255],
            [['judgment_jurisdiction_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'judgment_jurisdiction_id' => 'Judgment Jurisdiction ID',
            'judgment_jurisdiction_text' => 'Judgment Jurisdiction Text',
        ];
    }
}
