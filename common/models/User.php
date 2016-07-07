<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    public $password;

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created', 'updated'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated'],
                ],
            ],
        ];
    }

    public function rules()
    {
        return [
            [['password', 'pass_surname', 'pass_name', 'pass_state', 'organ_issue', 'skype', 'pass_type', 'pass_national', 'pass_authority'], 'string'],
            [['birthday', 'pass_issue', 'pass_validity', 'date_issue', 'date_validity'], 'safe'],
            [['role', 'parent_id', 'status_id', 'company_id', 'login', 'pass_number', 'pass_id'], 'integer'],
            [['activated', 'sex'], 'boolean'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }


    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityLogin($login)
    {
        return static::findOne(['login' => $login, 'status' => self::STATUS_ACTIVE]);
    }
    
    public function random_string($length)
        {
            // we are using only this characters/numbers in the string generation
        $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $string =''; // define variable with empty value
            // we generate a random integer first, then we are getting corresponding character , then append the character to $string variable. we are repeating this cycle until it reaches the given length
        for($i=0;$i<$length; $i++)
        {
        $string .= $chars[rand(0,strlen($chars)-1)];
        
        }
        return $string ; // return the final string
        }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }


    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }


    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }


    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }


    public function scenarios()
    {
        return [
            'social' => ['firstname', 'lastname', 'email', 'sex', 'photo', 'birthday', 'fb_id', 'vk_id', 'gg_id', 'li_id', 'mr_id', 'tw_id', 'ok_id', 'activated'],
            'default' => ['parent_id', 'company_id', 'status_id', 'login', 'firstname', 'lastname', 'secondname', 'email', 'sex', 'photo', 'birthday', 'activated', 'phone', 'password', 'city_id', 'about', 'pass_surname', 'pass_name', 'pass_state', 'organ_issue', 'skype', 'pass_type', 'pass_national', 'pass_authority'],
        ];
    }
    

    public function getId()
    {
        return $this->getPrimaryKey();
    }


    public function getAuthKey()
    {
        return $this->auth_key;
    }


    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }


    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }


    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }


    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }


    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }


    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'login' => Yii::t('app', 'Log In'),
            'firstname' => Yii::t('app', 'Firstname'),
            'password' => Yii::t('app', 'Password'),
            'lastname' => Yii::t('app', 'Lastname'),
            'secondname' => Yii::t('app', 'Secondname'),
            'phone' => Yii::t('app', 'Phone'),
            'city_id' => Yii::t('app', 'City ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'status_id' => Yii::t('app', 'Status ID'),
            'birthday' => Yii::t('app', 'Birthday'),
            'BirthdayDay' => Yii::t('app', 'Birthday'),
            'BirthdayMonth' => Yii::t('app', 'Birthday'),
            'BirthdayYear' => Yii::t('app', 'Birthday'),
            'photo' => Yii::t('app', 'Photo'),
            'about' => Yii::t('app', 'About'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'role' => Yii::t('app', 'Role'),
            'views' => Yii::t('app', 'Views'),
            'activated' => Yii::t('app', 'Activated'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(),['id' => 'company_id']);
    }

    public function getParent()
    {
        return $this->hasOne(User::className(),['id' => 'parent_id']);
    }

    public function getStatusSpec()
    {
        return $this->hasOne(Status::className(),['id' => 'status_id']);
    }

}
