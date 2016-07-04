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
<div class="container">
    <div class="content">
        <div class="cr">
            <aside>
                <ul class="side_bar_list">
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/index']) ?>" class="side_bar_list_item_link structure">Структура организации</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/balance']) ?>" class="side_bar_list_item_link balance">Баланс</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/history']) ?>" class="side_bar_list_item_link history">История операции</a></li>
                    <li class="side_bar_list_item"><a href="" class="side_bar_list_item_link project">Участие в проектах</a></li>
                    <li class="side_bar_list_item"><a href="" class="side_bar_list_item_link settings">Настройки</a></li>
                    <li class="side_bar_list_item"><a href="" class="side_bar_list_item_link list">Участие в проектах</a></li>
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

                <?php } ?>
            </div>
        </div>
    </div>
</div>