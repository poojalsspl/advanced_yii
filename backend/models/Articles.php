<?php

namespace backend\models;
use frontend\models\ArticleCatgMast;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $body
 * @property string|null $status
 * @property int|null $art_catg_id
 * @property string|null $art_catg_name
 * @property string|null $username
 * @property int $u_id admin id
 * @property string|null $allocation_date
 * @property string|null $target_date
 * @property string|null $completion_date
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
            [['art_catg_id', 'u_id'], 'integer'],
            [['u_id'], 'required'],
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
            'art_catg_name' => 'Art Catg Name',
            'username' => 'Username',
            'u_id' => 'U ID',
            'allocation_date' => 'Allocation Date',
            'target_date' => 'Target Date',
            'completion_date' => 'Completion Date',
        ];
    }

    public function getArticleCatg()
    {
        return $this->hasOne(ArticleCatgMast::className(), ['art_catg_id' => 'art_catg_id']);
    }
}
