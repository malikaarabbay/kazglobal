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
use common\models\User;

/* @var $this yii\web\View */
$this->title = 'Личный кабинет';
?>
<div class="containers">
    <div class="content">
        <div class="cr">
            <aside>
                <ul class="side_bar_list">
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/index']) ?>" class="side_bar_list_item_link structure">Структура организации</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/balance']) ?>" class="side_bar_list_item_link balance">Баланс</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/history']) ?>" class="side_bar_list_item_link history">История операции</a></li>
                    <li class="side_bar_list_item"><a href="" class="side_bar_list_item_link project">Участие в проектах</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/settings']) ?>" class="side_bar_list_item_link settings">Настройки</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/orders']) ?>" class="side_bar_list_item_link list">Список заявок</a></li>
                </ul>
            </aside>
            <div class="content_body">
                <div class="title">
                    <h1>Баланс</h1>
                    <div class="balance fl_r">
                        <?php if($user->status_id == 3) {?>
                        <?php } else { ?>
                            <div class="ostatok">Остаток: <?= $user->company->balance ?> KZT</div>
                            <!--                        <div class="bonus">Бонус: 12 500 KZT</div>-->
                        <?php } ?>
                    </div>
                </div>

                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                <?php if($user->status_id == 3) {?>
                <?php } else { ?>
                    <?= $this->render('_searchBalance', ['model' => $searchModel]) ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'tableOptions' => [
                            'class' => 'operacy',
                            'border' => '1'
                        ],
                        'columns' => [
//                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'user_id',
                                'class' => 'yii\grid\DataColumn',
                                'label' => 'Логин ID',
                                'value' => function ($data) {
                                    return ($data->user) ? $data->user->login : ' ';
                                },
                                'filter' => ArrayHelper::map(User::find()->all(), 'id', 'login')
                            ],
                            [
                                'attribute' => 'created',
                                'label' => 'Дата',
                                'format' =>  ['date', 'dd.MM.yyyy'],
//                                'options' => ['width' => '200']
                            ],
                            [
                                'attribute' => 'created',
                                'label' => 'Время',
                                'format' =>  ['time', 'HH:mm:ss'],
                            ],
                            [
                                'attribute' => 'user_id',
                                'class' => 'yii\grid\DataColumn',
                                'label' => 'Имя',
                                'value' => function ($data) {
                                    return ($data->user) ? $data->user->firstname : ' ';
                                },
                                'filter' => ArrayHelper::map(User::find()->all(), 'id', 'firstname')
                            ],
                            [
                                'attribute' => 'user_id',
                                'class' => 'yii\grid\DataColumn',
                                'label' => 'Фамилия',
                                'value' => function ($data) {
                                    return ($data->user) ? $data->user->lastname : ' ';
                                },
                                'filter' => ArrayHelper::map(User::find()->all(), 'id', 'lastname')
                            ],
                            [
                                'attribute' => 'user_id',
                                'class' => 'yii\grid\DataColumn',
                                'label' => 'Отчество',
                                'value' => function ($data) {
                                    return ($data->user) ? $data->user->secondname : ' ';
                                },
                                'filter' => ArrayHelper::map(User::find()->all(), 'id', 'secondname')
                            ],
                            [
                                'attribute' => 'service_id',
                                'class' => 'yii\grid\DataColumn',
                                'label' => 'Услуга',
                                'value' => function ($data) {
                                    return ($data->service_id) ? Yii::$app->params['orderService'][$data->service_id] : '';
                                },
                                'filter' => Yii::$app->params['orderService']
                            ],
                            'total_price',
                        ],
                    ]); ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>