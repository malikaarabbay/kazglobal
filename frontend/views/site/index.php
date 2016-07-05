<?php
/* @var $this yii\web\View */
$this->title = 'KazGlobal';
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\widgets\NewsWidget;
?>
<div class="containers">
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
        <p class="compani_text">
            <strong>KazGlobal.kz </strong>- contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
        </p>
        <p class="compani_text">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
    </div>
</div>


