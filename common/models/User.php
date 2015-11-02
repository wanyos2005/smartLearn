<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use app\models\Conveniencies;
use app\modules\person\models\Person;
use app\modules\institutions\models\Institutions;
use app\modules\trainers\models\Trainers;
use yii\helpers\Html;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $profile
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * @property string $last_logged_in
 */
class User extends ActiveRecord implements IdentityInterface {

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email) {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * 
     * @return array user description
     */
    public function userDetails() {
        $user = new User;
        if (!Yii::$app->user->isGuest)
            return $user->loggedInDetails();

        if (empty($_GET['opnx']))
            $_GET['opnx'] = '';

        $url = self::sanitizeUrl(Yii::$app->urlManager->createUrl([Yii::$app->controller->id . '/' . Yii::$app->controller->action->id . self::getString($_GET)]));

        return [
            'name' => 'Guest',
            'dscptn' => Html::a('Sign In', ['/site/login'], ['class' => 'btn btn-default btn-flat', 'style' => 'font-weight: bold; background-color: inherit; border: none']) . '    ' . "<a class='btn btn-default btn-flat' style='font-weight: bold; background-color: inherit; border: none' href='$url'>Sign Up</a>"
        ];
    }

    /**
     * 
     * @return array user description
     */
    public function loggedInDetails() {
        switch ($profile = Yii::$app->user->identity->profile):
            case Conveniencies::student:
                if (is_object($detail = Person::returnPerson(Yii::$app->user->identity->id))) {
                    $name = Conveniencies::names($detail->fname, $detail->mname, $detail->lname);
                    $dsct = Conveniencies::capitalizeFirstLetter($profile) . ", $detail->cse_index, $detail->cse_yr";
                }
                break;

            case Conveniencies::institution:
                if (is_object($detail = Institutions::returnInstitution(Yii::$app->user->identity->id))) {
                    $name = Conveniencies::capitalizeFirstLetter($detail->inst_name);
                    $dsct = Conveniencies::capitalizeFirstLetter($profile) . ', ' . Conveniencies::capitalizeFirstLetter(Yii::$app->params['instTypes'][$detail->inst_type]);
                }
                break;

            case Conveniencies::trainer:
                if (is_object($detail = Trainers::returnTrainer(Yii::$app->user->identity->id))) {
                    $name = Conveniencies::capitalizeFirstLetter($detail->name);
                    $dsct = Conveniencies::capitalizeFirstLetter($profile);
                }
                break;

            default :
                $dsct = Html::a('User Rather Than Real Name?', ['site\login', 'id' => Yii::$app->user->identity->id, 'prvlg' => $profile]);
                break;
        endswitch;

        $name = empty($name) ? 'Unknown' : $name;
        $dsct = empty($dsct) ? Html::a('What is my Access Right?', ['site\login', 'id' => Yii::$app->user->identity->id, 'prvlg' => $profile]) : $dsct;

        return ['name' => $name, 'dscptn' => $dsct];
    }

    /**
     * 
     * @param array $gets `$_GET`
     * @return string action params in url
     */
    public static function getString($gets) {
        foreach ($gets as $get => $val)
            $_gets = ((empty($_gets) ? '?' : "$_gets&") . ("$get=$val"));

        return empty($_gets) ? '' : $_gets;
    }

    /**
     * 
     * @param strng $url url
     * @return string url
     */
    public static function sanitizeUrl($url) {
        return str_replace('/index.php', '', str_replace('/site/index', '', $url));
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                    'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

}
