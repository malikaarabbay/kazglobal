<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="content">
        <div class="cr">
            <div class="enter_reg_container">
                <div class="enter_form_container">
                    <div class="enter_form">
                        <div class="title">Если Вы уже зарегистрированы</div>
                        <p>Введите ID номер  и пароль</p>
                        <?php $form = ActiveForm::begin(['id' => 'login-form', 'action' => Url::toRoute('/site/login')]); ?>
                            <div class="input_enter_container">
                                <label for="id" class="id_chel"></label>
                                <?= $form->field($model, 'login', ['inputOptions' => ['class' => 'input_enter']])->textInput()->input('login', ['placeholder' => 'ID номер'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <label for="password" class="password"></label>
                                <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'input_enter']])->textInput()->input('password', ['placeholder' => 'Пароль'])->label(false); ?>
                                <?= Html::submitButton('Войти', ['class' => 'button enter_link', 'name' => 'login-button']) ?>
                                <a href="<?= Url::toRoute(['site/request-password-reset'])?>" class="restore_password">Забыли пароль?</a>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="register__link_container">
                    <div class="register__link">
                        <div class="title">Вы впервые на kazglobal.kz? </div>
                        <p>Чтобы продолжить, необходимо зарегистрироваться
                            (получить логин и пароль). Это бесплатно</p>
                        <a href="<?= Url::toRoute(['site/signup'])?>" class="button enter_link register_link">Зарегистрироваться</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
