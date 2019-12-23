<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "judgment_citation".
 *
 * @property int $id
 * @property string $username
 * @property int $judgment_code
 * @property string $doc_id
 * @property int $journal_code
 * @property string $journal_name
 * @property string $shrt_name
 * @property string $judgment_date
 * @property string $citation
 * @property string $journal_year
 * @property string $journal_volume
 * @property int $journal_pno
 * @property string $exam_status
 */
class JudgmentCitation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_citation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code', 'journal_code', 'journal_pno'], 'integer'],
            [['judgment_date'], 'safe'],
            [['username'], 'string', 'max' => 50],
            [['doc_id'], 'string', 'max' => 40],
            [['journal_name'], 'string', 'max' => 25],
            [['shrt_name'], 'string', 'max' => 10],
            [['citation'], 'string', 'max' => 20],
            [['journal_year'], 'string', 'max' => 6],
            [['journal_volume'], 'string', 'max' => 2],
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
            'journal_code' => 'Journal Code',
            'journal_name' => 'Journal Name',
            'shrt_name' => 'Shrt Name',
            'judgment_date' => 'Judgment Date',
            'citation' => 'Citation',
            'journal_year' => 'Journal Year',
            'journal_volume' => 'Journal Volume',
            'journal_pno' => 'Journal Pno',
            'exam_status' => 'Exam Status',
        ];
    }
}
