<?php

$this->title = $model->title;

$this->params['breadcrumbs'][] = $model->title;

$this->registerMetaTag(['name'=> 'title', 'content' =>  $model->meta_title]);
$this->registerMetaTag(['name'=> 'keywords', 'content' =>  $model->meta_keywords]);
$this->registerMetaTag(['name'=> 'description', 'content' => $model->meta_description]);

?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h4 ><?= $model->title?></h4>
        </div>

        <div class="col-xs-12">
            <img src="<?= $model->image ?>" alt="" class="img-responsive"/>
        </div>

        <div class="col-xs-12">
            <?= $model->description?>
        </div>

    </div>

</div>