<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_advocate".
 *
 * @property int $id
 * @property int $judgment_code
 * @property string $advocate_name
 * @property string $advocate_flag
 * @property string $doc_id
 *
 * @property JudgmentMast $judgmentCode
 */
class JudgmentAdvocate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_advocate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          
            [['advocate_name','advocate_flag'], 'required'],
           
            [['advocate_flag'], 'string', 'max' => 1],
            [['doc_id'], 'string', 'max' => 40],
           /* [['judgment_code'], 'exist', 'skipOnError' => true, 'targetClass' => JudgmentMast::className(), 'targetAttribute' => ['judgment_code' => 'judgment_code']],*/
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            
            'advocate_name' => 'Advocate Name',
            'advocate_flag' => 'Advocate Flag',
            'doc_id' => 'Doc ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJudgmentCode()
    {
        return $this->hasOne(JudgmentMast::className(), ['judgment_code' => 'judgment_code']);
    }

    public static function getAppellant($docId){
        $data=array('records'=>null,'total'=>0);
        $record=JudgmentAdvocate::find()
            ->asArray()
            ->select(['advocate_name'])
            ->where(['doc_id' => $docId])
            ->andWhere(['advocate_flag'=>'A'])
            ->groupBy("advocate_name")
              ->all();
        $totalRecords= JudgmentAdvocate::find()
            ->asArray()
            ->where(['doc_id' => $docId])
            ->andWhere(['advocate_flag'=>'A'])
            ->groupBy("advocate_name")
            ->count();
        if (!empty($record)){
            foreach ($record as $value) {
            $result[]=$value["advocate_name"];
            }
            return $data=array("records"=>$result,'total'=>$totalRecords);
        }
        return $data;
    }

    public static function getRespondant($ResId){
        $data=array('records'=>null,'total'=>0);
        $record=JudgmentAdvocate::find()
            ->asArray()
            ->select(array("advocate_name"))
            ->where(['doc_id' =>$ResId])
            ->andWhere(['advocate_flag'=>"R"])
            ->groupBy("advocate_name")
            ->all();
        $totalRecords= JudgmentAdvocate::find()
            ->asArray()
            ->where(['doc_id' =>$ResId])
            ->andWhere(['advocate_flag'=>"R"])
            ->groupBy("advocate_name")
            ->count();
        if(!empty($record)){
            foreach ($record as $value) {
                $result[]=$value["advocate_name"];
            }
            return $data=array("records"=>$result,'total'=>$totalRecords);
        }
        return $data;

    }
}
