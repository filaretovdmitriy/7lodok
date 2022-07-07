<?php
use app\assets\AppAsset;
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>

                <aside>
                    <nav class="catalog-left-menu">
                        <?= app\widgets\CatalogMenu::widget() ?>
                    </nav>
                </aside>
                <main>
                <div class="slider-wrapper">
                    <?= app\widgets\coolbaby\SliderMain::widget(['sliderId' => 1]) ?>
                </div>
                <div class="features-wrapper">
                        <div class="feature-item">
                            <img src="<?= AppAsset::path('images/feature-icon.png') ?>">
                            Подарочные сертификаты
                        </div>
                        <div class="feature-item">
                            <img src="<?= AppAsset::path('images/feature-icon.png') ?>">
                            Подарочные сертификаты
                        </div>
                        <div class="feature-item">
                            <img src="<?= AppAsset::path('images/feature-icon.png') ?>">
                            Подарочные сертификаты
                        </div>
                        <div class="feature-item">
                            <img src="<?= AppAsset::path('images/feature-icon.png') ?>">
                            Подарочные сертификаты
                        </div>
                    </div>
                    <?=$content?>
                </main>





<?/*= \app\widgets\coolbaby\BannersCircle::widget(['groupId' => 1]) ?>

<?= app\widgets\coolbaby\CatalogPopular::widget() ?>

<?= app\widgets\coolbaby\Blog::widget() ?>

<?= app\widgets\coolbaby\Brands::widget() */?>

<?php $this->endContent(); ?>

