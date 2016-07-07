<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * ContactForm is the model behind the contact form.
 */
class UserForm extends Model
{
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $role;
    public $status_id;
    public $status;
    public $parent_id;
    public $company_id;
    public $login;

    public $phone;
    public $number_id;
    public $date_issue;
    public $date_validity;
    public $organ_issue;
    public $iin;
    public $skype;

    public $pass_surname;
    public $pass_name;
    public $pass_state;
    public $pass_type;
    public $pass_number;
    public $pass_national;
    public $birthday;
    public $pass_issue;
    public $pass_validity;
    public $pass_authority;
    public $pass_id;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname','email'], 'required'],
            [['birthday', 'pass_issue', 'pass_validity', 'date_issue', 'date_validity'], 'safe'],
            [['password'], 'required', 'on' => 'default'],
            [['firstname', 'lastname', 'password', 'pass_surname', 'pass_name', 'pass_state', 'organ_issue', 'skype', 'pass_type', 'pass_national', 'pass_authority', 'phone'], 'string' ],
            [['role','status', 'parent_id', 'status_id', 'company_id', 'login', 'number_id', 'iin', 'pass_number', 'pass_id'], 'integer' ],

            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'photo' => Yii::t('app', 'Change photo'),
            'lastname' => Yii::t('app', 'Lastname'),
            'firstname' => Yii::t('app', 'Firstname'),
            'password' => Yii::t('app', 'Password'),
            'role' => Yii::t('app', 'Role'),
            'status_id' => Yii::t('app', 'Status ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'status' => Yii::t('app', 'Status'),
            'login' => Yii::t('app', 'Login'),

            'number_id' => Yii::t('app', '№ удостоверения личности'),
            'date_issue' => Yii::t('app', 'Дата выдачи'),
            'date_validity' => Yii::t('app', 'Дата действия'),
            'organ_issue' => Yii::t('app', 'Орган выдачи'),
            'iin' => Yii::t('app', 'ИИН'),
            'phone' => Yii::t('app', 'Контактный номер'),
            'email' => Yii::t('app', 'Email'),
            'skype' => Yii::t('app', 'Skype'),

            'pass_surname' => Yii::t('app', 'Surname'),
            'pass_name' => Yii::t('app', 'Given names'),
            'pass_state' => Yii::t('app', 'Code of state'),
            'pass_type' => Yii::t('app', 'Type'),
            'pass_number' => Yii::t('app', 'Passport №'),
            'pass_national' => Yii::t('app', 'Nationality'),
            'birthday' => Yii::t('app', 'Date of birth'),
            'pass_issue' => Yii::t('app', 'Date of issue'),
            'pass_validity' => Yii::t('app', 'Date of expiry'),
            'pass_authority' => Yii::t('app', 'Authority'),
            'pass_id' => Yii::t('app', 'ID №'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom(['admin@greengo.kz' => $this->firstname])
            ->setSubject($this->subject)
            ->setTextBody($this->phone.' '.$this->body)
            ->send();
    }
}
