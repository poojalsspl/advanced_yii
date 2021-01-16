<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm1 extends Model
{
    public $username;
    public $password;
    //public $rememberMe = true;

    private $_student;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            //['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        //print_r($_user);
        if ($this->validate()) {
            return Yii::$app->student->login($this->getUser());
        }
        
        return false;
    }

    

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {

        if ($this->_student === null) {
            $this->_student = MktStudent::findByUsername($this->username);
        }

        return $this->_student;
    }

    

    public function SetStatus($id,$log_status){
        \Yii::$app->db->createCommand("UPDATE mkt_student SET log_status=:log_status WHERE id=:id")
        ->bindValue(':id', $id)
        ->bindValue(':log_status', $log_status)
        ->execute();

        return true;
    }
}
