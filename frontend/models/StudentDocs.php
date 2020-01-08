<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "student_docs".
 *
 * @property int $id
 * @property string $username
 * @property string $doc_tenth
 * @property string $doc_twelve
 * @property string $doc_id_proof
 */
class StudentDocs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_docs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'string', 'max' => 50],
            //[['doc_tenth', 'doc_twelve', 'doc_id_proof'], 'string', 'max' => 30],
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
            'doc_tenth' => 'Doc Tenth',
            'doc_twelve' => 'Doc Twelve',
            'doc_id_proof' => 'Doc Id Proof',
        ];
    }
}
