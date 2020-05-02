<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "syllabus_catg_mast".
 *
 * @property string|null $syllabus_catg_code
 * @property string|null $syllabus_catg_name
 */
class SyllabusCatgMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'syllabus_catg_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['syllabus_catg_code'], 'string', 'max' => 5],
            [['syllabus_catg_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'syllabus_catg_code' => 'Syllabus Catg Code',
            'syllabus_catg_name' => 'Syllabus Catg Name',
        ];
    }
}
