<?php
use yii\helpers\Html;
use himiklab\thumbnail\EasyThumbnailImage;
use \yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\City;
use \yii\widgets\Breadcrumbs;
use frontend\widgets\AddUserWidget;
use yii\grid\GridView;
use vova07\fileapi\Widget as FileAPI;
use common\models\Company;
use common\models\Status;


/* @var $this yii\web\View */
$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="def-border"></div>
            <div class="breadcrumbs"><?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?></div>
            <h1>Добро пожаловать <?= $user->firstname ?> <?= $user->lastname ?> <?= $user->secondname ?>!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-stacked nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#struct" aria-controls="struct" role="tab" data-toggle="tab">Структура организации</a></li>
                <li role="presentation"><a href="#add" aria-controls="add" role="tab" data-toggle="tab">Добавить сотрудника</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Настройки</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Список заявок</a></li>
<!--                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->
            </ul>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="struct">
                    <div class="personal-info">
                        <h3>Структура организации</h3>
                        <?php if($user->status_id == 3) {?>
                        <?php } else { ?>
                        <?= $this->render('_search', ['model' => $searchModel]) ?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'tableOptions'=>['class'=>'operacy'],
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'login',
                                'firstname',
                                'lastname',
                                'secondname',
                                [
                                    'attribute' => 'status_id',
                                    'class' => 'yii\grid\DataColumn',
                                    'label' => 'Статус',
                                    'value' => function ($data) {
                                        return ($data->statusSpec) ? $data->statusSpec->title : 'Без статуса';
                                    },
//                                    'filter' => ArrayHelper::map(Status::find()->all(), 'id', 'title')
                                ],
                                [
                                    'attribute' => 'parent_id',
                                    'class' => 'yii\grid\DataColumn',
                                    'label' => 'Куратор',
                                    'value' => function ($data) {
                                        return ($data->parent) ? $data->parent->login : 'Без куратора';
                                    },
//                                    'filter' => ArrayHelper::map(\common\models\User::find()->where(['id' => 'parent_id'])->all(), 'id', 'login')
                                ],
                            ],
                        ]); ?>
                        <?php } ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="add">
                    <div class="personal-info">
                        <h3>Добавить сотрудника</h3>
                        <?php if($user->status_id == 3) {?>
                        <?php } else { ?>
                        <?= AddUserWidget::widget() ?>
                        <?php } ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <div class="personal-info">
                        <h3>Настройки</h3>
                        <div class="row">

                        <?php $form = ActiveForm::begin(['id' => 'profile-form', 'action' => Url::toRoute('/user/index')]); ?>

                        <div class="col-xs-12 col-md-6">

                            <div class="title">Имя</div>
                            <div class="form-group">
                                <?= $form->field($profileModel, 'firstname')->textInput(['readonly' => true])->label(false) ?>
                            </div>

                            <div class="title">Фамилия</div>
                            <div class="form-group">
                                <?= $form->field($profileModel, 'lastname')->textInput(['readonly' => true])->label(false) ?>
                            </div>

                            <div class="title">Отчество</div>
                            <div class="form-group">
                                <?= $form->field($profileModel, 'secondname')->textInput(['readonly' => true])->label(false) ?>
                            </div>

                            <div class="title">№ удостоверения личности</div>
                            <div class="form-group">
                                <?= $form->field($profileModel, 'number_id')->textInput()->label(false) ?>
                            </div>

                            <div class="title">Дата выдачи</div>
                            <div class="form-group">
                                <?= $form->field($profileModel, 'date_issue')->textInput()->label(false) ?>
                            </div>

                            <div class="title">Срок действия</div>
                            <div class="form-group">
                                <?= $form->field($profileModel, 'date_validity')->textInput()->label(false) ?>
                            </div>

                            <div class="title">Орган выдачи</div>
                            <div class="form-group">
                                <?= $form->field($profileModel, 'organ_issue')->textInput()->label(false) ?>
                            </div>

                            <div class="title">ИИН</div>
                            <div class="form-group">
                                <?= $form->field($profileModel, 'iin')->textInput()->label(false) ?>
                            </div>

                            <div class="title">Контактный номер</div>
                            <div class="form-group">
                                <?= $form->field($profileModel, 'phone')->textInput(['value' => $user->phone ])->label(false) ?>
                            </div>

                            <div class="title">E-Mail</div>
                            <div class="form-group">
                                <?= $form->field($profileModel, 'email')->textInput(['value' => $user->email ])->label(false) ?>
                            </div>

                            <div class="title">Skype</div>
                            <div class="form-group">
                                <?= $form->field($profileModel, 'skype')->textInput()->label(false) ?>
                            </div>

                            <div class="form-group" >
                                <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-default send-commit pull-left', 'name' => 'login-button']) ?>
                            </div>

                        </div>
                        <div class="col-xs-12 col-md-6">

                        </div>

                        <?php ActiveForm::end(); ?>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
<!--                        <h3>Сменить пароль</h3>-->
<!---->
<!--                        --><?php //$form = ActiveForm::begin(['id' => 'change-pass-form', 'action' => Url::toRoute('/user/change-password')]); ?>
<!--                        <!--                        -->--><?php ////$form = ActiveForm::begin(['id' => 'change-pass-form']); ?>
<!---->
<!--                        <div class="cabinet-title-1">Введите новый пароль</div>-->
<!--                        <div class="form-group">-->
<!--                            --><?//= $form->field($passwordModel, 'password', ['inputOptions' => ['class' => 'form-control col-xs-10']])->passwordInput()->label(false) ?>
<!--                        </div>-->
<!---->
<!--                        <div class="cabinet-title-1">Повторите пароль</div>-->
<!---->
<!--                        <div class="form-group">-->
<!--                            --><?//= $form->field($passwordModel, 'repeatPassword', ['inputOptions' => ['class' => 'form-control col-xs-10']])->passwordInput()->label(false) ?>
<!--                        </div>-->
<!--                        <div class="form-group" >-->
<!--                            --><?//= Html::submitButton('Сохранить', ['class' => 'btn btn-default send-commit pull-right bottom-btn']) ?>
<!--                        </div>-->
<!--                        --><?php //ActiveForm::end(); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages">
                    <div class="personal-info">
                        <h3>Список заявок</h3>

                    </div>
                </div>
                <!--                <div role="tabpanel" class="tab-pane" id="settings">...</div>-->
            </div>
        </div>
    </div>
</div>