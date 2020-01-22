<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $status
 * @property int $art_catg_id
 * @property string $art_catg_name
 * @property string $username
 * @property string $allocation_date
 * @property string $target_date
 * @property string $completion_date
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['art_catg_id'], 'integer'],
            [['allocation_date', 'target_date', 'completion_date'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 1],
            [['art_catg_name'], 'string', 'max' => 25],
            [['username'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'status' => 'Status',
            'art_catg_id' => 'Art Catg ID',
            'art_catg_name' => 'Article Category',
            'username' => 'Username',
            'allocation_date' => 'Allocation Date',
            'target_date' => 'Target Date',
            'completion_date' => 'Completion Date',
        ];
    }
}
