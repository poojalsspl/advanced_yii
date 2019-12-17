<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jcatg_mast".
 *
 * @property int $jcatg_id
 * @property string $jcatg_description

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
            [['jcatg_id'], 'integer'],
            [['jcatg_description'], 'string', 'max' => 150],
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
           
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJsubCatgMasts()
    {
        return $this->hasMany(JsubCatgMast::className(), ['jcatg_id' => 'jcatg_id']);
    }

    public function getCatgName($jcatg)
     {
      $query = (new \yii\db\Query())
      ->select('jcatg_description')
      ->from('jcatg_mast')
      ->where('jcatg_id=:jcatg_id', [':jcatg_id' => $jcatg]);
      $command = $query->createCommand();
      $rows = $command->queryAll();

       return $rows[0]['jcatg_description'];
      }
}
