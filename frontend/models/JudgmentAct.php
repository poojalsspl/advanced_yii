<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_act".
 *
 * @property string $j_doc_id
 * @property int $judgment_code
 * @property string $judgment_title
 * @property int $id
 * @property string $doc_id
 * @property int $act_group_code
 * @property string $act_group_desc
 * @property int $act_catg_code
 * @property string $act_catg_desc
 * @property int $act_sub_catg_code
 * @property string $act_sub_catg_desc
 * @property string $sec_title
 * @property int $country_code
 * @property string $country_shrt_name
 * @property string $bareact_code
 * @property string $bareact_desc
 * @property int $court_code
 * @property string $court_name
 * @property string $court_shrt_name
 * @property int $bench_code
 * @property string $bench_name
 * @property string $level
 */
class JudgmentAct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $total;
    public static function tableName()
    {
        return 'judgment_act';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code', 'act_group_code', 'act_catg_code', 'act_sub_catg_code', 'country_code', 'court_code', 'bench_code'], 'integer'],
            [['j_doc_id', 'doc_id'], 'string', 'max' => 40],
            [['judgment_title', 'sec_title', 'bareact_desc'], 'string', 'max' => 255],
            [['act_group_desc'], 'string', 'max' => 25],
            [['act_catg_desc', 'act_sub_catg_desc', 'court_name', 'bench_name'], 'string', 'max' => 100],
            [['country_shrt_name', 'bareact_code'], 'string', 'max' => 10],
            [['court_shrt_name'], 'string', 'max' => 20],
            [['level'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'j_doc_id' => 'J Doc ID',
            'judgment_code' => 'Judgment Code',
            'judgment_title' => 'Judgment Title',
            'id' => 'ID',
            'doc_id' => 'Doc ID',
            'act_group_code' => 'Act Group Code',
            'act_group_desc' => 'Act Group Desc',
            'act_catg_code' => 'Act Catg Code',
            'act_catg_desc' => 'Act Catg Desc',
            'act_sub_catg_code' => 'Act Sub Catg Code',
            'act_sub_catg_desc' => 'Act Sub Catg Desc',
            'sec_title' => 'Act Title',
            'country_code' => 'Country Code',
            'country_shrt_name' => 'Country Shrt Name',
            'bareact_code' => 'Bareact Code',
            'bareact_desc' => 'Bareact Desc',
            'court_code' => 'Court Code',
            'court_name' => 'Court Name',
            'court_shrt_name' => 'Court Shrt Name',
            'bench_code' => 'Bench Code',
            'bench_name' => 'Bench Name',
            'level' => 'Level',
        ];
    }

     public function getBareactGroupMast()
    {
      return $this->hasOne(BareactGroupMast::className(), ['act_group_desc' => 'act_group_desc']);
    }

     public function getBareact($id){
        echo "hello";
      $sql="Select judgment_ref.court_code,judgment_ref.court_name,judgment_ref.judgment_title_ref,judgment_ref.judgment_title,judgment_ref.judgment_code 
            FROM judgment_ref
            where judgment_ref.doc_id = $docid";
        $command = Yii::$app->getDb()->createCommand($sql);
        return $records = $command->queryAll();
    }


       public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];

        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'id', 'id'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['id']) && !empty($item['id']) && isset($multipleModels[$item['id']])) {
                    $models[] = $multipleModels[$item['id']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }

     public function getBareactDesc()
    {
        return $this->hasOne(BareactMast::className(), ['bareact_code' => 'bareact_code']);
    }




}
