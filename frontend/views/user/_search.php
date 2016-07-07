<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
//use yii\jui\DatePicker;
use kartik\date\DatePicker;
use kartik\daterange\DateRangePicker;
use kartik\field\FieldRange;
?>
<div class="filtr">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
        <div class="filter_input_conteiner">

            <div class="filtr_fio_seocnd structure">
                <?= $form->field($model, 'login', ['inputOptions' => ['class' => 'input_filtr']])->textInput()->input('login', ['placeholder' => 'Поиск ID'])->label(false); ?>
            </div>
            <div class="filtr_fio_seocnd structure">
                <?= $form->field($model, 'lastname', ['inputOptions' => ['class' => 'input_filtr']])->textInput()->input('lastname', ['placeholder' => 'Фамилия'])->label(false); ?>
            </div>
            <div class="filtr_fio_seocnd structure">
                <?= $form->field($model, 'firstname', ['inputOptions' => ['class' => 'input_filtr']])->textInput()->input('firstname', ['placeholder' => 'Имя'])->label(false); ?>
            </div>
            <div class="filtr_fio_seocnd structure">
                <?= $form->field($model, 'secondname', ['inputOptions' => ['class' => 'input_filtr']])->textInput()->input('secondname', ['placeholder' => 'Отчество'])->label(false); ?>
            </div>
        </div>
        <div class="filter_button fl_l">
            <a href="<?= Url::toRoute(['/user/add']) ?>" class="button add_sotr">Добавить сотрудника</a>
        </div>
        <div class="filter_button fl_r">
            <?= Html::submitButton('Искать', ['class' => 'button search']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
