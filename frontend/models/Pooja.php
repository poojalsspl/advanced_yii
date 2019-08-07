<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pooja".
 *
 * @property int $judgment_code
 * @property int $court_code
 * @property string $judgment_date
 * @property string $jyear
 */
class Pooja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pooja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['court_code'], 'integer'],
            [['judgment_date', 'jyear'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'judgment_code' => 'Judgment Code',
            'court_code' => 'Court Code',
            'judgment_date' => 'Judgment Date',
            'jyear' => 'Jyear',
        ];
    }
}
