<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
//use yii\jui\DatePicker;
use kartik\date\DatePicker;
use kartik\daterange\DateRangePicker;
use kartik\field\FieldRange;

$user = Yii::$app->user->identity;
$id = $user->company_id;

?>
<div class="filtr">
    <?php $form = ActiveForm::begin([
        'action' => ['orders'],
        'method' => 'get',
    ]); ?>
        <div class="filter_input_conteiner">
            <div class="filtr_fio_seocnd">
                <?= $form->field($model, 'user_lastname', ['inputOptions' => ['class' => 'input_filtr']])->textInput()->input('user_lastname', ['placeholder' => 'Фамилия'])->label(false); ?>
            </div>
            <div class="filtr_fio_seocnd">
                <?= $form->field($model, 'user_firstname', ['inputOptions' => ['class' => 'input_filtr']])->textInput()->input('user_firstname', ['placeholder' => 'Имя'])->label(false); ?>
            </div>
            <div class="filtr_fio_seocnd">
                <?= $form->field($model, 'user_secondname', ['inputOptions' => ['class' => 'input_filtr']])->textInput()->input('user_secondname', ['placeholder' => 'Отчество'])->label(false); ?>
            </div>
        </div>
        <div class="filter_input_conteiner">
            <div class="filtr_fio_seocnd">
                <?= $form->field($model, 'user_login', ['inputOptions' => ['class' => 'input_filtr']])->textInput()->input('user_login', ['placeholder' => 'Поиск ID'])->label(false); ?>
            </div>
            <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'date_from',
                'attribute2' => 'date_to',
                'options' => ['placeholder' => 'Дата от'],
                'options2' => ['placeholder' => 'Дата до'],
                'type' => DatePicker::TYPE_RANGE,
                'separator' => '-',
                'pluginOptions' => [
//                    'todayHighlight' => 'true',
//                    'startDate' => 'today',
                    'format' => 'dd.mm.yyyy',
                    'autoclose' => true,
                ]
            ])?>
            <div class="filtr_fio_seocnd">
                <?= $form->field($model, 'service_id', ['inputOptions' => ['class' => 'input_filtr']])->dropDownList(Yii::$app->params['orderService'], ['prompt' => 'Выбирите услугу'])->label(false); ?>
            </div>
        </div>
        <div class="filter_button fl_r">
            <?= Html::submitButton('Искать', ['class' => 'button search']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
