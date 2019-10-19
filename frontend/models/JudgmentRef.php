<?php

namespace frontend\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "judgment_ref".
 *
 * @property int $id
 * @property int $judgment_code
 * @property string $doc_id
 * @property string $judgment_title
 * @property int $judgment_code_ref
 * @property int $court_code
 * @property string $court_name
 * @property string $doc_id_ref
 * @property string $judgment_title_ref
 * @property int $court_code_ref
 * @property string $court_name_ref
 * @property string $flag
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
        return [
            [['id'], 'required'],
            [['id', 'judgment_code', 'judgment_code_ref', 'court_code', 'court_code_ref'], 'integer'],
            [['doc_id', 'doc_id_ref'], 'string', 'max' => 40],
            [['judgment_title', 'judgment_title_ref'], 'string', 'max' => 255],
            [['court_name', 'court_name_ref', 'flag'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judgment_code' => 'Judgment Code',
            'doc_id' => 'Doc ID',
            'judgment_title' => 'Judgment Title',
            'judgment_code_ref' => 'Judgment Code Ref',
            'court_code' => 'Court Code',
            'court_name' => 'Court Name',
            'doc_id_ref' => 'Doc Id Ref',
            'judgment_title_ref' => 'Judgment Title Ref',
            'court_code_ref' => 'Court Code Ref',
            'court_name_ref' => 'Court Name Ref',
            'flag' => 'Flag',
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
