<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "judgment_mast".
 *
 * @property string $username
 * @property string $college_code
 * @property int $judgment_code
 * @property int $court_code
 * @property string $court_name
 * @property string $court_type
 * @property string $appeal_numb
 * @property string $appeal_numb1
 * @property string $judgment_date
 * @property string $judgment_date1
 * @property string $judgment_title
 * @property string $appeal_status
 * @property int $disposition_id
 * @property int $disposition_id1
 * @property string $disposition_text
 * @property int $bench_type_id
 * @property int $bench_type_id1
 * @property string $bench_type_text
 * @property int $judgment_jurisdiction_id
 * @property int $judgment_jurisdiction_id1
 * @property string $judgmnent_jurisdiction_text
 * @property string $judgment_abstract
 * @property string $judgment_analysis
 * @property string $judgment_text
 * @property string $judgment_text1
 * @property string $search_tag
 * @property string $doc_id
 * @property string $judgment_type
 * @property string $judgment_type1
 * @property int $jcatg_id
 * @property int $jcatg_id1
 * @property string $jcatg_description
 * @property int $jsub_catg_id
 * @property int $jsub_catg_id1
 * @property string $jsub_catg_description
 * @property string $overrule_judgment
 * @property string $overruled_by_judgment
 * @property string $remark
 * @property string $time
 * @property int $approved
 * @property string $approved_date
 * @property int $status_1 for_all_tabs
 * @property int $status_2 for_elements&datapoints
 * @property string $completion_status
 * @property string $completion_date
 * @property string $research_date
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
            [['court_code', 'disposition_id', 'disposition_id1', 'bench_type_id', 'bench_type_id1', 'judgment_jurisdiction_id', 'judgment_jurisdiction_id1', 'jcatg_id', 'jcatg_id1', 'jsub_catg_id', 'jsub_catg_id1', 'approved', 'status_1', 'status_2'], 'integer'],
            [['judgment_date', 'judgment_date1', 'time', 'approved_date', 'completion_date', 'start_date'], 'safe'],
            [['judgment_abstract', 'judgment_analysis', 'judgment_text', 'judgment_text1'], 'string'],
            [['username'], 'string', 'max' => 50],
            [['college_code'], 'string', 'max' => 4],
            [['court_name'], 'string', 'max' => 100],
            [['court_type'], 'string', 'max' => 2],
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
            'status_1' => 'Status 1',
            'status_2' => 'Status 2',
            'completion_status' => 'Completion Status',
            'completion_date' => 'Completion Date',
            'start_date' => 'Research Date',
        ];
    }
}
