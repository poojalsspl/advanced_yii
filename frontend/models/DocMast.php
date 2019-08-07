<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doc_mast".
 *
 * @property string $doc_numb
 * @property string $doc_name
 * @property string $doc_title
 * @property string $doc_url
 * @property string $doc_date
 * @property int $doc_yyyy
 * @property int $doc_catg_code
 * @property string $doc_catg_name
 * @property int $doc_subcatg_code
 * @property string $doc_subcatg_name
 * @property string $doc_abstract
 */
class DocMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doc_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doc_date'], 'safe'],
            [['doc_yyyy', 'doc_catg_code', 'doc_subcatg_code'], 'integer'],
            [['doc_numb'], 'string', 'max' => 9],
            [['doc_name', 'doc_catg_name', 'doc_subcatg_name'], 'string', 'max' => 50],
            [['doc_title', 'doc_url', 'doc_abstract'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'doc_numb' => 'Doc Numb',
            'doc_name' => 'Doc Name',
            'doc_title' => 'Doc Title',
            'doc_url' => 'Doc Url',
            'doc_date' => 'Doc Date',
            'doc_yyyy' => 'Doc Yyyy',
            'doc_catg_code' => 'Doc Catg Code',
            'doc_catg_name' => 'Doc Catg Name',
            'doc_subcatg_code' => 'Doc Subcatg Code',
            'doc_subcatg_name' => 'Doc Subcatg Name',
            'doc_abstract' => 'Doc Abstract',
        ];
    }
}
