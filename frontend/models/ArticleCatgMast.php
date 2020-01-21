<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "article_catg_mast".
 *
 * @property int $art_catg_id
 * @property string $art_catg_name
 * @property int $role 1 for admin,2 for user
 */
class ArticleCatgMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_catg_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['art_catg_id', 'role'], 'integer'],
            [['art_catg_name'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'art_catg_id' => 'Art Catg ID',
            'art_catg_name' => 'Art Catg Name',
            'role' => 'Role',
        ];
    }
}
