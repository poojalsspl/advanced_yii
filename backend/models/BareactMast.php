<?php

namespace backend\models;
use frontend\models\BareactGroupMast;
use frontend\models\BareactSubcatgMast;

use Yii;

/**
 * This is the model class for table "bareact_mast".
 *
 * @property integer $bareact_id
 * @property integer $old_bareact_id
 * @property integer $source_act_id
 * @property string $act_name
 * @property integer $bareact_catgid
 * @property string $bareact_catg_name
 * @property integer $tot_section
 * @property integer $tot_chap
 * @property string $Enactment_date
 * @property string $bareact_text
 *
 * @property BareactDetail[] $bareactDetails
 * @property BareactCatg $bareactCatg
 * @property JudgmentAct[] $judgmentActs
 */
class BareactMast extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bareact_mast';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'doc_id', 'bareact_code', 'act_group_code', 'act_catg_code', 'act_sub_catg_code', 'tot_section', 'tot_chap', 'country_code'], 'integer'],
            [['bareact_code'], 'required'],
            [['enact_date'], 'safe'],
            [['bareact_desc'], 'string', 'max' => 255],
            [['act_group_desc', 'act_status', 'country_name'], 'string', 'max' => 25],
            [['act_catg_desc', 'act_sub_catg_desc'], 'string', 'max' => 100],
            [['ref_doc_id'], 'string', 'max' => 10],
            [['bareact_code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doc_id' => 'Doc ID',
            'bareact_code' => 'Bareact Code',
            'bareact_desc' => 'Bareact Description',
            'act_group_code' => 'Act Group Code',
            'act_group_desc' => 'Act Group Description',
            'act_catg_code' => 'Act Catg Code',
            'act_catg_desc' => 'Act Catg Description',
            'act_status' => 'Act Status',
            'enact_date' => 'Enact Date',
            'ref_doc_id' => 'Ref Doc ID',
            'act_sub_catg_code' => 'Act Sub Catg Code',
            'act_sub_catg_desc' => 'Act Sub Catg Description',
            'tot_section' => 'Tot Section',
            'tot_chap' => 'Tot Chap',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    /*public function getBareactDesc($act_sub){
        $model = BareactMast::find()
           ->select('bareact_code,bareact_desc')
           ->where(['act_sub_catg_code' => $act_sub])
           ->all();
          return $model;
    }*/
    /*FunctionName : BareactDesc*/
    /*It was created for follow mvc pattern,function was called in controller(SiteController),then model return the expected output and return to controller and then display on view*/

    public function getBareactDetails()
    {
        return $this->hasMany(BareactDetail::className(), ['bareact_code' => 'bareact_code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBareactGrp()
    {
        return $this->hasOne(BareactGroupMast::className(), ['act_group_code' => 'act_group_code']);
    }
    
    public function getBareactCatg()
    {
        return $this->hasOne(BareactCatgMast::className(), ['act_catg_code' => 'act_catg_code']);
    }

    public function getBareactSubCatg()
    {
        return $this->hasOne(BareactSubcatgMast::className(), ['act_sub_catg_code' => 'act_sub_catg_code']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJudgmentActs()
    {
        return $this->hasMany(JudgmentAct::className(), ['bareact_code' => 'bareact_code']);
    }

    public function getTruncatedBareact()
    {
        if (strlen($this->bareact_desc)<=50) 
            return $this->bareact_desc;
        else 
            return substr($this->bareact_desc,0,50).'...';
    }
}
