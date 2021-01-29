<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "survey_mast".
 *
 * @property int $id
 * @property int $surv_code
 * @property string $surv_que
 * @property string|null $surv_ans
 * @property string|null $ans_type
 */
class SurveyMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'survey_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surv_code', 'surv_que'], 'required'],
            [['surv_code'], 'integer'],
            [['surv_ans'], 'string'],
            [['surv_que'], 'string', 'max' => 100],
            [['ans_type'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surv_code' => 'Surv Code',
            'surv_que' => 'Surv Que',
            'surv_ans' => 'Surv Ans',
            'ans_type' => 'Ans Type',
        ];
    }
}
