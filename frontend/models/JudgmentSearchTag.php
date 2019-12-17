<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_search_tag".
 *
 * @property string $username
 * @property int $judgment_code
 * @property string $doc_id
 * @property string $search_tag
 * @property string $tag_name
 * @property int $tag_per
 * @property int $id
 */
class JudgmentSearchTag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_search_tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code'], 'required'],
            [['judgment_code', 'tag_per'], 'integer'],
            [['username', 'tag_name'], 'string', 'max' => 50],
            [['doc_id'], 'string', 'max' => 40],
            [['search_tag'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'judgment_code' => 'Judgment Code',
            'doc_id' => 'Doc ID',
            'search_tag' => 'Search Tag',
            'tag_name' => 'Tag Name',
            'tag_per' => 'Tag Per',
            'id' => 'ID',
        ];
    }
}
