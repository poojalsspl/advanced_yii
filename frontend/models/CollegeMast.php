<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "college_mast".
 *
 * @property string $college_code
 * @property string $college_name
 * @property int $total_students
 * @property int $city_code
 * @property string $city_name
 * @property int $state_code
 * @property string $state_name
 * @property int $country_code
 * @property string $country_name
 */
class CollegeMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $total;
    public static function tableName()
    {
        return 'college_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['college_code'], 'required'],
            [['total_students', 'city_code', 'state_code', 'country_code'], 'integer'],
            [['college_code'], 'string', 'max' => 4],
            [['college_name', 'city_name'], 'string', 'max' => 50],
            [['state_name', 'country_name'], 'string', 'max' => 25],
            [['college_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'college_code' => 'College Code',
            'college_name' => 'College Name',
            'total_students' => 'Total Students',
            'city_code' => 'City Code',
            'city_name' => 'City Name',
            'state_code' => 'State Code',
            'state_name' => 'State Name',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
        ];
    }

    public function getCollegeName($clg){
        $query = (new \yii\db\Query())
        ->select('college_name')
        ->from('college_mast')
        ->where('college_code=:college_code', [':college_code' => $clg]);

        $command = $query->createCommand();


        // Execute the command:
        $rows = $command->queryAll();
         return $rows[0]['college_name'];
     }
}
