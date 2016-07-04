<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="content">
        <div class="cr">
            <div class="enter_reg_container">
                <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

                    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'layout' => 'horizontal', 'action' => Url::toRoute('/site/signup')]); ?>

                        <?= $form->field($model, 'firstname') ?>
                        <?= $form->field($model, 'lastname') ?>
                        <?= $form->field($model, 'email') ?>
                        <?= $form->field($model, 'phone') ?>
                        <?= $form->field($model, 'password')->passwordInput() ?>
                        <?= $form->field($model, 'passwordRepeat')->passwordInput() ?>

                    <div class="form-group text-center">
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-info']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
