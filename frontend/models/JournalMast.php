<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "journal_mast".
 *
 * @property int $journal_code
 * @property string $journal_name
 * @property string $shrt_name
 * @property string $pub_freq
 * @property string $remark
 * @property int $court_code
 * @property string $court_name
 * @property int $city_code
 * @property int $state_code
 * @property int $country_code
 *
 * @property JudgmentCitation[] $judgmentCitations
 */
class JournalMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['court_code', 'city_code', 'state_code', 'country_code'], 'integer'],
            [['journal_name'], 'string', 'max' => 25],
            [['shrt_name'], 'string', 'max' => 10],
            [['pub_freq'], 'string', 'max' => 20],
            [['remark'], 'string', 'max' => 150],
            [['court_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'journal_code' => 'Journal Code',
            'journal_name' => 'Journal Name',
            'shrt_name' => 'Shrt Name',
            'pub_freq' => 'Pub Freq',
            'remark' => 'Remark',
            'court_code' => 'Court Code',
            'court_name' => 'Court Name',
            'city_code' => 'City Code',
            'state_code' => 'State Code',
            'country_code' => 'Country Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJudgmentCitations()
    {
        return $this->hasMany(JudgmentCitation::className(), ['journal_code' => 'journal_code']);
    }
}
