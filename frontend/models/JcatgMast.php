<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jcatg_mast".
 *
 * @property int $jcatg_id
 * @property string $jcatg_description
 * @property int $jcatg_id1
 * @property string $jcatg_description1
 *
 * @property JsubCatgMast[] $jsubCatgMasts
 */
class JcatgMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jcatg_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jcatg_id1'], 'integer'],
            [['jcatg_description', 'jcatg_description1'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jcatg_id' => 'Jcatg ID',
            'jcatg_description' => 'Jcatg Description',
            'jcatg_id1' => 'Jcatg Id1',
            'jcatg_description1' => 'Jcatg Description1',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJsubCatgMasts()
    {
        return $this->hasMany(JsubCatgMast::className(), ['jcatg_id' => 'jcatg_id']);
    }
}
