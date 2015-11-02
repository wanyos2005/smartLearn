<?php

namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $username;
    public $email;
    public $profile;
    public $password;
    public $confirm_password;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['confirm_password', 'required'],
            ['password', 'string', 'min' => 6]
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {

        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->profile = $this->profile;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save())
                return $user;
        }
    }

    /**
     * @param SignUp $model user model
     * @return bool passwords match
     */
    public function passwordConfirm($model) {
        if ($ret = $model->confirm_password !== $model->password)
            $model->addError('confirm_password', 'Passwords do not match');

        return !$ret;
    }

}
