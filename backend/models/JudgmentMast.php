<?php

namespace backend\models;

use Yii;


/**
 * This is the model class for table "judgment_mast".
 *
 * @property string|null $username
 * @property int $u_id admin id
 * @property string|null $college_code
 * @property int $judgment_code
 * @property int|null $court_code
 * @property string|null $court_name
 * @property string|null $court_type
 * @property string|null $appeal_numb
 * @property string|null $appeal_numb1
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
 * @property string|null $doc_id
 * @property string|null $judgment_type
 * @property string|null $judgment_type1
 * @property int|null $jcatg_id
 * @property int|null $jcatg_id1
 * @property string|null $jcatg_description
 * @property int|null $jsub_catg_id
 * @property int|null $jsub_catg_id1
 * @property string|null $jsub_catg_description
 * @property string|null $overruled_by_judgment
 * @property string|null $remark
 * @property string|null $time
 * @property int|null $approved
 * @property string|null $approved_date
 * @property string|null $work_status for_all_tabs
 * @property int|null $status_2 for_elements&datapoints
 * @property string|null $completion_status
 * @property string|null $completion_date
 * @property string|null $start_date
 */
class JudgmentMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {


         return [
            
            [['u_id', 'court_code', 'disposition_id', 'disposition_id1', 'bench_type_id', 'bench_type_id1', 'judgment_jurisdiction_id', 'judgment_jurisdiction_id1', 'jcatg_id', 'jcatg_id1', 'jsub_catg_id', 'jsub_catg_id1', 'approved', 'status_2'], 'integer'],
            [['judgment_date', 'judgment_date1', 'time', 'approved_date', 'completion_date', 'start_date'], 'safe'],
            [['judgment_abstract', 'judgment_analysis', 'judgment_text', 'judgment_text1'], 'string'],
            [['username'], 'string', 'max' => 50],
            [['college_code'], 'string', 'max' => 4],
            [['court_name'], 'string', 'max' => 100],
            [['court_type', 'work_status'], 'string', 'max' => 2],
            [['appeal_numb', 'appeal_numb1'], 'string', 'max' => 250],
            [['judgment_title', 'disposition_text', 'bench_type_text', 'judgmnent_jurisdiction_text'], 'string', 'max' => 255],
            [['appeal_status'], 'string', 'max' => 10],
            [['search_tag'], 'string', 'max' => 300],
            [['doc_id'], 'string', 'max' => 40],
            [['judgment_type', 'judgment_type1', 'completion_status'], 'string', 'max' => 1],
            [['jcatg_description', 'jsub_catg_description'], 'string', 'max' => 150],
            [['overruled_by_judgment'], 'string', 'max' => 20],
            [['remark'], 'string', 'max' => 2000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'u_id' => 'U ID',
            'college_code' => 'College Code',
            'judgment_code' => 'Judgment Code',
            'court_code' => 'Court Code',
            'court_name' => 'Court Name',
            'court_type' => 'Court Type',
            'appeal_numb' => 'Appeal Numb',
            'appeal_numb1' => 'Appeal Numb1',
            'judgment_date' => 'Judgment Date',
            'judgment_date1' => 'Judgment Date1',
            'judgment_title' => 'Judgment Title',
            'appeal_status' => 'Appeal Status',
            'disposition_id' => 'Disposition ID',
            'disposition_id1' => 'Disposition Id1',
            'disposition_text' => 'Disposition Text',
            'bench_type_id' => 'Bench Type ID',
            'bench_type_id1' => 'Bench Type Id1',
            'bench_type_text' => 'Bench Type Text',
            'judgment_jurisdiction_id' => 'Judgment Jurisdiction ID',
            'judgment_jurisdiction_id1' => 'Judgment Jurisdiction Id1',
            'judgmnent_jurisdiction_text' => 'Judgmnent Jurisdiction Text',
            'judgment_abstract' => 'Judgment Abstract',
            'judgment_analysis' => 'Judgment Analysis',
            'judgment_text' => 'Judgment Text',
            'judgment_text1' => 'Judgment Text1',
            'search_tag' => 'Search Tag',
            'doc_id' => 'Doc ID',
            'judgment_type' => 'Judgment Type',
            'judgment_type1' => 'Judgment Type1',
            'jcatg_id' => 'Jcatg ID',
            'jcatg_id1' => 'Jcatg Id1',
            'jcatg_description' => 'Jcatg Description',
            'jsub_catg_id' => 'Jsub Catg ID',
            'jsub_catg_id1' => 'Jsub Catg Id1',
            'jsub_catg_description' => 'Jsub Catg Description',
            'overruled_by_judgment' => 'Overruled By Judgment',
            'remark' => 'Remark',
            'time' => 'Time',
            'approved' => 'Approved',
            'approved_date' => 'Approved Date',
            'work_status' => 'Work Status',
            'status_2' => 'Status 2',
            'completion_status' => 'Completion Status',
            'completion_date' => 'Completion Date',
            'start_date' => 'Research Date',
        ];
    }
}
