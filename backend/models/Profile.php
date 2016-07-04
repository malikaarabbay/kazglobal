<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;


class Profile extends Model
{
    public $firstname;
    public $lastname;
    public $secondname;
    public $email;
    public $password;
    public $role;
    public $status_id;
    public $status;
    public $parent_id;
    public $company_id;
    public $login;

    public function rules()
    {
        return [

            [['firstname', 'lastname','email'], 'required'],
            [['password'], 'required', 'on' => 'default'],
            [['firstname', 'lastname', 'password'], 'string' ],
            [['role','status', 'parent_id', 'status_id', 'company_id', 'login'], 'integer' ],

            // email has to be a valid email address
            ['email', 'email'],

        ];
    }

    public function scenarios()
    {
        return [
            'default' => ['parent_id', 'login', 'status_id', 'company_id', 'firstname', 'lastname', 'secondname', 'email', 'status', 'role' ,'password'],
            'change' => ['parent_id', 'login', 'status_id', 'company_id', 'firstname', 'lastname', 'secondname', 'email', 'status','role'],
        ];
    }


    public function saveProfile(){
        if ($this->validate()) {
            $user = new User();
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->secondname = $this->secondname;
            $user->email = $this->email;
            $user->role = $this->role;
            $user->status_id = $this->status_id;
            $user->company_id = $this->company_id;
            $user->status = $this->status;
            $user->parent_id = $this->parent_id;
            $user->login = $this->login;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();
            return $user;
        }
        return null;
    }

    public function changeProfile($id)
    {
        if ($this->validate()) {
            $user = User::findOne($id);
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->secondname = $this->secondname;
            $user->email = $this->email;
            $user->role = $this->role;
            $user->status_id = $this->status_id;
            $user->company_id = $this->company_id;
            $user->status = $this->status;
            $user->parent_id = $this->parent_id;
            $user->login = $this->login;
            if($user->save()){
                return true;
            }
            return false;
        }
        return false;
    }

    public function attributeLabels()
    {
        return [
            'photo' => Yii::t('app', 'Change photo'),
            'lastname' => Yii::t('app', 'Lastname'),
            'firstname' => Yii::t('app', 'Firstname'),
            'secondname' => Yii::t('app', 'Secondname'),
            'password' => Yii::t('app', 'Password'),
            'role' => Yii::t('app', 'Role'),
            'status_id' => Yii::t('app', 'Status ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'login' => Yii::t('app', 'Log In'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function sendEmail($email)
    {
        return \Yii::$app->mailer->compose('userForm', [
            'subject' => "Регистрация на сайте kazglobal.kz",
            'body' => "Ваш логин и пароль"
        ])
            ->setFrom(["info@astanacreative.kz" => "kazglobal.kz"])
            ->setSubject('Новая заявка на сайте kazglobal.kz')
            ->setTo($email)
            ->send();
    }

}
