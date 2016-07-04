<?php

namespace frontend\models;

use Yii;
use common\models\User;
use vova07\fileapi\behaviors\UploadBehavior;
use yii\base\Model;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $secondname
 * @property string $phone
 * @property integer $city_id
 * @property string $email
 */
class ProfileSettings extends Model
{

    public $firstname;
    public $lastname;
    public $secondname;
    public $city_id;
    public $phone;
    public $email;
    public $photo;
    public $address;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id'], 'integer'],
            [['firstname', 'lastname', 'secondname', 'phone', 'email', 'photo', 'address'], 'string', 'max' => 255],
            [['phone'], 'filter', 'filter' => function ($value) {
                return str_replace(['-', ' ', '(', ')'], "", $value);
            }],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstname' => Yii::t('user', 'Firstname'),
            'lastname' => Yii::t('user', 'Lastname'),
            'secondname' => Yii::t('user', 'Secondname'),
            'phone' => Yii::t('user', 'Phone'),
            'city_id' => Yii::t('user', 'City ID'),
            'birthday' => Yii::t('user', 'Birthday'),
            'birthdayDay' => Yii::t('user', 'Birthday Day'),
            'about' => Yii::t('user', 'About'),
            'photo' => Yii::t('user', 'Photo'),
            'sex' => Yii::t('user', 'Sex'),
            'password' => Yii::t('user', 'New Password'),
            'passwordRepeat' => Yii::t('user', 'Password Repeat'),
            'email' => Yii::t('user', 'Email'),
            'address' => Yii::t('user', 'Address'),
        ];
    }



    public function scenarios()
    {
        return [
            'default' => ['firstname', 'lastname', 'secondname', 'email', 'phone', 'photo', 'address','city_id'],
        ];
    }



    public function saveSettings()
    {

        if ($this->validate()) {
            $user = User::findOne(Yii::$app->user->id);
            $user->setAttributes($this->attributes);
            $user = $user->save(false);
            return $user;
        }
        return null;
    }


}