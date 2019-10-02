<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "city_mast".
 *
 * @property int $city_code
 * @property string $city_name
 * @property string $shrt_name
 * @property int $state_code
 * @property string $state_name
 * @property string $state_shrt_name
 * @property int $country_code
 * @property string $country_name
 * @property string $country_shrt_name
 * @property string $court_stat
 *
 * @property CountryMast $countryCode
 * @property StateMast $stateCode
 * @property CourtMast[] $courtMasts
 */
class CityMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state_code', 'country_code'], 'integer'],
            [['city_name'], 'string', 'max' => 50],
            [['shrt_name', 'state_shrt_name', 'country_shrt_name'], 'string', 'max' => 10],
            [['state_name', 'country_name'], 'string', 'max' => 25],
            [['court_stat'], 'string', 'max' => 3],
            [['country_code'], 'exist', 'skipOnError' => true, 'targetClass' => CountryMast::className(), 'targetAttribute' => ['country_code' => 'country_code']],
            [['state_code'], 'exist', 'skipOnError' => true, 'targetClass' => StateMast::className(), 'targetAttribute' => ['state_code' => 'state_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'city_code' => 'City Code',
            'city_name' => 'City Name',
            'shrt_name' => 'Shrt Name',
            'state_code' => 'State Code',
            'state_name' => 'State Name',
            'state_shrt_name' => 'State Shrt Name',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'country_shrt_name' => 'Country Shrt Name',
            'court_stat' => 'Court Stat',
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
    public function getCourtMasts()
    {
        return $this->hasMany(CourtMast::className(), ['city_code' => 'city_code']);
    }

    
    /*public function getCityName($id){
        $query = (new \yii\db\Query())
        ->select('city_name')
        ->from('city_mast')
        ->where('city_code=:city_code', [':city_code' => $id]);

        $command = $query->createCommand();

        // Execute the command:
        $rows = $command->queryAll();
         return $rows[0]['city_name'];
     }*/
     //addded for fetching city list on registration form
     public static function getCityList($id) {
        $out = [];
         $models = CityMast::find()
        ->where('state_code = :state_code')
        ->addParams([':state_code' => $id])
        ->all();
       foreach ($models as $i => $city) {
          //  print_r($state);
       $out[] = ['id' => $city['city_code'], 'name' => $city['city_name']];
        }
       return $out;
      }
}
