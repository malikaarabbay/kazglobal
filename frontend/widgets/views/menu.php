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
<<<<<<< HEAD
            <li><a href="/">Главное</a></li>
            <li><a href="">Туры </a>
            <!--
                <div class="sub_menu_container">    
                    <ul class="sub_menu">   
                        <li><a href="">Авиабилеты</a></li>
                        <li><a href="">Ж/Д билеты</a></li>
                        <li><a href="">Поиск туров</a></li>
                    </ul>   
                </div>
            -->
            </li>
=======
            <li><a href="<?= Url::home() ?>">Главная</a></li>
            <li><a href="">Туры </a></li>
>>>>>>> 59de4b84a32e4a702b1b901f89135c7ba4f77f97
            <li><a href="">Билеты </a></li>
            <li><a href="">Отели   </a></li>
            <li><a href="">Сотрудничество</a></li>
            <li><a href="">Онлайн табло</a></li>
            <li><a href="">Прогноз </a></li>
            <li><a href="<?= Url::toRoute(['/article/view', 'slug' => 'o-kompanii']) ?>">О компании</a></li>
        </ul>
    </div>
</nav>
