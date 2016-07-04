<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use frontend\widgets\MenuWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <div class="page">

        <?= $this->render('/common/_header')?>
        
        <?= Alert::widget() ?>
        <?= $content?>
    </div>
    <?= MenuWidget::widget() ?>
    <?= $this->render('/common/_footer')?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
