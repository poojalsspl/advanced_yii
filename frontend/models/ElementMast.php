<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "element_mast".
 *
 * @property string $element_code
 * @property string $element_name
 * @property string $element_type
 */
class ElementMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'element_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['element_code'], 'string', 'max' => 2],
            [['element_name'], 'string'],
            [['element_type'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'element_code' => 'Element Code',
            'element_name' => 'Element Name',
            'element_type' => 'Element Type',
        ];
    }

     public function getElementCode($element){
        $query = (new \yii\db\Query())
        ->select('element_code')
        ->from('element_mast')
        ->where('element_name=:element_name', [':element_name' => $element]);

        $command = $query->createCommand();


        // Execute the command:
        $rows = $command->queryAll();
        
         return $rows[0]['element_code'];
     }


}
