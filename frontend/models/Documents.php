<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property int $id
 * @property int $user_id
 * @property string $x_th
 * @property string $xii_th
 * @property string $id_proof
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
           // [['x_th', 'xii_th', 'id_proof'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'x_th' => 'X Th',
            'xii_th' => 'Xii Th',
            'id_proof' => 'Id Proof',
        ];
    }
}
