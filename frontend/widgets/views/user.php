<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\City;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use common\models\User;
use common\models\Company;
use common\models\Status;
use vova07\fileapi\Widget as FileAPI;

?>
<div class="filtr">
    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'parent_id')->hiddenInput(['value' => Yii::$app->user->id ])->label(false) ?>

    <?= $form->field($model, 'login')->hiddenInput(['value' => $userLogin ])->label(false) ?>

    <div class="add_person_form">
        <div class=" add_preson">
            <?= $form->field($model, 'lastname', ['inputOptions' => ['class' => 'input_filtr']])->textInput()->input('lastname', ['placeholder' => 'Фамилия'])->label(false); ?>
        </div>
        <div class=" add_preson">
            <?= $form->field($model, 'firstname', ['inputOptions' => ['class' => 'input_filtr']])->textInput()->input('firstname', ['placeholder' => 'Имя'])->label(false); ?>
        </div>
        <div class=" add_preson">
            <?= $form->field($model, 'secondname', ['inputOptions' => ['class' => 'input_filtr']])->textInput()->input('secondname', ['placeholder' => 'Отчество'])->label(false); ?>
        </div>
        <div class=" add_preson">
            <?= $form->field($model, 'email', ['inputOptions' => ['class' => 'input_filtr']])->textInput()->input('email', ['placeholder' => 'E-mail'])->label(false); ?>
        </div>
    </div>

    <?= $form->field($model, 'password')->hiddenInput(['value' => $password ])->label(false) ?>

    <?= $form->field($model, 'passwordRepeat')->hiddenInput(['value' => $password ])->label(false) ?>

    <?= $form->field($model, 'company_id')->hiddenInput(['value' => $userCompanyId ])->label(false) ?>

    <?= $form->field($model, 'status_id')->hiddenInput(['value' => '3' ])->label(false) ?>

    <?= $form->field($model, 'status')->hiddenInput(['value' => '10' ])->label(false) ?>

    <div class="filter_button ">
        <?= Html::submitButton(Yii::t('app', 'Create'),['class' => 'button ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
