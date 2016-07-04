<?php

namespace frontend\widgets;
use frontend\models\UserForm;
use Yii;
use common\models\User;
use yii\base\Widget;
use frontend\models\SignupForm;

class AddUserWidget extends Widget
{

    public function init()
    {
        parent::init();
        // current user company_id
        $user = Yii::$app->user->identity;
        $userCompanyId = $user->company_id;
        // generate login
        $lastInsertLogin = User::find()->orderBy('id desc')->limit(1)->one();
        $userLogin = $lastInsertLogin->login + 1;
        // generate pass
        $length = 10;
        $chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
        shuffle($chars);
        $password = implode(array_slice($chars, 0, $length));


        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup() && $model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('success', 'Сотрудник успешно добавлено! Уводомление отправлено на email.');
            }
        }

        echo $this->render('user', [
            'model' => $model,
            'userCompanyId' => $userCompanyId,
            'userLogin' => $userLogin,
            'password' => $password
        ]);


    }

}
