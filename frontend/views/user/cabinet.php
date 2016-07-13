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
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/cabinet']) ?>" class="side_bar_list_item_link structure">Личный кабинет</a></li>
                    <li class="side_bar_list_item"><a href="<?= Url::toRoute(['/user/settings']) ?>" class="side_bar_list_item_link settings">Настройки</a></li>
                </ul>
            </aside>
            <div class="content_body">
                <div class="title">
                    <h1>Личный кабинет</h1>
                </div>
                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                
            </div>
        </div>
    </div>
</div>