<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "country_mast".
 *
 * @property int $country_code
 * @property string|null $country_name
 * @property string $shrt_name
 * @property string $crdt
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
            [['shrt_name'], 'required'],
            [['crdt'], 'safe'],
            [['country_name'], 'string', 'max' => 25],
            [['shrt_name'], 'string', 'max' => 10],
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
            'crdt' => 'Crdt',
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
