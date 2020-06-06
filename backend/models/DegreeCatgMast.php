<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "degree_catg_mast".
 *
 * @property int|null $degree_catg_code
 * @property string|null $degree_catg_desc
 * @property string $shrt_desc
 */
class DegreeCatgMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'degree_catg_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['degree_catg_code'], 'integer'],
            [['shrt_desc'], 'required'],
            [['degree_catg_desc'], 'string', 'max' => 50],
            [['shrt_desc'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'degree_catg_code' => 'Degree Catg Code',
            'degree_catg_desc' => 'Degree Catg Desc',
            'shrt_desc' => 'Shrt Desc',
        ];
    }
}
