<?php

namespace backend\models;
use frontend\models\CountryMast;
use frontend\models\StateMast;
use frontend\models\CityMast;
use backend\models\UnivMast;

use Yii;

/**
 * This is the model class for table "college_mast".
 *
 * @property int $college_code
 * @property string|null $college_name
 * @property int|null $univ_code
 * @property string|null $univ_name
 * @property int|null $estd_yr
 * @property string|null $college_desc
 * @property string|null $college_logo
 * @property string|null $sponsor
 * @property string|null $startdate
 * @property string|null $enddate
 * @property string|null $address
 * @property int|null $zipcode
 * @property string|null $email
 * @property string|null $website
 * @property string|null $fax
 * @property string|null $tele
 * @property string|null $mobile
 * @property string|null $country_name
 * @property int|null $country_code
 * @property string|null $state_name
 * @property int|null $state_code
 * @property string|null $city_name
 * @property int|null $city_code
 * @property string|null $prospectus
 * @property int|null $total_students
 */
class CollegeMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'college_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['univ_code', 'estd_yr', 'zipcode', 'country_code', 'state_code', 'city_code', 'total_students'], 'integer'],
            [['college_desc'], 'string'],
            [['startdate', 'enddate'], 'safe'],
            [['college_name', 'univ_name', 'college_logo', 'email'], 'string', 'max' => 100],
            [['sponsor'], 'string', 'max' => 1],
            [['address'], 'string', 'max' => 1000],
            [['website', 'city_name'], 'string', 'max' => 50],
            [['fax', 'tele'], 'string', 'max' => 20],
            [['mobile'], 'string', 'max' => 15],
            [['country_name', 'state_name'], 'string', 'max' => 25],
            [['prospectus'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'college_code' => 'College Code',
            'college_name' => 'College Name',
            'univ_code' => 'Univ Code',
            'univ_name' => 'Univ Name',
            'estd_yr' => 'Estd Yr',
            'college_desc' => 'College Desc',
            'college_logo' => 'College Logo',
            'sponsor' => 'Sponsor',
            'startdate' => 'Startdate',
            'enddate' => 'Enddate',
            'address' => 'Address',
            'zipcode' => 'Zipcode',
            'email' => 'Email',
            'website' => 'Website',
            'fax' => 'Fax',
            'tele' => 'Tele',
            'mobile' => 'Mobile',
            'country_name' => 'Country Name',
            'country_code' => 'Country Code',
            'state_name' => 'State Name',
            'state_code' => 'State Code',
            'city_name' => 'City Name',
            'city_code' => 'City Code',
            'prospectus' => 'Prospectus',
            'total_students' => 'Total Students',
        ];
    }

    public function getUnivName()
    {
        return $this->hasOne(UnivMast::className(), ['univ_code' => 'univ_code']);
    }
    public function getCountryName()
    {
        return $this->hasOne(CountryMast::className(), ['country_code' => 'country_code']);
    }
     public function getStateName()
    {
      return $this->hasOne(StateMast::className(), ['state_code' => 'state_code']);
    }
      public function getCityName()
    {
      return $this->hasOne(CityMast::className(), ['city_code' => 'city_code']);
    } 
}
