<?php
use yii\helpers\Html;
use yii\helpers\Url;
use \yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use tugmaks\RssFeed\RssReader;
/* @var $this yii\web\View */
$this->title = 'Новости';

$this->params['breadcrumbs'][] = 'Новости';
$this->registerMetaTag(['name'=> 'keywords', 'content' =>  '']);
$this->registerMetaTag(['name'=> 'description', 'content' => '']);

?>

    <div class="title">
        <h1><?= $this->title ?></h1>
    </div>

<?php echo RssReader::widget([
    'channel' => 'https://www.nur.kz/rss/all.rss',
    'pageSize' => 10,
    'itemView' => '@frontend/views/news/_item', //To set own viewFile set 'itemView'=>'@frontend/views/site/_rss_item'. Use $model var to access item properties
    'wrapTag' => 'div',
    'wrapClass' => 'rss-wrap',
]);
?>
