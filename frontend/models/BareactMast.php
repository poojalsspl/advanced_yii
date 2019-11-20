<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bareact_mast".
 *
 * @property int $id
 * @property int $doc_id
 * @property string $bareact_code
 * @property string $bareact_desc
 * @property int $act_group_code
 * @property string $act_group_desc
 * @property int $act_catg_code
 * @property string $act_catg_desc
 * @property string $act_status
 * @property string $enact_date
 * @property string $ref_doc_id
 * @property int $act_sub_catg_code
 * @property string $act_sub_catg_desc
 * @property int $tot_section
 * @property int $tot_chap
 * @property int $country_code
 * @property string $country_name
 */
class BareactMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bareact_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'doc_id', 'act_group_code', 'act_catg_code', 'act_sub_catg_code', 'tot_section', 'tot_chap', 'country_code'], 'integer'],
            [['doc_id', 'bareact_code'], 'required'],
            [['enact_date'], 'safe'],
            [['bareact_code', 'ref_doc_id'], 'string', 'max' => 10],
            [['bareact_desc'], 'string', 'max' => 255],
            [['act_group_desc', 'act_status', 'country_name'], 'string', 'max' => 25],
            [['act_catg_desc', 'act_sub_catg_desc'], 'string', 'max' => 100],
            [['bareact_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doc_id' => 'Doc ID',
            'bareact_code' => 'Bareact Code',
            'bareact_desc' => 'Bareact Description',
            'act_group_code' => 'Act Group Code',
            'act_group_desc' => 'Act Group Desc',
            'act_catg_code' => 'Act Catg Code',
            'act_catg_desc' => 'Act Catg Desc',
            'act_status' => 'Act Status',
            'enact_date' => 'Enact Date',
            'ref_doc_id' => 'Ref Doc ID',
            'act_sub_catg_code' => 'Act Sub Catg Code',
            'act_sub_catg_desc' => 'Act Sub Catg Desc',
            'tot_section' => 'Tot Section',
            'tot_chap' => 'Tot Chap',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
        ];
    }

    public function getBareactName($bareact){
        
        $query = (new \yii\db\Query())
        ->select('bareact_desc')
        ->from('bareact_mast')
        ->where('bareact_code=:bareact_code', [':bareact_code' => $bareact]);
        $command = $query->createCommand();
        // Execute the command:
        $rows = $command->queryAll();
         return $rows[0]['bareact_desc'];
     }

     public function getBareactName1($bareact){
        
        $query = (new \yii\db\Query())
        ->select('bareact_desc')
        ->from('bareact_mast')
        ->where('bareact_code=:bareact_code', [':bareact_code' => $bareact]);
        $command = $query->createCommand();
        // Execute the command:
        $rows = $command->queryAll();
         return $rows[0]['bareact_desc'];
     }

    


}
