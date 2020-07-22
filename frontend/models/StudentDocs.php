<?php

namespace frontend\models;

use Yii; 

/**
 * This is the model class for table "student_docs".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $doc_tenth
 * @property string|null $doc_twelve
 * @property string|null $doc_id_proof
 * @property string|null $marksheet
 * @property string|null $passing_certificate
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

    /**s
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'string', 'max' => 50],
            [['doc_tenth', 'doc_twelve', 'doc_id_proof'], 'required'],
             [['doc_tenth','doc_twelve','doc_id_proof','marksheet', 'passing_certificate'], 'file', 'extensions' => 'pdf'],
            //[['doc_tenth', 'doc_twelve', 'doc_id_proof'], 'string', 'max' => 30],
            // [['marksheet', 'passing_certificate'], 'file','skipOnEmpty' => true],
             
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
            'marksheet' => 'Marksheet',
            'passing_certificate' => 'Passing Certificate',
        ];
    }
}
