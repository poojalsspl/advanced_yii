<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "question_catg_mast".
 *
 * @property int|null $catg_code
 * @property string|null $catg_desc
 */
class QuestionCatgMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question_catg_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catg_code'], 'integer'],
            [['catg_desc'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'catg_code' => 'Catg Code',
            'catg_desc' => 'Catg Desc',
        ];
    }
}
