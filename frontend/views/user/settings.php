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
                    <?php if($user->status_id == 0) {?>
                        <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/cabinet']) ?>" class="side_bar_list_item_link structure">Личный кабинет</a></li>
                        <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/settings']) ?>" class="side_bar_list_item_link settings">Настройки</a></li>
                    <?php } else { ?>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/index']) ?>" class="side_bar_list_item_link structure">Структура организации</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/balance']) ?>" class="side_bar_list_item_link balance">Баланс</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/history']) ?>" class="side_bar_list_item_link history">История операции</a></li>
                    <li class="side_bar_list_item"><a href="" class="side_bar_list_item_link project">Участие в проектах</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/settings']) ?>" class="side_bar_list_item_link settings">Настройки</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/orders']) ?>" class="side_bar_list_item_link list">Список заявок</a></li>
                    <?php } ?>
                </ul>
            </aside>
            <div class="content_body">
                <div class="title">
                    <h1>Настройки</h1>
                </div>

                <?php if($user->status_id == 3) {?>
                <?php } else { ?>
                    <div class="row">
                        <?php $form = ActiveForm::begin(['id' => 'profile-form', 'action' => Url::toRoute('/user/index')]); ?>
                        <div class="col-xs-12 col-md-6">
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
                                <?=$form->field($profileModel, 'date_issue')->widget(DatePicker::classname(), [
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'options' => ['value' => ($profileModel->date_issue !== null) ? date("m.d.Y") : '', 'placeholder' => 'Дата выдачи'],
                                    'pluginOptions' => [
                                        'format' => 'dd.mm.yyyy'
                                    ],
                                ])->label(false) ?>
                            </div>
                            <div class="input_enter_container">
                                <?=$form->field($profileModel, 'date_validity')->widget(DatePicker::classname(), [
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'options' => ['value' => ($profileModel->date_validity !== null) ? date("m.d.Y") : '', 'placeholder' => 'Срок действия'],
                                    'pluginOptions' => [
                                        'format' => 'dd.mm.yyyy'
                                    ],
                                ])->label(false) ?>
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
                        <div class="col-xs-12 col-md-6">
                            <p>Данные по заграничному паспорту</p>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'pass_surname', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_surname',  ['placeholder' => 'Surname'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'pass_name', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_name',  ['placeholder' => 'Given names'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'pass_state', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_state',  ['placeholder' => 'Code of state'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'pass_type', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_type',  ['placeholder' => 'Type'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'pass_number', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_number',  ['placeholder' => 'Passport №'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'pass_national', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_national',  ['placeholder' => 'Nationflity'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?=$form->field($profileModel, 'birthday')->widget(DatePicker::classname(), [
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'options' => ['value' => ($profileModel->birthday !== null) ? date("m.d.Y") : '', 'placeholder' => 'Date of birth'],
                                    'pluginOptions' => [
                                        'format' => 'dd.mm.yyyy'
                                    ],
                                ])->label(false) ?>
                            </div>
                            <div class="input_enter_container">
                                <?=$form->field($profileModel, 'pass_issue')->widget(DatePicker::classname(), [
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'options' => ['value' => ($profileModel->pass_issue !== null) ? date("m.d.Y") : '', 'placeholder' => 'Date of issue'],
                                    'pluginOptions' => [
                                        'format' => 'dd.mm.yyyy'
                                    ],
                                ])->label(false) ?>
                            </div>
                            <div class="input_enter_container">
                                <?=$form->field($profileModel, 'pass_validity')->widget(DatePicker::classname(), [
                                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                    'options' => ['value' => ($profileModel->pass_validity !== null) ? date("m.d.Y") : '', 'placeholder' => 'Date of expiry'],
                                    'pluginOptions' => [
                                        'format' => 'dd.mm.yyyy'
                                    ],
                                ])->label(false) ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'pass_authority', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_authority',  ['placeholder' => 'Authority'])->label(false); ?>
                            </div>
                            <div class="input_enter_container">
                                <?= $form->field($profileModel, 'pass_id', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_id',  ['placeholder' => 'ID №'])->label(false); ?>
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