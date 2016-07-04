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
use kartik\widgets\DatePicker;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
$this->title = 'Личный кабинет';
?>
<div class="container">
    <div class="content">
        <div class="cr">
            <aside>
                <ul class="side_bar_list">
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/index']) ?>" class="side_bar_list_item_link structure">Структура организации</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/balance']) ?>" class="side_bar_list_item_link balance">Баланс</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/history']) ?>" class="side_bar_list_item_link history">История операции</a></li>
                    <li class="side_bar_list_item"><a href="" class="side_bar_list_item_link project">Участие в проектах</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/settings']) ?>" class="side_bar_list_item_link settings">Настройки</a></li>
                    <li class="side_bar_list_item"><a href="" class="side_bar_list_item_link list">Участие в проектах</a></li>
                </ul>
            </aside>
            <div class="content_body">
                <div class="title">
                    <h1>Настройки</h1>
                </div>

                <?php if($user->status_id == 3) {?>
                <?php } else { ?>
                    <div class="nastroiki_body">
                        <?php $form = ActiveForm::begin(['id' => 'profile-form', 'action' => Url::toRoute('/user/index')]); ?>
                        <div class="nastroiki_registra_cabinet">
                            <p>Данные по удостоверению личности</p>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'lastname', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('lastname',  ['placeholder' => 'Фамилия', 'readonly' => true])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'firstname', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('firstname',  ['placeholder' => 'Имя', 'readonly' => true])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'secondname', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('secondname',  ['placeholder' => 'Отчество', 'readonly' => true])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'number_id', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('number_id',  ['placeholder' => '№ удостоверения личности'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'date_issue', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('date_issue',  ['placeholder' => 'Дата выдачи'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'date_validity', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('date_validity',  ['placeholder' => 'Срок действия'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'organ_issue', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('organ_issue',  ['placeholder' => 'Орган выдачи'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'iin', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('iin',  ['placeholder' => 'ИИН'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'phone', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('phone',  ['placeholder' => 'Контактный номер'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'email', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('email',  ['placeholder' => 'E-Mail'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'skype', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('skype',  ['placeholder' => 'Skype'])->label(false); ?>
                            </div>
                        </div>
                        <div class="nastroiki_registra_cabinet">
                            <p>Данные по заграничному паспорту</p>
                            <div class="input_enter_container">
                                <input class="input_registar"type="text" placeholder="Surname" />
                            </div>
                            <div class="input_enter_container">
                                <input class="input_registar"type="text" placeholder="Given names" />
                            </div>
                            <div class="input_enter_container">
                                <input class="input_registar"type="text" placeholder="Code of state" />
                            </div>
                            <div class="input_enter_container">
                                <input class="input_registar"type="text" placeholder="Type" />
                            </div>
                            <div class="input_enter_container">
                                <input class="input_registar"type="text" placeholder="Passport №" />
                            </div>
                            <div class="input_enter_container">
                                <input class="input_registar"type="text" placeholder="Nationflity" />
                            </div>
                            <div class="input_enter_container">
                                <input class="input_registar"type="text" placeholder="Date of birth" />
                            </div>
                            <div class="input_enter_container">
                                <input class="input_registar"type="text" placeholder="Date of issue" />
                            </div>
                            <div class="input_enter_container">
                                <input class="input_registar"type="text" placeholder="Date of expiry" />
                            </div>
                            <div class="input_enter_container">
                                <input class="input_registar"type="text" placeholder="Authority" />
                            </div>
                            <div class="input_enter_container">
                                <input class="input_registar"type="text" placeholder="ID №" />
                            </div>
                        </div>
                        <?= Html::submitButton('Сохранить изменения', ['class' => 'button ', 'name' => 'login-button']) ?>

                        <?php ActiveForm::end(); ?>
                        <?php } ?>
                    </div>
            </div>
        </div>
    </div>
</div>