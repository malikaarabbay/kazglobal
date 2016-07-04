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

    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'parent_id')->hiddenInput(['value' => Yii::$app->user->id ])->label(false) ?>

    <?= $form->field($model, 'login')->hiddenInput(['value' => $userLogin ])->label(false) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'secondname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'password')->hiddenInput(['value' => $password ])->label(false) ?>

    <?= $form->field($model, 'passwordRepeat')->hiddenInput(['value' => $password ])->label(false) ?>

    <?= $form->field($model, 'company_id')->hiddenInput(['value' => $userCompanyId ])->label(false) ?>

    <?= $form->field($model, 'status_id')->hiddenInput(['value' => '3' ])->label(false) ?>

    <?= $form->field($model, 'status')->hiddenInput(['value' => '10' ])->label(false) ?>

    <?= Html::submitButton(Yii::t('app', 'Create'),['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>