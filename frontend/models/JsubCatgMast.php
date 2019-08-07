<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jsub_catg_mast".
 *
 * @property int $jsub_catg_id
 * @property int $jcatg_id
 * @property string $jsub_catg_description
 *
 * @property JcatgMast $jcatg
 */
class JsubCatgMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jsub_catg_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jcatg_id'], 'integer'],
            [['jsub_catg_description'], 'string', 'max' => 150],
            [['jcatg_id'], 'exist', 'skipOnError' => true, 'targetClass' => JcatgMast::className(), 'targetAttribute' => ['jcatg_id' => 'jcatg_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jsub_catg_id' => 'Jsub Catg ID',
            'jcatg_id' => 'Jcatg ID',
            'jsub_catg_description' => 'Jsub Catg Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJcatg()
    {
        return $this->hasOne(JcatgMast::className(), ['jcatg_id' => 'jcatg_id']);
    }
}
