<?php

use yii\helpers\Html;
use yii\helpers\Url;
use himiklab\thumbnail\EasyThumbnailImage;

/* @var $this yii\web\View
 * @var $news
 */
?>
<div class="news_container">
    <div class="cr">
        <div class="title_news">Свежие новости KazGlobalTravel</div>
        <div class="news-list">
            <?php foreach ($news as $newsItem) {?>
            <div class="news_list-item">
                <div class="news_item">
                    <div class="news_list_img">
                        <?php
                        echo \himiklab\thumbnail\EasyThumbnailImage::thumbnailImg(
                            $newsItem->imagePath, 210, 155, \himiklab\thumbnail\EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                            [
                                'class' => ''
                            ]
                        );
                        ?>
                    </div>
                    <a href="<?= Url::toRoute(['/news/view', 'slug' => $newsItem->slug]) ?>" class="news_item__name"><?= $newsItem->title ?></a>
                    <div class="date">
                        <?= Yii::$app->formatter->asDate($newsItem->created, 'dd.MM.yyyy') ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


