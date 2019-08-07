<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_bench_type".
 *
 * @property int $bench_type_id
 * @property string $bench_type_text
 */
class JudgmentBenchType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_bench_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bench_type_id'], 'integer'],
            [['bench_type_text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bench_type_id' => 'Bench Type ID',
            'bench_type_text' => 'Bench Type Text',
        ];
    }
}
