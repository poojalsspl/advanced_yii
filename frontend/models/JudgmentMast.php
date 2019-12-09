<?php

namespace frontend\models;

use Yii;

//use app\models\JudgmentRefCount;

use yii\db\Query;
use frontend\models\JudgmentAct;
use frontend\models\JudgmentActCount;
use frontend\models\JudgmentRefByCount;
use frontend\models\JudgmentRefBy;
use frontend\models\JudgmentJudge;
use frontend\models\JudgmentAdvocate;
use yii\data\SqlDataProvider;

/**
 * This is the model class for table "judgment_mast".
 *
 * @property integer $judgment_code
 * @property integer $court_code
 * @property string $court_name
 * @property string $appeal_numb
 * @property string $judgment_date
 * @property string $judgment_title
 * @property string $appellant_name
 * @property string $appellant_adv
 * @property integer $appellant_adv_count
 * @property string $respondant_name
 * @property string $respondant_adv
 * @property integer $respondant_adv_count
 * @property string $appeal_status
 * @property string $citation
 * @property integer $citation_count
 * @property string $judges_name
 * @property integer $judges_count
 * @property string $hearing_date
 * @property string $hearing_place
 * @property string $judgment_abstract
 * @property string $judgment_text
 * @property string $judgment_source_code
 * @property string $judgment_type
 * @property string $judgment_source_name
 * @property string $jcatg_description
 * @property integer $jcatg_id
 * @property string $jsub_catg_description
 * @property integer $jsub_catg_id
 * @property string $overrule_judgment
 * @property string $overruled_by_judgment
 * @property string $judgment_ext_remark_flag
 *
 * @property JudgmentAct[] $judgmentActs
 * @property JudgmentAdvocate[] $judgmentAdvocates
 * @property JudgmentCitation[] $judgmentCitations
 * @property JudgmentExtRemark $judgmentExtRemark
 * @property JudgmentJudge[] $judgmentJudges
 * @property JsubCatgMast $jsubCatg
 * @property CourtMast $courtCode
 * @property JcatgMast $jcatg
 * @property JudgmentParties[] $judgmentParties
 * @property JudgmentRef[] $judgmentRefs
 */
class JudgmentMast extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'judgment_mast';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    { 
        return [
            [['court_code', 'jcatg_id', 'jsub_catg_id'], 'integer'],
            [['judgment_date', 'disposition_id','disposition_text','judgment_jurisdiction_id','judgmnent_jurisdiction_text','bench_type_id','bench_type_text'], 'safe'],
            [['judgment_title'], 'required'],
            [['judgment_abstract', 'judgment_text','judgment_text1','username'], 'string'],
            [['court_name'], 'string', 'max' => 100],
            [['appeal_numb'], 'string', 'max' => 250],
            [['judgment_title'], 'string', 'max' => 255],
            
            [['search_tag'],'string','max'=>300],
            [['appeal_status'], 'string', 'max' => 10],
           
            [['doc_id'], 'string', 'max' => 40],
            [['judgment_type'], 'string', 'max' => 1],
            [['remark'], 'string', 'max' => 2000],
            [['jcatg_description', 'jsub_catg_description'], 'string', 'max' => 150],
            [['overrule_judgment', 'overruled_by_judgment'], 'string', 'max' => 20],
            [['jsub_catg_id'], 'exist', 'skipOnError' => true, 'targetClass' => JsubCatgMast::className(), 'targetAttribute' => ['jsub_catg_id' => 'jsub_catg_id']],
            [['court_code'], 'exist', 'skipOnError' => true, 'targetClass' => CourtMast::className(), 'targetAttribute' => ['court_code' => 'court_code']],
            [['jcatg_id'], 'exist', 'skipOnError' => true, 'targetClass' => JcatgMast::className(), 'targetAttribute' => ['jcatg_id' => 'jcatg_id']],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'judgment_code'            => 'Judgment Code',
            'court_code'               => 'Court Code',
            'court_name'               => 'Court Name',
            'appeal_numb'              => 'Case Number',
            'judgment_date'            => 'Judgment Date',
            'judgment_title'           => 'Judgment Title',
            'appeal_status'            => 'Status',
            'judgment_abstract'        => 'Judgment Abstract',
            'judgment_text'            => 'Judgment Text',
            'judgment_text1'           => 'Judgment Text1',
            'doc_id'                   => 'Judgment Source Code',
            'judgment_type'            => 'Judgment Type',
            'jcatg_description'        => 'Jcatg Description',
            'jcatg_id'                 => 'Judgment Category',
            'jsub_catg_description'    => 'Jsub Catg Description',
            'jsub_catg_id'             => 'Jsub Catg ID',
            'overrule_judgment'        => 'Overrule Judgment',
            'overruled_by_judgment'    => 'Overruled By Judgment',
            'remark'                   => 'Remark',
            'bench_type_id'            => 'Bench Type',
            'disposition_id'           => 'Disposition',
            'judgment_jurisdiction_id' => 'Jurisdiction',
            'search_tag'               => 'Search Tag',
            'username'                 => 'Username'
        ];
    }

    public function getCourtCode()
    {
        return $this->hasOne(CourtMast::className(), ['court_code' => 'court_code']);
    }

    public function getJcatg()
    {
        return $this->hasOne(JcatgMast::className(), ['jcatg_id' => 'jcatg_id']);
    }
    public function getJsubCatg()
    {
        return $this->hasOne(JsubCatgMast::className(), ['jsub_catg_id' => 'jsub_catg_id']);
    }
     public function getJudgmentBenchType()
    {
      return $this->hasOne(JudgmentBenchType::className(), ['bench_type_id' => 'bench_type_id']);
    }
      public function getJudgmentDisposition()
    {
      return $this->hasOne(JudgmentDisposition::className(), ['disposition_id' => 'disposition_id']);
    } 
       public function getJudgmentJurisdiction()
    {
      return $this->hasOne(JudgmentJurisdiction::className(), ['judgment_jurisdiction_id' => 'judgment_jurisdiction_id']);
    }
    public function getCourtNameCode()
    {
        return $this->hasOne(CourtMast::className(), ['court_name' => 'court_name']);
    }

     public function getJudgmentAdvocates()
    {
        return $this->hasMany(JudgmentAdvocate::className(), ['judgment_code' => 'judgment_code']);
    }

      public function getJudgmentActs()
    {
        return $this->hasMany(JudgmentAct::className(), ['judgment_code' => 'judgment_code']);
    }

      public function getJudgmentJudges()
    {
        return $this->hasMany(JudgmentJudge::className(), ['judgment_code' => 'judgment_code']);
    }
       public function getJudgmentCitations()
    {
        return $this->hasMany(JudgmentCitation::className(), ['judgment_code' => 'judgment_code']);
    }

       public function getJudgmentParties()
    {
        return $this->hasMany(JudgmentParties::className(), ['judgment_code' => 'judgment_code']);
    }

     public function getJudgmentElement()
    {
        return $this->hasMany(JudgmentElement::className(), ['judgment_code' => 'judgment_code']);
    }

     public function getJudgmentDatapoints()
    {
        return $this->hasMany(JudgmentDataPoint::className(), ['judgment_code' => 'judgment_code']);
    }

    public function getJudgmentReferred()
    {
        return $this->hasMany(JudgmentRef::className(), ['judgment_code' => 'judgment_code']);
    }
   
    
}
