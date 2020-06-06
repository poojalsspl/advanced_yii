<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "degree_mast".
 *
 * @property int|null $degreel_catg_code
 * @property string|null $degree_catg_desc
 * @property int $degree_code
 * @property string|null $degree_desc
 * @property string|null $shrt_desc
 */
class DegreeMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'degree_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['degreel_catg_code', 'degree_code'], 'integer'],
            [['degree_catg_desc'], 'string', 'max' => 50],
            [['degree_desc'], 'string', 'max' => 100],
            [['shrt_desc'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'degreel_catg_code' => 'Degreel Catg Code',
            'degree_catg_desc' => 'Degree Catg Desc',
            'degree_code' => 'Degree Code',
            'degree_desc' => 'Degree Desc',
            'shrt_desc' => 'Shrt Desc',
        ];
    }
}
