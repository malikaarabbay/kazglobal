<?php

namespace frontend\controllers;

use common\models\Order;
use common\models\UserFormSearch;
use common\models\search\OrderFormSearch;
use common\models\search\OrderBalanceSearch;
use Faker\Provider\Company;
use frontend\models\PasswordChangeForm;
use frontend\models\ProfileSettings;
use Yii;
use frontend\models\ChangePasswordForm;
use common\models\User;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;
use frontend\models\Profile;
use common\models\search\UserSearch;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class UserController extends \yii\web\Controller
{

//    public $layout = 'default';

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Url::remember();
            return true;
        } else {
            return false;
        }
    }


    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $passwordModel = new ChangePasswordForm();
        $profileModel = new Profile();


        if ($profileModel->load(Yii::$app->request->post())) {
            if ($profileModel->changeProfile()) {
                Yii::$app->getSession()->setFlash('success', 'Данные успешно изменены!');
                return $this->redirect(['user/index']);
            }
            else {
                Yii::$app->getSession()->setFlash('danger', 'Возникла ошибка!');
            }
        }

        $user = User::findOne(['id' => Yii::$app->user->id]);
        $profileModel->setAttributes($user->attributes);
//        $orders = Order::find()->where(['user_id' => Yii::$app->user->id])->all();
//        $user = Yii::$app->user->identity;
//        $id = $user->company_id;
//        $downUsers = User::find()->where(['company_id' => $id])->andWhere(['NOT IN', 'id', [Yii::$app->user->id]])->andWhere(['NOT IN', 'status_id', [1]])->all();

        $searchModel = new UserFormSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'user' => $user,
            'profileModel' => $profileModel,
            'passwordModel' => $passwordModel,
//            'orders' => $orders,
//            'downUsers' => $downUsers
        ]);
    }

    public function actionHistory()
    {
        $this->layout = 'default';
      
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $user = User::findOne(['id' => Yii::$app->user->id]);
        $searchModel = new OrderFormSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('history', [
            'user' => $user,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionBalance()
    {
        $this->layout = 'default';
        
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $user = User::findOne(['id' => Yii::$app->user->id]);
        $searchModel = new OrderBalanceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('balance', [
            'user' => $user,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionAdd()
    {

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $user = User::findOne(['id' => Yii::$app->user->id]);

        return $this->render('add', [
            'user' => $user,
        ]);
    }

    public function actionOrders()
    {

        $this->layout = 'default';

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $user = User::findOne(['id' => Yii::$app->user->id]);
        $searchModel = new OrderFormSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('orders', [
            'user' => $user,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionSettings()
    {
        $this->layout = 'default';

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $user = User::findOne(['id' => Yii::$app->user->id]);
        
        $passwordModel = new ChangePasswordForm();
        $profileModel = new Profile();


        if ($profileModel->load(Yii::$app->request->post())) {
            if ($profileModel->changeProfile()) {
                Yii::$app->getSession()->setFlash('success', 'Данные успешно изменены!');
                return $this->redirect(['user/settings']);
            }
            else {
                Yii::$app->getSession()->setFlash('danger', 'Возникла ошибка!');
            }
        }
        $profileModel->setAttributes($user->attributes);
        
        return $this->render('settings', [
            'user' => $user,
            'profileModel' => $profileModel,
            'passwordModel' => $passwordModel,
        ]);
    }
    
    public function actionChangePassword()
    {
        $user = User::findOne(['id' => Yii::$app->user->id]);
        $model = new Profile();

        $passwordModel = new ChangePasswordForm();
        if ($passwordModel->load(Yii::$app->request->post())) {
            if ($passwordModel->changePassword()) {
                Yii::$app->getSession()->setFlash('success', 'Пароль успешно изменен!');
            }
            else {
                Yii::$app->getSession()->setFlash('danger', 'Возникла ошибка!');
            }
        }

        return $this->redirect('index');

    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Order::SCENARIO_ORDER;
        $model->is_approved = 1;
        $model->save();

        $company = \common\models\Company::findOne(['id' => $model->company_id]);
        $company->scenario = \common\models\Company::SCENARIO_BALANCE;
        $companyBalance = $company->balance - $model->total_price;
        $company->balance = $companyBalance;
        $company->save();


        return $this->redirect(['user/orders']);
    }

    public function actionCancel($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Order::SCENARIO_ORDER;
        $model->is_approved = 0;
        $model->save();

        return $this->redirect(['user/orders']);
    }

    public function actionCabinet()
    {

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $passwordModel = new ChangePasswordForm();
        $profileModel = new Profile();


        if ($profileModel->load(Yii::$app->request->post())) {
            if ($profileModel->changeProfile()) {
                Yii::$app->getSession()->setFlash('success', 'Данные успешно изменены!');
                return $this->redirect(['user/index']);
            }
            else {
                Yii::$app->getSession()->setFlash('danger', 'Возникла ошибка!');
            }
        }

        $user = User::findOne(['id' => Yii::$app->user->id]);
        $profileModel->setAttributes($user->attributes);

        $searchModel = new UserFormSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('cabinet', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'user' => $user,
            'profileModel' => $profileModel,
            'passwordModel' => $passwordModel,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actions()
    {
        return [
            'fileapi-upload' => [
                'class' => FileAPIUpload::className(),
                'path' => '@frontend/web/images/',
                'unique' => true,
            ],

        ];
    }

}