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



<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab_1" data-toggle="tab">Данные</a>
            </li>
            <!--            <li>-->
            <!--                <a href="#tab_2" data-toggle="tab">Изображении</a>-->
            <!--            </li>-->
            <li class="pull-right">
                <?= Html::submitButton('<span class="glyphicon glyphicon-ok"></span> '.Yii::t('app', 'Create'),['class' => 'btn btn-success']) ?>
            </li>
        </ul>
        <div class="tab-content">

            <div class="tab-pane active" id="tab_1">

                <div class="row">
                    <div class="col-md-8 col-xs-12">

                        <?= $form->field($model, 'parent_id')->dropDownList(ArrayHelper::map($users, 'id', 'firstname'),  ['prompt' => 'Без куратора']) ?>

                        <?= $form->field($model, 'login')->hiddenInput(['value' => $userLogin ])->label(false) ?>
                        
                        <?= $form->field($model, 'firstname')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'lastname')->textInput(['maxlength' => 255]) ?>
                        
                        <?= $form->field($model, 'secondname')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'password')->textInput(['value' => $password]) ?>

                        <?= $form->field($model, 'company_id')->dropDownList(ArrayHelper::map(Company::find()->all(), 'id', 'title'), ['prompt' => '- Выберите компанию -']) ?>

                        <?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map(Status::find()->all(), 'id', 'title'), ['prompt' => '- Выберите специализацию -']) ?>

                        <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['userStatus']) ?>

                    </div>
                </div>

            </div><!-- /.tab-pane -->

            <div class="tab-pane " id="tab_2">

            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div>

    <?php ActiveForm::end(); ?>

</div>

