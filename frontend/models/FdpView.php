<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "fdp_view".
 *
 * @property int $judgment_code
 * @property string|null $username
 * @property string|null $jad_username
 * @property string|null $jj_username
 * @property string|null $jc_username
 * @property string|null $jp_username
 * @property string|null $jr_username
 */
class FdpView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fdp_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgment_code'], 'integer'],
            [['username', 'jad_username', 'jj_username', 'jc_username', 'jp_username', 'jr_username'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'judgment_code' => 'Judgment Code',
            'username' => 'Username',
            'jad_username' => 'Jad Username',
            'jj_username' => 'Jj Username',
            'jc_username' => 'Jc Username',
            'jp_username' => 'Jp Username',
            'jr_username' => 'Jr Username',
        ];
    }
}
