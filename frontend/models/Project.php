<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string|null $username
 * @property string $project_title
 * @property string $pabstract
 * @property string $judges
 * @property string $advocates
 * @property string $acts
 * @property string $citation
 * @property string $refrence
 * @property string $preceeding
 * @property string|null $disposition
 * @property string|null $bench
 * @property string|null $jurisdiction
 * @property string|null $searchtag
 * @property string|null $jcategory
 * @property string|null $jsubcategory
 * @property string|null $jlength
 * @property string $bibliography
 * @property string|null $overruled
 * @property string|null $completion_date
 * @property string|null $start_date
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
            [['completion_date', 'start_date'], 'safe'],
            [['username'], 'string', 'max' => 50],
            [['project_title', 'overruled'], 'string'],
            [['pabstract'], 'string'],
            [['judges', 'advocates', 'jlength'], 'string'],
            [['acts', 'preceeding', 'disposition', 'bench', 'jcategory', 'jsubcategory', 'bibliography'], 'string'],
            [['citation', 'refrence', 'jurisdiction', 'searchtag'], 'string'],
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
            'project_title' => 'Project Title',
            'pabstract' => 'Pabstract',
            'judges' => 'Judges',
            'advocates' => 'Advocates',
            'acts' => 'Acts',
            'citation' => 'Citation',
            'refrence' => 'Refrence',
            'preceeding' => 'Preceeding',
            'disposition' => 'Disposition',
            'bench' => 'Bench',
            'jurisdiction' => 'Jurisdiction',
            'searchtag' => 'Searchtag',
            'jcategory' => 'Jcategory',
            'jsubcategory' => 'Jsubcategory',
            'jlength' => 'Jlength',
            'bibliography' => 'Bibliography',
            'overruled' => 'Overruled',
            'completion_date' => 'Completion Date',
            'start_date' => 'Start Date',
        ];
    }
}
