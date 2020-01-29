<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_data_point".
 *
 * @property int $id
 * @property int $judgment_code
 * @property int $element_code
 * @property string $element_name
 * @property string $data_point
 */
class JudgmentDataPoint extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_data_point';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code', 'element_code'], 'integer'],
            [['element_name', 'data_point'], 'required'],
            [['element_name'], 'string', 'max' => 25],
            [['data_point'], 'string', 'max' => 15],
            [['weight_perc'], 'string', 'max' => 6],
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
            'element_code' => 'Judgment Element Code',
            'element_name' => 'Element Name',
            'data_point' => 'Data Point Name',
            'weight_perc' => 'DataPoint Value in %',

        ];
    }
}
