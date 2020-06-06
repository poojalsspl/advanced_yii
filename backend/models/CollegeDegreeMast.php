<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "college_degree_mast".
 *
 * @property int $id
 * @property int|null $degree_catg_code
 * @property int|null $degree_code
 * @property int|null $college_code
 * @property int|null $estd
 * @property int|null $intake
 */
class CollegeDegreeMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'college_degree_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['degree_catg_code', 'degree_code', 'college_code', 'estd', 'intake'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'degree_catg_code' => 'Degree Catg Code',
            'degree_code' => 'Degree Code',
            'college_code' => 'College Code',
            'estd' => 'Estd',
            'intake' => 'Intake',
        ];
    }
}
