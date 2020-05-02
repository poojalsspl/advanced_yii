<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "web_articles".
 *
 * @property int $id
 * @property string|null $art_date
 * @property string|null $pub_date
 * @property string|null $username
 * @property string|null $title
 * @property string|null $abstract_image
 * @property string|null $slider_image
 * @property string|null $body
 * @property int|null $art_catg_id
 * @property string|null $sef_title
 * @property string|null $sef_description
 * @property string|null $sef_keyword
 * @property string|null $sef_alt
 * @property string|null $status
 * @property string|null $author
 * @property string|null $abstract_image_title
 */
class WebArticles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['art_date', 'pub_date'], 'safe'],
            [['body','abstract_image', 'slider_image'], 'string'],
            [['art_catg_id'], 'integer'],
            [['username', 'author'], 'string', 'max' => 50],
            [['title', 'sef_title'], 'string', 'max' => 100],
            [['sef_description'], 'string', 'max' => 150],
            [['sef_keyword', 'sef_alt'], 'string', 'max' => 250],
            [['status'], 'string', 'max' => 1],
            [['abstract_image_title'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'art_date' => 'Art Date',
            'pub_date' => 'Pub Date',
            'username' => 'Username',
            'title' => 'Title',
            'abstract_image' => 'Abstract Image',
            'slider_image' => 'Slider Image',
            'body' => 'Body',
            'art_catg_id' => 'Art Catg ID',
            'sef_title' => 'Sef Title',
            'sef_description' => 'Sef Description',
            'sef_keyword' => 'Sef Keyword',
            'sef_alt' => 'Sef Alt',
            'status' => 'Status',
            'author' => 'Author',
            'abstract_image_title' => 'Abstract Image Title',
        ];
    }
}
