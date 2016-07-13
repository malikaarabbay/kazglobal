<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use vova07\fileapi\Widget as FileAPI;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Text */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="text-form">

    <?php $form = ActiveForm::begin(); ?>

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

                        <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'value')->textInput(['maxlength' => 255]) ?>

                        <?= $form->field($model, 'text')->widget(Widget::className(), [
                            'settings' => [
                                'lang' => 'ru',
                                'minHeight' => 150,
//                                'imageUpload' => Url::to(['/site/image-upload']),
//                                'imageManagerJson' => Url::to(['/site/images-get']),
                                'plugins' => [
                                    'imagemanager'
                                ]
                            ]
                        ]); ?>


                    </div>
                </div>

            </div><!-- /.tab-pane -->

            <div class="tab-pane " id="tab_2">

            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div>

    <?php ActiveForm::end(); ?>

</div>
