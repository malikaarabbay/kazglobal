<?php
/* @var $this yii\web\View */
$this->title = 'KazGlobal';
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\widgets\NewsWidget;
use tugmaks\RssFeed\RssReader;
use common\models\Text;
?>
<div class="container">
    <div class="big_img"></div>
    <div class="cr">
        <div class="center_button">
            <a href="" class="button air">Авиабилеты</a>
            <a href="" class="button train">Ж/Д билеты</a>
            <a href="" class="button tours">Поиск туров</a>
        </div>
    </div>
    <?= NewsWidget::widget() ?>
    <div class="cr">
        <div class="border-line"></div>
        <?= Text::getText('main_article')?>
    </div>
</div>


