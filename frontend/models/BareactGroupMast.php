<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bareact_group_mast".
 *
 * @property int $act_group_code
 * @property string|null $act_group_desc
 * @property string|null $short_desc
 * @property int|null $country_code
 * @property string|null $country_name
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
            [['act_group_code'], 'required'],
            [['act_group_code', 'country_code'], 'integer'],
            [['act_group_desc', 'country_name'], 'string', 'max' => 25],
            [['short_desc'], 'string', 'max' => 10],
            [['act_group_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'act_group_code' => 'Act Group Code',
            'act_group_desc' => 'Act Group Description',
            'short_desc' => 'Short Description',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
        ];
    }
}
