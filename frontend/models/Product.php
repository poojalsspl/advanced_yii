<?php
namespace frontend\models;


use Yii;

class Product extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }
    
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }
    
    public function getParcels()
    {
        return $this->hasMany(Parcel::className(), ['product_id' => 'id']);
    }
}
