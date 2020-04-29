<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "article_catg_mast".
 *
 * @property int|null $art_catg_id
 * @property string|null $art_catg_name
 * @property int|null $role
 * @property int|null $parent_catg_id
 * @property string|null $menu_flag
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
            [['art_catg_id', 'role', 'parent_catg_id'], 'integer'],
            [['art_catg_name'], 'string', 'max' => 25],
            [['menu_flag'], 'string', 'max' => 1],
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
            'parent_catg_id' => 'Parent Catg ID',
            'menu_flag' => 'Menu Flag',
        ];
    }
}
