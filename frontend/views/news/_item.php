<?php
use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\Url;
?>
<div class="content">
    <div class="cr">
        <div class="title">
            <h1><?= $this->title ?></h1>
        </div>
        <ul class="news_list">
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
                $time = $feed[$x]['date'];
                mb_internal_encoding("UTF-8");
                $announce = mb_substr($description, '0', '150');
                echo '<li><div class="news_containers">              
                    <div class="date_container">
                        <div class="time fl_l">'.Yii::$app->formatter->asTime($time, 'HH:mm').'</div>
                        <div class="date fl_r">'.Yii::$app->formatter->asDate($date, 'dd.MM.yyyy').'</div>                  
                    </div>
                        <a target="_blank" href="'.$link.'" class="news_title" title="'.$title.'">'.$title.'</a>
                        <p>'.$announce.'...</p>
                    </div>
          </li><div class="clear"></div>';
            }
            ?>
        </ul>
    </div>
</div>


