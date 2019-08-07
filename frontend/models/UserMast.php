<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_mast".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $pan_no
 * @property string $gst_no
 * @property string $activation_date
 * @property string $exp_date
 * @property string $user_type
 * @property string $company_name
 * @property string $profession
 * @property string $no_of_laywers
 * @property string $practise_area
 * @property string $user_ip
 * @property string $gender
 * @property string $user_pic
 * @property string $sign_date
 * @property string $bar_reg_no
 * @property string $dob
 * @property string $mobile_1
 * @property string $mobile_2
 * @property string $landline_1
 * @property string $landline_2
 * @property string $fax
 * @property string $email
 * @property string $alt_email
 * @property string $grad_yr
 * @property string $practice_since
 * @property int $city_code
 * @property string $city_name
 * @property int $state_code
 * @property string $state_name
 * @property int $country_code
 * @property string $country_name
 * @property string $user_address
 * @property int $pin_code
 * @property int $status
 */
class UserMast extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_mast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_address', 'country_code', 'state_code','first_name', 'last_name', 'city_code','dob','gender', 'status'], 'required'],
            [['city_code', 'state_code', 'country_code', 'pin_code'], 'integer'],
            [['activation_date', 'exp_date', 'sign_date', 'dob', 'grad_yr', 'practice_since'], 'safe'],
           
            [['first_name', 'last_name', 'company_name', 'profession', 'city_name'], 'string', 'max' => 50],
            [['pan_no', 'gst_no', 'user_type', 'no_of_laywers', 'user_ip', 'state_name', 'country_name'], 'string', 'max' => 25],
            [['gender'], 'string', 'max' => 6],
            [['user_pic', 'email', 'alt_email', 'user_address'], 'string', 'max' => 255],
            [['bar_reg_no'], 'string', 'max' => 100],
            [['mobile_1', 'mobile_2'], 'string', 'max' => 12],
            [['landline_1', 'landline_2', 'fax'], 'string', 'max' => 16],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'pan_no' => 'Pan No',
            'gst_no' => 'Gst No',
            'activation_date' => 'Activation Date',
            'exp_date' => 'Exp Date',
            'user_type' => 'User Type',
            'company_name' => 'Company Name',
            'profession' => 'Profession',
            'no_of_laywers' => 'No Of Laywers',
            'practise_area' => 'Practise Area',
            'user_ip' => 'User Ip',
            'gender' => 'Gender',
            'user_pic' => 'User Pic',
            'sign_date' => 'Sign Date',
            'bar_reg_no' => 'Bar Reg No',
            'dob' => 'Dob',
            'mobile_1' => 'Mobile 1',
            'mobile_2' => 'Mobile 2',
            'landline_1' => 'Landline 1',
            'landline_2' => 'Landline 2',
            'fax' => 'Fax',
            'email' => 'Email',
            'alt_email' => 'Alt Email',
            'grad_yr' => 'Grad Yr',
            'practice_since' => 'Practice Since',
            'city_code' => 'City Code',
            'city_name' => 'City Name',
            'state_code' => 'State Code',
            'state_name' => 'State Name',
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'user_address' => 'User Address',
            'pin_code' => 'Pin Code',
            'status' => 'Status',
        ];
    }
}
