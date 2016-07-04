<?php

$this->title = $model->title;

$this->params['breadcrumbs'][] = $model->title;

$this->registerMetaTag(['name'=> 'keywords', 'content' =>  $model->meta_keywords]);
$this->registerMetaTag(['name'=> 'description', 'content' => $model->meta_description]);

?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?= \yii\widgets\Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h4 ><?= $model->title?></h4>
            <?= Yii::$app->formatter->asDate($model->created, 'd.MM.Y') ?>
        </div>

        <div class="col-xs-12">
            <img src="<?= $model->image ?>" alt="" class="img-responsive"/>
        </div>

        <div class="col-xs-12">
            <?= $model->description?>
        </div>

    </div>

</div>