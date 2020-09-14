<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bareact_catg_mast".
 *
 * @property int $act_catg_code
 * @property string $act_catg_desc
 * @property string $short_desc
 * @property int $act_group_code
 * @property int $country_code
 * @property string $country_name
 */
class BareactCatgMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bareact_catg_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['act_catg_code'], 'required'],
            [['act_catg_code', 'act_group_code', 'country_code'], 'integer'],
            [['act_catg_desc'], 'string', 'max' => 100],
            [['short_desc'], 'string', 'max' => 10],
            [['country_name'], 'string', 'max' => 25],
            [['act_catg_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'act_catg_code' => 'Act Catg Code',
            'act_catg_desc' => 'Act Catg Desc',
            'short_desc' => 'Short Desc',
            'act_group_code' => 'Act Group Code',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
        ];
    }

    public function getCatglist(){
     $query = (new \yii\db\Query())
        ->select('act_catg_code ,act_catg_desc')
        ->from('bareact_catg_mast')
        ->orderBy('act_catg_desc');
        
      
         $command = $query->createCommand();
         $rows = $command->queryAll();
       if($rows){
        return $rows;
    }       
    }

     public function getSubcatglist()
    {
        return $this->hasMany(BareactSubcatgMast::className(), ['act_catg_code' => 'act_catg_code']);
    }
}
