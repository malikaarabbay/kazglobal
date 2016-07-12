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

<?= $this->render( '_item' )?>