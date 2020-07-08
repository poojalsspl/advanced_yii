<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_tags".
 *
 * @property int $id
 * @property string|null $doc_id
 * @property string|null $judgment_title
 * @property string|null $tag_name
 * @property int|null $tag_value
 */
class JudgmentTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_value'], 'integer'],
            [['doc_id'], 'string', 'max' => 40],
            [['judgment_title'], 'string', 'max' => 255],
            [['tag_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doc_id' => 'Doc ID',
            'judgment_title' => 'Judgment Title',
            'tag_name' => 'Tag Name',
            'tag_value' => 'Tag Value',
        ];
    }
}
