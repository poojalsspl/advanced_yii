<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_element".
 *
 * @property int $judgment_code
 * @property string $element_code
 * @property string $element_text
 * @property int $weight_perc
 * @property int $element_word_length
 */
class JudgmentElement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_element';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code', 'weight_perc', 'element_word_length'], 'integer'],
            [['element_text'], 'string'],
            [['weight_perc'], 'required'],
            [['element_code'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'judgment_code' => 'Judgment Code',
            'element_code' => 'Element Code',
            'element_text' => 'Element Text',
            'weight_perc' => 'Weight Perc',
            'element_word_length' => 'Element Word Length',
        ];
    }
}
