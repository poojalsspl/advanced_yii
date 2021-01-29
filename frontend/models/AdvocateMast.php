<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "advocate_mast".
 *
 * @property int $adv_id
 * @property string|null $advocate_name
 * @property string|null $email_id
 * @property string|null $dob
 * @property string|null $gender
 * @property int|null $mobile
 * @property string|null $image
 * @property int|null $court_code
 * @property string|null $court_name
 * @property int|null $country_code
 * @property int|null $state_code
 * @property int|null $city_code
 * @property string|null $regs_numb
 * @property int|null $regs_year
 * @property int|null $qual_type
 * @property string|null $mkt_username
 * @property int|null $surv_status
 * @property string $crdt
 */
class AdvocateMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advocate_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dob', 'crdt'], 'safe'],
            [['mobile', 'court_code', 'country_code', 'state_code', 'city_code', 'regs_year', 'qual_type', 'surv_status'], 'integer'],
            [['advocate_name', 'court_name'], 'string', 'max' => 100],
            [['email_id', 'mkt_username'], 'string', 'max' => 50],
            [['gender'], 'string', 'max' => 1],
            //[['image'], 'string', 'max' => 200],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['regs_numb'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'adv_id' => 'Adv ID',
            'advocate_name' => 'Advocate Name',
            'email_id' => 'Email ID',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'mobile' => 'Mobile',
            'image' => 'Image',
            'court_code' => 'Court Code',
            'court_name' => 'Court Name',
            'country_code' => 'Country Code',
            'state_code' => 'State Code',
            'city_code' => 'City Code',
            'regs_numb' => 'Registration Number',
            'regs_year' => 'Registration Year',
            'qual_type' => 'Qualification Type',
            'mkt_username' => 'Mkt Username',
            'surv_status' => 'Survey Status',
            'crdt' => 'Crdt',
        ];
    }

    public function getCourtCode()
    {
        return $this->hasOne(CourtMast::className(), ['court_code' => 'court_code']);
    }

     public function upload()
    {
        if ($this->validate()) {
            $this->image->saveAs('uploads/survey_docs/advocate/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            return false;
        }
    }
}
