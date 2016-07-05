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
                    <h1>Структура организации</h1>
                </div>

                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                <?php if($user->status_id == 3) {?>
                <?php } else { ?>
                    <?= $this->render('_search', ['model' => $searchModel]) ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'tableOptions' => [
                            'class' => 'operacy',
                            'border' => '1'
                        ],
                        'columns' => [
//                            ['class' => 'yii\grid\SerialColumn'],
                            'login',
                            'firstname',
                            'lastname',
                            'secondname',
                            [
                                'attribute' => 'status_id',
                                'class' => 'yii\grid\DataColumn',
                                'label' => 'Статус',
                                'value' => function ($data) {
                                    return ($data->statusSpec) ? $data->statusSpec->title : 'Без статуса';
                                },
//                                    'filter' => ArrayHelper::map(Status::find()->all(), 'id', 'title')
                            ],
                            [
                                'attribute' => 'parent_id',
                                'class' => 'yii\grid\DataColumn',
                                'label' => 'Куратор',
                                'value' => function ($data) {
                                    return ($data->parent) ? $data->parent->login : 'Без куратора';
                                },
//                                    'filter' => ArrayHelper::map(\common\models\User::find()->where(['id' => 'parent_id'])->all(), 'id', 'login')
                            ],
                        ],
                    ]); ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>