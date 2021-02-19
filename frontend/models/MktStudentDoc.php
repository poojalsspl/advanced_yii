<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "mkt_student_doc".
 *
 * @property int $std_id
 * @property string|null $help_name marksheet/degree
 * @property string $help_url
 * @property string $help_remark
 * @property int $sno
 */
class MktStudentDoc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mkt_student_doc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_id','sno'], 'integer'],
            [['help_url', 'help_remark'], 'required'],
            [['help_remark'], 'string'],
            [['help_name', 'help_url'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_id' => 'Std ID',
            'help_name' => 'Help Name',
            'help_url' => 'Help Url',
            'help_remark' => 'Help Remark',
            'sno' => 'S.Num',
        ];
    }
}
