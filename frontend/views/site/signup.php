<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
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
                <div class="title"><h1><?= Html::encode($this->title) ?></h1></div>

                    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'action' => Url::toRoute('/site/signup')]); ?>
                <div class="enter_form_container">
                    <div class="enter_form">

                        <p>Данные по удостоверению личности</p>

                        <div class="input_enter_container">
                            <?= $form->field($model, 'lastname', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('lastname',  ['placeholder' => 'Фамилия'])->label(false); ?>
                        </div>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'firstname', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('firstname',  ['placeholder' => 'Имя'])->label(false); ?>
                        </div>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'secondname', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('secondname',  ['placeholder' => 'Отчество'])->label(false); ?>
                        </div>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'number_id', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('number_id',  ['placeholder' => '№ удостоверения личности'])->label(false); ?>
                        </div>
                        <div class="input_enter_container">
                            <?=$form->field($model, 'date_issue')->widget(DatePicker::classname(), [
                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                'options' => ['value' => ($model->date_issue !== null) ? date("m.d.Y") : '', 'placeholder' => 'Дата выдачи'],
                                'pluginOptions' => [
                                    'format' => 'dd.mm.yyyy'
                                ],
                            ])->label(false) ?>
                        </div>
                        <div class="input_enter_container">
                            <?=$form->field($model, 'date_validity')->widget(DatePicker::classname(), [
                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                'options' => ['value' => ($model->date_validity !== null) ? date("m.d.Y") : '', 'placeholder' => 'Срок действия'],
                                'pluginOptions' => [
                                    'format' => 'dd.mm.yyyy'
                                ],
                            ])->label(false) ?>
                        </div>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'organ_issue', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('organ_issue',  ['placeholder' => 'Орган выдачи'])->label(false); ?>
                        </div>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'iin', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('iin',  ['placeholder' => 'ИИН'])->label(false); ?>
                        </div>
                    </div>
                </div>
                <div class="register__link_container">
                    <div class="register__link">
                        <p>Данные по заграничному паспорту</p>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'pass_surname', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_surname',  ['placeholder' => 'Surname'])->label(false); ?>
                        </div>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'pass_name', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_name',  ['placeholder' => 'Given names'])->label(false); ?>
                        </div>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'pass_state', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_state',  ['placeholder' => 'Code of state'])->label(false); ?>
                        </div>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'pass_type', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_type',  ['placeholder' => 'Type'])->label(false); ?>
                        </div>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'pass_number', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_number',  ['placeholder' => 'Passport №'])->label(false); ?>
                        </div>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'pass_national', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_national',  ['placeholder' => 'Nationflity'])->label(false); ?>
                        </div>
                        <div class="input_enter_container">
                            <?=$form->field($model, 'birthday')->widget(DatePicker::classname(), [
                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                'options' => ['value' => ($model->birthday !== null) ? date("m.d.Y") : '', 'placeholder' => 'Date of birth'],
                                'pluginOptions' => [
                                    'format' => 'dd.mm.yyyy'
                                ],
                            ])->label(false) ?>
                        </div>
                        <div class="input_enter_container">
                            <?=$form->field($model, 'pass_issue')->widget(DatePicker::classname(), [
                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                'options' => ['value' => ($model->pass_issue !== null) ? date("m.d.Y") : '', 'placeholder' => 'Date of issue'],
                                'pluginOptions' => [
                                    'format' => 'dd.mm.yyyy'
                                ],
                            ])->label(false) ?>
                        </div>
                        <div class="input_enter_container">
                            <?=$form->field($model, 'pass_validity')->widget(DatePicker::classname(), [
                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                'options' => ['value' => ($model->pass_validity !== null) ? date("m.d.Y") : '', 'placeholder' => 'Date of expiry'],
                                'pluginOptions' => [
                                    'format' => 'dd.mm.yyyy'
                                ],
                            ])->label(false) ?>
                        </div>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'pass_authority', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_authority',  ['placeholder' => 'Authority'])->label(false); ?>
                        </div>
                        <div class="input_enter_container">
                            <?= $form->field($model, 'pass_id', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('pass_id',  ['placeholder' => 'ID №'])->label(false); ?>
                        </div>
                    </div>
                </div>
                <div class="registr_form_button">
                    <div class="input_enter_container">
                        <?= $form->field($model, 'phone', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('phone',  ['placeholder' => 'Контактный номер'])->label(false); ?>
                    </div>
                    <div class="input_enter_container">
                        <?= $form->field($model, 'email', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('email',  ['placeholder' => 'E-Mail'])->label(false); ?>
                    </div>
                    <div class="input_enter_container">
                        <?= $form->field($model, 'skype', ['inputOptions' => ['class' => 'input_registar']])->textInput()->input('skype',  ['placeholder' => 'Skype'])->label(false); ?>
                    </div>
                </div>
                <div class="registr_button">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'button enter_link']) ?>
                </div>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
