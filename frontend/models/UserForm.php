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


    /**
     * @inheritdoc
     */
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
