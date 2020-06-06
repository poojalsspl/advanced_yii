<?php

namespace frontend\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "judgment_ref".
 *
 * @property int $id
 * @property string|null $username
 * @property int|null $judgment_code
 * @property string|null $doc_id
 * @property string|null $judgment_title
 * @property string|null $judgment_title_ref
 * @property int|null $court_code_ref
 * @property string|null $court_name_ref
 * @property string|null $citation_ref
 * @property string|null $judgment_date_ref
 * @property string|null $work_status
 */
class JudgmentRef extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_ref';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        /*return [
            [['id'], 'required'],
            [['id', 'judgment_code'], 'integer'],
            [['doc_id'], 'string', 'max' => 40],
            [['judgment_title', 'judgment_title_ref'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];*/
         return [
            [['judgment_code', 'court_code_ref'], 'integer'],
            [['judgment_date_ref'], 'safe'],
            [['username'], 'string', 'max' => 50],
            [['doc_id'], 'string', 'max' => 40],
            [['judgment_title', 'judgment_title_ref'], 'string', 'max' => 255],
            [['court_name_ref'], 'string', 'max' => 100],
            [['citation_ref'], 'string', 'max' => 2000],
            [['work_status'], 'string', 'max' => 2],
            [['ref_type'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        /*return [
            'id' => 'ID',
            'judgment_code' => 'Judgment Code',
            'doc_id' => 'Doc ID',
            'judgment_title' => 'Judgment Title',
            'judgment_title_ref' => 'Judgment Title Referred',
            'flag' => 'Flag',
        ];*/
        return [
            'id' => 'ID',
            'username' => 'Username',
            'judgment_code' => 'Judgment Code',
            'doc_id' => 'Doc ID',
            'judgment_title' => 'Judgment Title',
            'judgment_title_ref' => 'Judgment Title Referred',
            'court_code_ref' => 'Court Code Referred',
            'court_name_ref' => 'Court Name Referred',
            'citation_ref' => 'Citation Referred',
            'judgment_date_ref' => 'Judgment Date Referred',
            'ref_type' => 'Ref Type',
            'work_status' => 'Work Status',
        ];
    }

        public static function getJudgmentCitiedBY($RIdBy){
        $data=array('records'=>null,'total'=>0);
        $record=JudgmentRef::find()
            ->asArray()
            ->select(array("judgment_title_ref","judgment_code"))
            ->where(['doc_id_ref' =>$RIdBy])
            ->groupBy("judgment_title_ref")
            ->all();
        $totalRecords= JudgmentRef::find()
            ->asArray()
            ->where(['doc_id_ref' =>$RIdBy])
            ->groupBy("judgment_title_ref")
            ->count();
        if(!empty($record) && isset($record["0"])) {
            foreach ($record as $value) {
                $result[] = $value["judgment_title_ref"];

            }
            return $data=array("records"=>$result,'total'=>$totalRecords);
        }
        return $data;
    }
}
