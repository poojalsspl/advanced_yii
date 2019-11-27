<?php

namespace frontend\models;
use frontend\models\ArticleCatgMast;

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
            [['title', 'username'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 1],
            [['art_catg_name'], 'string', 'max' => 25],
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
            'art_catg_id' => 'Article Category',
            'art_catg_name' => 'Article Category Name',
            'username' => 'Username',
        ];
    }

    public function getArticleCode()
    {
        return $this->hasOne(ArticleCatgMast::className(), ['art_catg_id' => 'art_catg_id']);
    }
}
