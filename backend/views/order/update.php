<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use \yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = Yii::t('order', 'Update Order') . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('order', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-xs-6">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
        <div class="col-xs-6">
            <h4>Товары</h4>
            <div class="orderProducts">

                <?php foreach ($model->orderItems as $key => $orderProduct): ?>

                    <div class="orderProduct orderProductId-<?= $orderProduct->id ?> bs-callout bs-callout-info">
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-sm-8">
                                <h4><?= Html::a($orderProduct->product->title, ['#'], ['class' => 'js-popup', 'data-target' => '#orderItemsModal', 'data-url' => Url::toRoute(['/order/update-item', 'orderId' => $model->id, 'id' => $orderProduct->id])]) ?></h4>
                            </div>
                            <div class="col-sm-2">
                                <h4><span class="label label-info"><?= $orderProduct->quantity ?> шт</span></h4>
                            </div>
                            <div class="col-sm-2">
                                <a class="close" href="<?= Url::toRoute(['/order/delete-item', 'orderId' => $model->id, 'id' => $orderProduct->id]) ?>"><span aria-hidden="true">×</span><span class="sr-only">Close</span></a>
                            </div>

                        </div>
                    </div>

                <?php endforeach ?>

            </div>

            <?= Html::submitButton(Yii::t('product', 'Create Product'), ['class' => 'btn btn-primary js-popup', 'data-target' => '#orderItemsModal', 'data-url' => Url::toRoute(['/order/add-item', 'orderId' => $model->id])]) ?>
        </div>
    </div>

    <?php Modal::begin([
        'id' => 'orderItemsModal',
        'header' => Yii::t('products', 'Products'),
        'size' => 'modal-md',
    ]); ?>

    <div class='modalContent'></div>

    <?php Modal::end(); ?>


</div>
