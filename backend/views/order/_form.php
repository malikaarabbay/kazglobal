<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\DeliveryMethod;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_firstname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'user_lastname')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'user_secondname')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
