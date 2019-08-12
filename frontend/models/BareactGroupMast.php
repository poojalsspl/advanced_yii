<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bareact_group_mast".
 *
 * @property int $act_group_code
 * @property string $act_group_desc
 * @property string $short_desc
 * @property int $country_code
 * @property string $country_name
 */
class BareactGroupMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bareact_group_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['act_group_code', 'country_code'], 'integer'],
            [['act_group_desc', 'country_name'], 'string', 'max' => 25],
            [['short_desc'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'act_group_code' => 'Act Group Code',
            'act_group_desc' => 'Act Group Desc',
            'short_desc' => 'Short Desc',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
        ];
    }
}
