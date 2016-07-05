<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use common\models\User;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('order', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('order', 'Create Order'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_login',
            'user_firstname',
            'user_lastname',
            'user_secondname',
            [
                'attribute' => 'service_id',
                'class' => 'yii\grid\DataColumn',
                'label' => 'Услуга',
                'value' => function ($data) {
                    return ($data->service_id) ? Yii::$app->params['orderService'][$data->service_id] : '';
                },
                'filter' => Yii::$app->params['orderService']
            ],
            [
                'attribute' => 'is_approved',
                'class' => 'yii\grid\DataColumn',
                'label' => 'Одобрение',
                'value' => function ($data) {
                    return ($data->is_approved) ? Yii::$app->params['approved'][$data->is_approved] : 'Не одобрено';
                },
                'filter' => Yii::$app->params['approved']
            ],
//            'id',
//            'user_name',
//            'user_email',
//            'user_phone',
//            'status_id',
//            'delivery_id',
//            'total_price',
            'created:datetime',
            //'user_id',
            //'delivery_price',
            // 'total_price',
            // 'status_id',
            // 'paid',
            // 'user_name',
            // 'user_email:email',
            // 'user_address',
            // 'delivery_address',
            // 'user_phone',
            // 'user_comment',
            // 'ip_address',
            // 'created',
            // 'updated',
            // 'discount',
            // 'admin_comment:ntext',

            [
                'header' => 'Действия',
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>

</div>
