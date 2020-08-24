<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "state_mast".
 *
 * @property int $state_code
 * @property string|null $state_name
 * @property string|null $shrt_name
 * @property string|null $zone
 * @property int $country_code
 * @property string $crdt
 * @property int|null $population
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
            [['country_code'], 'required'],
            [['country_code'], 'integer'],
            [['crdt'], 'safe'],
            [['state_name'], 'string', 'max' => 25],
            [['shrt_name'], 'string', 'max' => 10],
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
            'crdt' => 'Crdt',
            
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

     //addded for fetching state list on registration form
 public static function getSubCatList($id_cat) {
        $out = [];
         $models = StateMast::find()
        ->where('country_code = :country_code')
        ->addParams([':country_code' => $id_cat])
        ->all();
       foreach ($models as $i => $state) {
          //  print_r($state);
       $out[] = ['id' => $state['state_code'], 'name' => $state['state_name']];
        }
       return $out;
         }
}
