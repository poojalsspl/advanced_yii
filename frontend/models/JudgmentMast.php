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
 * @property string|null $username
 * @property int $u_id admin id
 * @property string|null $college_code
 * @property int $judgment_code
 * @property string|null $doc_id
 * @property int|null $court_code
 * @property string|null $court_name
 * @property string|null $court_type
 * @property string|null $appeal_numb
 * @property string|null $appeal_numb1
 * @property string $appeal_count
 * @property string|null $judgment_date
 * @property string|null $judgment_date1
 * @property string|null $judgment_title
 * @property string|null $appeal_status
 * @property int|null $disposition_id
 * @property int|null $disposition_id1
 * @property string|null $disposition_text
 * @property int|null $bench_type_id
 * @property int|null $bench_type_id1
 * @property string|null $bench_type_text
 * @property int|null $judgment_jurisdiction_id
 * @property int|null $judgment_jurisdiction_id1
 * @property string|null $judgmnent_jurisdiction_text
 * @property string|null $judgment_abstract
 * @property string|null $judgment_analysis
 * @property string|null $judgment_text
 * @property string|null $judgment_text1
 * @property string|null $search_tag
 * @property int|null $search_tag_count
 * @property string|null $judgment_type
 * @property string|null $judgment_type1
 * @property int|null $jcatg_id
 * @property int|null $jcatg_id1
 * @property string|null $jcatg_description
 * @property int|null $jsub_catg_id
 * @property int|null $jsub_catg_id1
 * @property string|null $jsub_catg_description
 * @property int|null $judgment_length
 * @property string|null $overruled_by_judgment
 * @property string|null $remark
 * @property string|null $time
 * @property int|null $approved
 * @property string|null $approved_date
 * @property string|null $work_status
 * @property int|null $status_2 for_elements&datapoints
 * @property string|null $completion_status
 * @property string|null $completion_date
 * @property int|null $edit_status 0 for incomplete 1 for complete
 * @property string|null $start_date
 * @property int $bench_code
 */
