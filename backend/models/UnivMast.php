<?php

namespace backend\models;
use frontend\models\CountryMast;
use frontend\models\StateMast;
use frontend\models\CityMast;

use Yii;

/**
 * This is the model class for table "univ_mast".
 *
 * @property int $univ_code
 * @property string $univ_name
 * @property int $city_code
 * @property int $state_code
 * @property int $country_code
 * @property string $univ_desc
 * @property string $univ_type
 * @property string $univ_status
 */
class UnivMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'univ_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['univ_name', 'city_code', 'state_code', 'country_code', 'univ_desc', 'univ_type', 'univ_status'], 'required'],
            [['city_code', 'state_code', 'country_code'], 'integer'],
            [['univ_desc'], 'string'],
            [['univ_name'], 'string', 'max' => 100],
            [['univ_type', 'univ_status'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'univ_code' => 'Univ Code',
            'univ_name' => 'Univ Name',
            'city_code' => 'City',
            'state_code' => 'State',
            'country_code' => 'Country',
            'univ_desc' => 'Univ Desc',
            'univ_type' => 'Univ Type',
            'univ_status' => 'Univ Status',
        ];
    }

    public function getCountry()
  {
      return $this->hasOne(CountryMast::className(), ['country_code' => 'country_code']);
  }

      public function getState()
  {
      return $this->hasOne(StateMast::className(), ['state_code' => 'state_code']);
  }

      public function getCity()
  {
      return $this->hasOne(CityMast::className(), ['city_code' => 'city_code']);
  }
}
