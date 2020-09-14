<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bareact_subcatg_mast".
 *
 * @property int $act_sub_catg_code
 * @property string|null $act_sub_catg_desc
 * @property string|null $short_desc
 * @property int|null $act_catg_code
 * @property string|null $act_catg_desc
 * @property int|null $act_group_code
 * @property string|null $act_group_desc
 * @property int|null $country_code
 * @property string|null $country_name
 */
class BareactSubcatgMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bareact_subcatg_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['act_sub_catg_code'], 'required'],
            [['act_sub_catg_code', 'act_catg_code', 'act_group_code', 'country_code'], 'integer'],
            [['act_sub_catg_desc', 'act_catg_desc'], 'string', 'max' => 100],
            [['short_desc'], 'string', 'max' => 15],
            [['act_group_desc', 'country_name'], 'string', 'max' => 25],
            [['act_sub_catg_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'act_sub_catg_code' => 'Act Sub Catg Code',
            'act_sub_catg_desc' => 'Act Sub Catg Desc',
            'short_desc' => 'Short Desc',
            'act_catg_code' => 'Act Catg Code',
            'act_catg_desc' => 'Act Catg Desc',
            'act_group_code' => 'Act Group Code',
            'act_group_desc' => 'Act Group Desc',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
        ];
    }

    public static function getBareactList($id_cat) {
        $out = [];
         $models = BareactSubcatgMast::find()
        ->where('act_catg_code = :act_catg_code')
        ->addParams([':act_catg_code' => $id_cat])
        ->all();
       foreach ($models as $i => $subcatg) {
          //  print_r($state);
       $out[] = ['id' => $subcatg['act_sub_catg_code'], 'name' => $subcatg['act_sub_catg_desc']];
        }
       return $out;
         }
}
