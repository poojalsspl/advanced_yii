<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_catg_view".
 *
 * @property int $tot
 * @property string|null $username
 * @property int|null $jcatg_id
 * @property string|null $jcatg_description
 */
class JudgmentCatgView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_catg_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tot', 'jcatg_id'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['jcatg_description'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tot' => 'Tot',
            'username' => 'Username',
            'jcatg_id' => 'Jcatg ID',
            'jcatg_description' => 'Jcatg Description',
        ];
    }
}
