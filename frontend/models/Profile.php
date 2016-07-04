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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['firstname','email'], 'required'],
            [['firstname', 'lastname', 'secondname', 'phone','photo', 'email', 'organ_issue', 'skype'], 'string' ],
            [['number_id', 'date_issue', 'date_validity', 'iin'], 'integer' ],

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
            $user->date_issue = $this->date_issue;
            $user->date_validity = $this->date_validity;
            $user->iin = $this->iin;

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
            'lastname' => Yii::t('profile', 'Lastname'),
            'firstname' => Yii::t('profile', 'Firstname'),
            'secondname' => Yii::t('profile', 'Secondname'),
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
