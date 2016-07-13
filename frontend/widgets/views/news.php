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
            <?php
            $rss = new DOMDocument();
            $rss->load('https://www.nur.kz/rss/all.rss');
            $feed = array();
            foreach ($rss->getElementsByTagName('item') as $node) {
                $item = array (
                    'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                    'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                    'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                    'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
                );
                array_push($feed, $item);
            }
            $limit = 12;
            for($x=0;$x<$limit;$x++) {
                $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
                $link = $feed[$x]['link'];
                $description = $feed[$x]['desc'];
                $date = date('d.m.Y', strtotime($feed[$x]['date']));
                echo '<div class="news_list-item">
                <div class="news_item"><a target="_blank" href="'.$link.'" class="news_item__name" title="'.$title.'">'.$title.'</a>';
                echo $date.'</div>
                </div>';
//                echo '<p>'.$description.'</p>';
            }
            ?>

        </div>
    </div>
</div>


