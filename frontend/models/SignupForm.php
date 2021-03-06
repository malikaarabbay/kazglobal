<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $phone;
    public $city_id;
    public $password;
    public $passwordRepeat;
    public $firstname;
    public $lastname;
    public $secondname;
    public $parent_id;
    public $login;
    public $company_id;
    public $status_id;
    public $birthday;
    public $sex;
    public $activated;
    public $agreed;
    public $vk_id;
    public $fb_id;
    public $mr_id;
    public $ok_id;
    public $li_id;
    public $gg_id;
    public $tw_id;

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
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'on' => 'default'],
            ['email', 'email', 'on' => 'default'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['phone', 'string'],
            [['city_id', 'login', 'parent_id', 'company_id', 'status_id'], 'integer'],

            [['password','email', 'firstname', 'lastname', 'secondname', 'passwordRepeat'], 'required'],

            [['password'], 'string', 'min' => 6],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password'],

            ['password', 'string', 'min' => 6],
            [['phone', 'city_id', 'login', 'parent_id', 'company_id', 'status_id', 'organ_issue', 'skype', 'pass_surname', 'pass_name', 'pass_state', 'pass_type', 'pass_national', 'pass_authority', 'number_id', 'iin', 'pass_number', 'pass_id', 'birthday', 'pass_issue', 'pass_validity', 'date_issue', 'date_validity'], 'safe'],
            [['vk_id', 'fb_id', 'mr_id', 'gg_id', 'ok_id', 'li_id', 'tw_id'], 'safe'],
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
//            $user->scenario = 'default';
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->secondname = $this->secondname;
            $user->login = $this->login;
            $user->parent_id = $this->parent_id;
            $user->company_id = $this->company_id;
            $user->status_id = $this->status_id;
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

            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();
            return $user;
        }

        return null;
    }

    public function attributeLabels()
    {
        return [
            'firstname' => 'Имя:',
            'lastname' => 'Фамилия:',
            'secondname' => 'Отчество:',
            'login' => 'Логин:',
            'parent_id' => 'Куратор:',
            'company_id' => 'Компания:',
            'status_id' => 'Статус:',
            'email' => 'Email:',
            'phone' => 'Телефон:',
            'city_id' => 'Город:',
            'password' => 'Пароль:',
            'passwordRepeat' => 'Повтор пароля:',
        ];
    }

    public function scenarios()
    {
        return [
            'social' => ['firstname', 'lastname', 'email', 'sex', 'photo', 'birthday', 'activated'],
            'default' => ['firstname', 'lastname', 'secondname', 'login', 'parent_id', 'company_id', 'status_id', 'email', 'sex', 'photo', 'birthday', 'activated', 'phone', 'password', 'city_id', 'about', 'agreed', 'passwordRepeat', 'skype'],
        ];
    }

    public function signupSocial()
    {
        if ($this->validate()) {
            $user = new User();
            $user->scenario = 'social';
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->email = $this->email;
            $user->birthday = $this->birthday;
            $user->sex = $this->sex;
            $user->vk_id = $this->vk_id;
            $user->fb_id = $this->fb_id;
            $user->mr_id = $this->mr_id;
            $user->ok_id = $this->ok_id;
            $user->li_id = $this->li_id;
            $user->gg_id = $this->gg_id;
            $user->tw_id = $this->tw_id;
            $user->activated = 1;
            $user->setPassword($this->password);
            $user->generateAuthKey();

            $user->save();
            return $user;
        }

        return null;
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
