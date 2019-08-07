<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_disposition".
 *
 * @property int $disposition_id
 * @property string $disposition_text
 */
class JudgmentDisposition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_disposition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['disposition_id'], 'required'],
            [['disposition_id'], 'integer'],
            [['disposition_text'], 'string', 'max' => 255],
            [['disposition_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'disposition_id' => 'Disposition ID',
            'disposition_text' => 'Disposition Text',
        ];
    }
}
