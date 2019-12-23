<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "judgment_ref".
 *
 * @property int $id
 * @property string $username
 * @property int $judgment_code
 * @property string $doc_id
 * @property string $judgment_title
 * @property int $judgment_code_ref
 * @property int $court_code
 * @property string $court_name
 * @property string $doc_id_ref
 * @property string $judgment_title_ref
 * @property int $court_code_ref
 * @property string $court_name_ref
 * @property string $flag
 * @property string $exam_status
 */
class JudgmentRef extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_ref';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code', 'judgment_code_ref', 'court_code', 'court_code_ref'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['doc_id', 'doc_id_ref'], 'string', 'max' => 40],
            [['judgment_title', 'judgment_title_ref'], 'string', 'max' => 255],
            [['court_name', 'court_name_ref', 'flag'], 'string', 'max' => 100],
            [['exam_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'judgment_code' => 'Judgment Code',
            'doc_id' => 'Doc ID',
            'judgment_title' => 'Judgment Title',
            'judgment_code_ref' => 'Judgment Code Ref',
            'court_code' => 'Court Code',
            'court_name' => 'Court Name',
            'doc_id_ref' => 'Doc Id Ref',
            'judgment_title_ref' => 'Judgment Title Ref',
            'court_code_ref' => 'Court Code Ref',
            'court_name_ref' => 'Court Name Ref',
            'flag' => 'Flag',
            'exam_status' => 'Exam Status',
        ];
    }
}
