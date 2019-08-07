<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "country_mast".
 *
 * @property int $country_code
 * @property string $country_name
 * @property string $shrt_name
 * @property int $court_group_code
 *
 * @property CityMast[] $cityMasts
 * @property CourtMast[] $courtMasts
 * @property StateMast[] $stateMasts
 */
class CountryMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['court_group_code'], 'integer'],
            [['country_name'], 'string', 'max' => 25],
            [['shrt_name'], 'string', 'max' => 10],
            [['country_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'shrt_name' => 'Shrt Name',
            'court_group_code' => 'Court Group Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityMasts()
    {
        return $this->hasMany(CityMast::className(), ['country_code' => 'country_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourtMasts()
    {
        return $this->hasMany(CourtMast::className(), ['country_code' => 'country_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStateMasts()
    {
        return $this->hasMany(StateMast::className(), ['country_code' => 'country_code']);
    }
}
