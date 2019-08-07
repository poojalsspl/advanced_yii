<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "court_mast".
 *
 * @property int $court_code
 * @property string $court_name
 * @property string $court_shrt_name
 * @property string $court_type
 * @property string $bench_status
 * @property string $court_status
 * @property int $city_code
 * @property string $city_name
 * @property int $state_code
 * @property string $state_name
 * @property int $country_code
 * @property string $country_name
 * @property string $court_remark
 * @property string $court_address
 * @property int $bench_code
 * @property string $court_type_shrt_name
 * @property int $court_group_code
 * @property string $court_group_name
 * @property string $court_type_name
 * @property string $bench_name
 * @property string $court_flag
 *
 * @property CountryMast $countryCode
 * @property StateMast $stateCode
 * @property CityMast $cityCode
 */
class CourtMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'court_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['court_code'], 'required'],
            [['court_code', 'city_code', 'state_code', 'country_code', 'court_group_code'], 'integer'],
            [['court_name', 'court_remark', 'bench_name'], 'string', 'max' => 100],
            [['court_shrt_name', 'court_status', 'court_group_name', 'court_type_name'], 'string', 'max' => 20],
            [['court_type'], 'string', 'max' => 2],
            [['bench_status', 'court_flag'], 'string', 'max' => 1],
            [['city_name'], 'string', 'max' => 50],
            [['state_name', 'country_name'], 'string', 'max' => 25],
            [['court_address'], 'string', 'max' => 500],
            [['court_type_shrt_name'], 'string', 'max' => 10],
            [['country_code'], 'exist', 'skipOnError' => true, 'targetClass' => CountryMast::className(), 'targetAttribute' => ['country_code' => 'country_code']],
            [['state_code'], 'exist', 'skipOnError' => true, 'targetClass' => StateMast::className(), 'targetAttribute' => ['state_code' => 'state_code']],
            [['city_code'], 'exist', 'skipOnError' => true, 'targetClass' => CityMast::className(), 'targetAttribute' => ['city_code' => 'city_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'court_code' => 'Court Code',
            'court_name' => 'Court Name',
            'court_shrt_name' => 'Court Shrt Name',
            'court_type' => 'Court Type',
            'bench_status' => 'Bench Status',
            'court_status' => 'Court Status',
            'city_code' => 'City Code',
            'city_name' => 'City Name',
            'state_code' => 'State Code',
            'state_name' => 'State Name',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'court_remark' => 'Court Remark',
            'court_address' => 'Court Address',
            'bench_code' => 'Bench Code',
            'court_type_shrt_name' => 'Court Type Shrt Name',
            'court_group_code' => 'Court Group Code',
            'court_group_name' => 'Court Group Name',
            'court_type_name' => 'Court Type Name',
            'bench_name' => 'Bench Name',
            'court_flag' => 'Court Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountryCode()
    {
        return $this->hasOne(CountryMast::className(), ['country_code' => 'country_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStateCode()
    {
        return $this->hasOne(StateMast::className(), ['state_code' => 'state_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityCode()
    {
        return $this->hasOne(CityMast::className(), ['city_code' => 'city_code']);
    }
}
