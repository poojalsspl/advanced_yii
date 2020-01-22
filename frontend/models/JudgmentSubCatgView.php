<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "judgment_sub_catg_view".
 *
 * @property int $tot
 * @property string|null $username
 * @property int|null $jsub_catg_id
 * @property string|null $jsub_catg_description
 */
class JudgmentSubCatgView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgment_sub_catg_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tot', 'jsub_catg_id'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['jsub_catg_description'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tot' => 'Tot',
            'username' => 'Username',
            'jsub_catg_id' => 'Jsub Catg ID',
            'jsub_catg_description' => 'Jsub Catg Description',
        ];
    }
}
