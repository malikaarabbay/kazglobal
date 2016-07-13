<?php

use yii\helpers\Html;
use yii\i18n\Formatter;

?>
<div class="news_list-item">
    <div class="news_item">
        <a href="<?= $model->link ?>" class="news_item__name"><?= $model->title ?></a>
        <div class="date"><?= Yii::$app->formatter->asDate($model->pubDate, 'dd.MM.yyyy') ?></div>
        <div class="time"><?= Yii::$app->formatter->asTime($model->pubDate, 'HH:mm') ?></div>
        <?php $anounce = strip_tags($model->description, '<p><a>'); (strlen($anounce) > 150 ) ? $readmore = ' ...' : $readmore = ''?>
        <div class="news-desc" style="padding-bottom: 10px"><?php $anounce = strip_tags($model->description, '<p><a>'); echo mb_substr($anounce, 0, 150, 'UTF-8').$readmore; ?></div>
    </div>
</div>

