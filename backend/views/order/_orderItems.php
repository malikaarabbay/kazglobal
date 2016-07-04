<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\Sets */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="orderItems">
    <div class="row">
        <div class="col-sm-10">

            <?= $form->field($orderItemsModel, "product_id")->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'title'), ['options' => [$orderItemsModel->product_id => ['selected ' => true]]]) ?>

        </div>
        <div class="col-sm-2">

            <?= $form->field($orderItemsModel, "quantity")->Input('number', ['min' => '1', 'max' => '10', 'value' => $orderItemsModel->quantity ? $orderItemsModel->quantity : '1']) ?>

        </div>
    </div>
    <hr/>
    <div class="text-right">

        <?= $form->field($orderItemsModel, "order_id", ['template' => "{input}"])->Input('hidden', ['value' => $orderId]) ?>

        <?= Html::button(Yii::t('app', 'Cancel'), ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) ?>

        <?= Html::submitButton($orderItemsModel->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $orderItemsModel->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

</div>
<?php ActiveForm::end(); ?>

