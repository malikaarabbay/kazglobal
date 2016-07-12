<?php

use yii\helpers\Html;
use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View
 * @var $news
 */
?>

<nav class="menu_container">
    <div class="cr">
        <ul class="menu_top">
            <li><a href="<?= Url::home() ?>">Главная</a></li>
            <li><a href="">Туры </a></li>
            <li><a href="">Билеты </a></li>
            <li><a href="">Отели   </a></li>
            <li><a href="">Сотрудничество</a></li>
            <li><a href="">Онлайн табло</a></li>
            <li><a href="">Прогноз </a></li>
            <li><a href="<?= Url::toRoute(['/article/view', 'slug' => 'o-kompanii']) ?>">О компании</a></li>
        </ul>
    </div>
</nav>
