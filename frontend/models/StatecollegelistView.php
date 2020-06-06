<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "statecollegelist_view".
 *
 * @property int $total
 * @property string|null $state_name
 * @property string|null $shrt_name
 */
class StatecollegelistView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statecollegelist_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total'], 'integer'],
            [['state_name'], 'string', 'max' => 25],
            [['shrt_name'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'total' => 'Total',
            'state_name' => 'State Name',
            'shrt_name' => 'Shrt Name',
        ];
    }
}
