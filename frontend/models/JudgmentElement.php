<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_element".
 *
 * @property int $id
 * @property int $judgment_code
 * @property string $element_code
 * @property string $element_name
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
            [['username'], 'string', 'max' => 50],
            [['doc_id'], 'string', 'max' => 40],
            [['element_code'], 'string', 'max' => 2],
            [['element_name'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'judgment_code' => 'Judgment Code',
            'doc_id' => 'Doc ID',
            'element_code' => 'Element Code',
            'element_name' => 'Element Name',
            'element_text' => 'Element Text',
            'weight_perc' =>  'Weightage %',
            'element_word_length' => 'Element Word Length',
        ];
    }
}
