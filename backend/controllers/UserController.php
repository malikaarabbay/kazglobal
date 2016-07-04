<?php

namespace backend\controllers;

use backend\models\PasswordChangeForm;
use backend\models\Profile;
use backend\models\SignupForm;
use Yii;
use common\models\User;
use common\models\search\UserSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;


class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actions()
    {
        return [
            'fileapi-upload' => [
                'class' => FileAPIUpload::className(),
                'path' => '@frontend/web/images/'
            ]
        ];
    }


    public function actionIndex()
    {
        $searchModel = new UserSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $users = User::find()->where(['NOT IN', 'id', [1]])->andWhere(['NOT IN', 'status_id', [0,3]])->all();
        // generate login
        $lastInsertLogin = User::find()->orderBy('id desc')->limit(1)->one();
        $userLogin = $lastInsertLogin->login + 1;
        // generate pass
        $length = 10;
        $chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
        shuffle($chars);
        $password = implode(array_slice($chars, 0, $length));
        
        $model = new Profile();
        $model->scenario = 'default';
        

        if ($model->load(Yii::$app->request->post())) {

            if($this->checkEmail($model->email)){
                
                Yii::$app->getSession()->setFlash('error', 'Этот email занят');
                return $this->render('create', [
                    'model' => $model,
                    'users' => $users,
                    'userLogin' => $userLogin,
                    'password' => $password
                ]);
            }

            if ($user = $model->saveProfile() && $model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('success', 'Сотрудник успешно добавлено! Уводомление отправлено на email.');
                return $this->redirect(['user/index']);
            }
            return $this->redirect(['view', 'id' => $user->id]);

        } else {
            return $this->render('create', [
                'model' => $model,
                'users' => $users,
                'userLogin' => $userLogin,
                'password' => $password
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $user = $this->findModel($id);
        $users = User::find()->all();
        $passwordChangeForm = new PasswordChangeForm();
        $model = new Profile();
        $model->scenario = 'change';

        $model->firstname = $user->firstname;
        $model->lastname = $user->lastname;
        $model->email = $user->email;
        $model->role = $user->role;
        $model->status = $user->status;
        $model->status_id = $user->status_id;
        $model->parent_id = $user->parent_id;
        $model->company_id = $user->company_id;
        $model->login = $user->login;

        $currentEmail = $user->email;

        if ($model->load(Yii::$app->request->post())) {

            if($this->checkEmailForUpdate($currentEmail, $model->email)){
                Yii::$app->getSession()->setFlash('error', 'Этот email уже занят');
                return $this->render('update', [
                    'model' => $model,
                    'passwordChangeForm' => $passwordChangeForm,
                    'user' => $user,
                    'users' => $users
                ]);
            }

            if($model->changeProfile($id)){

                Yii::$app->getSession()->setFlash('success', 'Данные сохранены');
                return $this->redirect(['view', 'id' => $id]);
            } else {
                Yii::$app->getSession()->setFlash('error', 'Возникла ошибка');
                return $this->render('update', [
                    'model' => $model,
                    'passwordChangeForm' => $passwordChangeForm,
                    'user' => $user,
                    'users' => $users
                ]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
                'passwordChangeForm' => $passwordChangeForm,
                'user' => $user,
                'users' => $users
            ]);
        }
    }

    public function actionChangePassword()
    {
        $passwordChangeForm = new PasswordChangeForm();

        if ($passwordChangeForm->load(Yii::$app->request->post())) {
            if($passwordChangeForm->changePassword()) {
                Yii::$app->getSession()->setFlash('success', 'Пароль успешно изменен!');
                return $this->redirect(['view', 'id' => $passwordChangeForm->userid]);
            }
            else {
                Yii::$app->getSession()->setFlash('danger', 'Возникла ошибка!');
                return $this->redirect(['view', 'id' => $id]);
            }
        }

    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteImage($id){
        if($this->findModel($id)->deleteImage()){
            return $this->redirect(['update', 'id'=>$id]);
        }
    }

    public function checkEmail($email){
        $user = User::find()->where(['email' => $email])->one();
        if($user) {
            return true;
        } else {
            return false;
        }
    }

    public function  checkEmailForUpdate($oldEmail, $newEmail) {
        if($oldEmail == $newEmail){
            return false;
        }
        $user = User::find()->where(['email' => $newEmail])->one();

        if($user){
            return true;
        } else {
            return false;
        }
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
