<?php $this->beginContent('@app/views/layouts/main.php'); ?>

<?= app\widgets\coolbaby\SliderMain::widget(['sliderId' => 1]) ?>

<?= \app\widgets\coolbaby\BannersCircle::widget(['groupId' => 1]) ?>

<?= app\widgets\coolbaby\CatalogPopular::widget() ?>

<?= app\widgets\coolbaby\Blog::widget() ?>

<?= app\widgets\coolbaby\Brands::widget() ?>

<?php $this->endContent(); ?>