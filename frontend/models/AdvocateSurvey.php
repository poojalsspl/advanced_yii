<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "advocate_survey".
 *
 * @property int $id
 * @property int|null $surv_id
 * @property int|null $surv_code
 * @property string|null $surv_date
 * @property int|null $adv_id
 * @property string|null $mkt_username
 */
class AdvocateSurvey extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advocate_survey';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surv_id', 'surv_code', 'adv_id'], 'integer'],
            [['surv_date'], 'safe'],
            [['mkt_username'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surv_id' => 'Surv ID',
            'surv_code' => 'Surv Code',
            'surv_date' => 'Surv Date',
            'adv_id' => 'Adv ID',
            'mkt_username' => 'Mkt Username',
        ];
    }
}
