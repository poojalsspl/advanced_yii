<?php

namespace frontend\models;


use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property int $house_id
 * @property string $description
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['house_id'], 'integer'],
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
            'house_id' => 'House ID',
            'description' => 'Description',
        ];
    }
}
