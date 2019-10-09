<?php

namespace frontend\models;


use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "house".
 *
 * @property int $id
 * @property int $person_id
 * @property string $description
 */
class House extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'house';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id'], 'integer'],
            [['description'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'person_id' => 'Person ID',
            'description' => 'Description',
        ];
    }

    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['house_id' => 'id']);
    }
}
