<?php
use app\assets\AppAsset;
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>

                <aside>
                    <nav class="catalog-left-menu">
                        <?= app\widgets\CatalogMenu::widget() ?>
                    </nav>
                    
                    <?= app\widgets\ContentPreview::widget(['content_categorie_id'=>1]) ?>
                </aside>
                <main>
                <div class="slider-wrapper">
                    <?= app\widgets\coolbaby\SliderMain::widget(['sliderId' => 1]) ?>
                </div>
                    <?= app\widgets\Features::widget() ?>
                    <?=$content?>
                </main>





<?/*= \app\widgets\coolbaby\BannersCircle::widget(['groupId' => 1]) ?>

<?= app\widgets\coolbaby\CatalogPopular::widget() ?>

<?= app\widgets\coolbaby\Blog::widget() ?>

<?= app\widgets\coolbaby\Brands::widget() */?>

<?php $this->endContent(); ?>

