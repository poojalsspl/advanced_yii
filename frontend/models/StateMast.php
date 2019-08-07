<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "state_mast".
 *
 * @property int $state_code
 * @property string $state_name
 * @property string $shrt_name
 * @property string $zone
 * @property int $country_code
 * @property string $country_name
 * @property string $country_shrt_name
 * @property string $cr_date
 * @property int $status
 *
 * @property CityMast[] $cityMasts
 * @property CourtMast[] $courtMasts
 * @property CountryMast $countryCode
 */
class StateMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'state_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code', 'status'], 'integer'],
            [['cr_date'], 'safe'],
            [['state_name', 'country_name'], 'string', 'max' => 25],
            [['shrt_name', 'country_shrt_name'], 'string', 'max' => 10],
            [['zone'], 'string', 'max' => 3],
            [['country_code'], 'exist', 'skipOnError' => true, 'targetClass' => CountryMast::className(), 'targetAttribute' => ['country_code' => 'country_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'state_code' => 'State Code',
            'state_name' => 'State Name',
            'shrt_name' => 'Shrt Name',
            'zone' => 'Zone',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'country_shrt_name' => 'Country Shrt Name',
            'cr_date' => 'Cr Date',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityMasts()
    {
        return $this->hasMany(CityMast::className(), ['state_code' => 'state_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourtMasts()
    {
        return $this->hasMany(CourtMast::className(), ['state_code' => 'state_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountryCode()
    {
        return $this->hasOne(CountryMast::className(), ['country_code' => 'country_code']);
    }
}
