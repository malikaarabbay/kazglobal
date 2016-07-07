<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use vova07\fileapi\behaviors\UploadBehavior;


/**
 * ContactForm is the model behind the contact form.
 */
class Profile extends Model
{
    public $firstname;
    public $lastname;
    public $secondname;
//    public $address;
    public $phone;
    public $photo;
   public $email;
   public $organ_issue;
   public $skype;
   public $number_id;
   public $date_issue;
   public $date_validity;
   public $iin;

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

            [['firstname','email', 'number_id', 'date_issue', 'date_validity', 'pass_issue', 'pass_validity', 'birthday', 'organ_issue', 'iin'], 'required'],
            [['birthday', 'pass_issue', 'pass_validity', 'date_issue', 'date_validity'], 'safe'],
            [['firstname', 'lastname', 'secondname', 'phone','photo', 'email', 'organ_issue', 'skype', 'pass_surname', 'pass_name', 'pass_state', 'organ_issue', 'skype', 'pass_type', 'pass_national', 'pass_authority'], 'string' ],
            [['number_id', 'iin', 'pass_number', 'pass_id'], 'integer' ],

            // email has to be a valid email address
            ['email', 'email'],

        ];
    }


    public function changeProfile()
    {

        if ($this->validate()) {
            $user = User::findOne(Yii::$app->user->id);
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->secondname = $this->secondname;
            $user->phone = $this->phone;
            $user->email = $this->email;
            $user->organ_issue = $this->organ_issue;
            $user->skype = $this->skype;
            $user->number_id = $this->number_id;
            $user->date_issue = Yii::$app->formatter->asTimestamp($this->date_issue);
            $user->date_validity = Yii::$app->formatter->asTimestamp($this->date_validity);
            $user->iin = $this->iin;

            $user->pass_surname = $this->pass_surname;
            $user->pass_name = $this->pass_name;
            $user->pass_state = $this->pass_state;
            $user->pass_type = $this->pass_type;
            $user->pass_number = $this->pass_number;
            $user->pass_national = $this->pass_national;
            $user->birthday = Yii::$app->formatter->asTimestamp($this->birthday);
            $user->pass_issue = Yii::$app->formatter->asTimestamp($this->pass_issue);
            $user->pass_validity = Yii::$app->formatter->asTimestamp($this->pass_validity);
            $user->pass_authority = $this->pass_authority;
            $user->pass_id = $this->pass_id;

            if($this->photo) {
                $user->photo = $this->photo;
            }
            
            $user = $user->save();
            return $user;
        }
        return null;
    }

    public function attributeLabels()
    {
        return [
            'photo' => 'Изменить фото',
            'username'=> 'Имя',

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

    public function behaviors()
    {
        return [
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'photo' => [
                        'path' => '@frontend/web/images',
                        'tempPath' => '@frontend/web/images',
                        'url' => Yii::getAlias('@frontendWebroot/images')
                    ],
                ]
            ],
        ];

    }





}