class JudgmentMast extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $total;
    public static function tableName()
    {
        return 'judgment_mast';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    { 
        /*return [
            [['court_code', 'jcatg_id', 'jsub_catg_id','search_tag_count'], 'integer'],
            [['judgment_date', 'disposition_id','disposition_text','judgment_jurisdiction_id','judgmnent_jurisdiction_text','bench_type_id','bench_type_text'], 'safe'],
            [['judgment_title','bench_type_id','judgment_jurisdiction_id','disposition_id'], 'required'],
            [['judgment_abstract', 'judgment_text','judgment_text1','username'], 'string'],
            [['court_name'], 'string', 'max' => 100],
            [['appeal_numb'], 'string', 'max' => 250],
            [['judgment_title'], 'string', 'max' => 255],
            
            [['search_tag'],'string','max'=>300],
            [['appeal_status'], 'string', 'max' => 10],
           
            [['doc_id'], 'string', 'max' => 40],
            [['judgment_type','appeal_count'], 'string', 'max' => 1],
            [['remark'], 'string', 'max' => 2000],
            [['jcatg_description', 'jsub_catg_description'], 'string', 'max' => 150],
            [['overruled_by_judgment'], 'string'],
            [['jsub_catg_id'], 'exist', 'skipOnError' => true, 'targetClass' => JsubCatgMast::className(), 'targetAttribute' => ['jsub_catg_id' => 'jsub_catg_id']],
            [['court_code'], 'exist', 'skipOnError' => true, 'targetClass' => CourtMast::className(), 'targetAttribute' => ['court_code' => 'court_code']],
            [['jcatg_id'], 'exist', 'skipOnError' => true, 'targetClass' => JcatgMast::className(), 'targetAttribute' => ['jcatg_id' => 'jcatg_id']],
            
        ];*/


         return [
           
            [['u_id', 'court_code', 'disposition_id', 'disposition_id1', 'bench_type_id', 'bench_type_id1', 'judgment_jurisdiction_id', 'judgment_jurisdiction_id1', 'search_tag_count', 'jcatg_id', 'jcatg_id1', 'jsub_catg_id', 'jsub_catg_id1', 'judgment_length', 'approved', 'status_2', 'edit_status','bench_code'], 'integer'],
            [['judgment_date', 'judgment_date1', 'time', 'approved_date', 'completion_date', 'start_date'], 'safe'],
            [['judgment_abstract', 'judgment_analysis', 'judgment_text', 'judgment_text1'], 'string'],
            [['username'], 'string', 'max' => 50],
            [['college_code'], 'string', 'max' => 4],
            [['doc_id'], 'string', 'max' => 40],
            [['court_name'], 'string', 'max' => 100],
            [['court_type', 'work_status'], 'string', 'max' => 2],
            [['appeal_numb', 'appeal_numb1'], 'string', 'max' => 250],
            [['appeal_count', 'judgment_type', 'judgment_type1', 'completion_status'], 'string', 'max' => 1],
            [['judgment_title', 'disposition_text', 'bench_type_text', 'judgmnent_jurisdiction_text'], 'string', 'max' => 255],
            [['appeal_status'], 'string', 'max' => 10],
            [['search_tag'], 'string', 'max' => 300],
            [['jcatg_description', 'jsub_catg_description'], 'string', 'max' => 150],
            [['overruled_by_judgment'], 'string', 'max' => 20],
            [['remark'], 'string', 'max' => 2000],
        ];
}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username'                 => 'Username',
            'u_id'                     => 'U ID',
            'college_code'             => 'College Code',
            'judgment_code'            => 'Judgment Code',
            'doc_id'                   => 'Doc ID',
            'court_code'               => 'Court Code',
            'court_name'               => 'Court Name',
            'appeal_numb'              => 'Judgment Appeal Number',
            'appeal_numb1'             => 'Appeal Numb1',
            'appeal_count'             => 'Appeal Count',
            'judgment_date'            => 'Judgment Date',
            'judgment_date1'           => 'Judgment Date1',
            'judgment_title'           => 'Judgment Title',
            'appeal_status'            => 'Status',
            'disposition_id'           => 'Judgment Disposition',
            'disposition_id1'          => 'Disposition Id1',
            'disposition_text'         => 'Disposition Text',
            'bench_type_id'            => 'Bench Type',
            'bench_type_id1'           => 'Bench Type Id1',
            'bench_type_text'          => 'Bench Type Text',
            'judgment_jurisdiction_id' => 'Jurisdiction',
            'judgment_jurisdiction_id1' => 'Judgment Jurisdiction Id1',
            'judgmnent_jurisdiction_text'=> 'Judgmnent Jurisdiction Text',
            'judgment_abstract'        => 'Judgment Abstract',
            'judgment_analysis'        => 'Judgment Analysis',
            'judgment_text'            => 'Edited After Proof Reading Judgment Text. Dont forget to click on checkbox after completly editing the judgment text and format',
            'judgment_text1'           => 'Raw Judgment Text cannot be edited and to be used as refrence while judgment editing the judgment text above',
            'search_tag'               => 'Search Tag',
            'search_tag_count'         => 'Search Tag Count', 
            'judgment_type'            => 'Judgment Type',
            'judgment_type1'           => 'Judgment Type1',
            'jcatg_id'                 => 'Judgment Main Category',
            'jcatg_id1'                => 'Jcatg Id1',
            'jcatg_description'        => 'Judgment Main Category',
            'jsub_catg_id'             => 'Jsub Catg ID',
            'jsub_catg_id1'            => 'Jsub Catg Id1',
            'jsub_catg_description'    => 'Judgment Sub-category',
            'overruled_by_judgment'    => 'If Existing Judgment Is Overruled By Another Judgment(Judgment Title:Date:Court Name)',
            'remark'                   => 'Data Collected from other source',
            'time'                     => 'Time',
            'approved'                 => 'Approved',
            'approved_date'            => 'Approved Date',
            'work_status'              => 'Work Status',
            'status_2'                 => 'Status 2',
            'completion_status'        => 'Completion Status',
            'completion_date'          => 'Completion Date',
            'edit_satus'               => 'Check The box once you have completed all editing of the judgment text. Tabs for other Fixed data pooint will be displayed only after you complete the editing and check the box.', 
            'start_date'               => 'Allocation Date',
            'bench_code'               => 'Bench Code'
         ];
        
}

    /*public function attributeHints() {
        $labels = $this->attributeLabels();
        $hints = [];
        if (count($labels) > 0) {
            foreach ($labels as $attribute => $label) {
               //print_r($labels['judgment_code']);
              // $jcode = $labels['judgment_code'];

                $hints[$attribute] = Yii::t('app', 'Enter ' . strtolower($label));
            }
        }
        return $hints;
    }*/

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
        return $this->hasMany(JudgmentAdvocate::className(), ['doc_id' => 'doc_id']);
    }

      public function getJudgmentActs()
    {
        return $this->hasMany(JudgmentAct::className(), ['doc_id' => 'doc_id']);
    }

      public function getJudgmentJudges()
    {
        return $this->hasMany(JudgmentJudge::className(), ['doc_id' => 'doc_id']);
    }
       public function getJudgmentCitations()
    {
        return $this->hasMany(JudgmentCitation::className(), ['doc_id' => 'doc_id']);
    }

       public function getJudgmentParties()
    {
        return $this->hasMany(JudgmentParties::className(), ['doc_id' => 'doc_id']);
    }

     public function getJudgmentElement()
    {
        return $this->hasMany(JudgmentElement::className(), ['doc_id' => 'doc_id']);
    }

     public function getJudgmentDatapoints()
    {
        return $this->hasMany(JudgmentDataPoint::className(), ['doc_id' => 'doc_id']);
    }

    public function getJudgmentReferred()
    {
        return $this->hasMany(JudgmentRef::className(), ['doc_id' => 'doc_id']);
    }
    public function getJudgmentTags()
    {
        return $this->hasMany(JudgmentTags::className(), ['doc_id' => 'doc_id']);
    }

    /* Reason : For display limited characters in gridview column 
       Url : http://localhost/advanced_yii/judgment-mast/abstract-list 
    */
    public function getTruncatedAbstract()
    {
    if (strlen($this->judgment_abstract) <= 30)
        return $this->judgment_abstract;
    else
        return substr($this->judgment_abstract, 0, 30) . '...';
    }
   
    
}
