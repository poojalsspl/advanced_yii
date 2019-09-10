<?php
namespace frontend\models;

use yii;

class Parcel extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'parcel';
    }
    
    public function rules()
    {
        return [
            [['code', 'height', 'width', 'depth'], 'required'],
            [['product_id', 'height', 'width', 'depth'], 'integer'],
            [['code'], 'string', 'max' => 255],
            [['product_id'], 'exist', 
              'skipOnError' => true, 
              'targetClass' => Product::className(), 
              'targetAttribute' => ['product_id' => 'id']]
        ];
    }
    
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}