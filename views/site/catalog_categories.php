<?php
/* @var $this app\components\View */
?>

<section class="col-sm-12 col-md-12 col-lg-12 content-center">
    <?= \app\widgets\coolbaby\SliderCategories::widget(['sliderId' => 3]) ?>
    <div class="divider divider-lg">
    </div>
    <h1><?= $this->h1 ?></h1>
    <!-- Description -->
    <?= $this->tree->getContent() ?>
    <!-- //end Description -->
    <div class="divider-sm"></div>
    <!-- Categories -->
    <div class="row">
        <?php foreach ($categories as $categorie) { ?>
            <div class="col-xs-6 col-sm-3">
                <div class="category">
                    <a href="<?= yii\helpers\Url::to(['site/catalog_categorie', 'catalog_categorie_alias' => $categorie->alias]) ?>">
                        <img src="<?= $categorie->getPath('image') ?>" alt="">
                    </a>
                    <h4>
                        <a href="<?= yii\helpers\Url::to(['site/catalog_categorie', 'catalog_categorie_alias' => $categorie->alias]) ?>"><?= $categorie->name ?></a>
                    </h4>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- //end Categories -->
    <div class="divider-sm"></div>
</section>