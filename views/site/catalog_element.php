<?php
/* @var $this app\components\View */

use yii\widgets\Breadcrumbs;
?>

<div class="catalog-element-item">
    <h1><?= $catalog->name ?></h1>
    <div class="catalog-element-info">
        <div class="slider-image-wrapper">
            <div class="main-image">
                    <?php if (!empty($catalog->image)) { ?>
                        <a href="<?= $catalog->getPath('image') ?>"><img src="<?= $catalog->getResizePath('image', 400, 400) ?>" alt="<?= $catalog->name ?>"></a>
                    <?php } ?>
            </div>
            <?php foreach ($catalog->images as $pic) { ?>
                <div class="carousel-images">
                    <a><img src="<?= $pic->getResizePath('image', 50, 50) ?>" alt="<?= $pic->name ?>"/></a>
                </div>
            <?php } ?>
        </div>
        <div class="catalog-element-description">
            <?/*<div class="catalog-rate">
                <div class="catalog-stars"></div>
                <div class="catalog-produce"><img src=""></div>
            </div>*/?>
            <div class="catalog-description-content">
                <?= $catalog->content ?>
            </div>
            <div class="catalog-element-price">
                <?= number_format($catalog->price, 2, '.', ' '); ?> руб
            </div>
            <div class="catalog-buy-buttons">
                <div class="buy-count-buttons">
                    <a class="button-change-count button-minus-item" href="#">-</a>
                    <input type='text' data-catalog-id="<?= $catalog->id ?>" class="form-control input-quantity quantity-field" value="1" id='quantity-field-<?= $catalog->id ?>' />
                    <a class="button-change-count button-plus-item" href="#">+</a>
                </div>
                <div class="btn but-button basket-add-item"  data-id="<?= $catalog->id ?>"><span>В корзину</span></div>
            </div>
        </div>
    </div>
</div>

<?php
if(!empty($catalogRelated)){
    ?>
    <div class="catalog-list">
        <h2>Смотрите также</h2>
        <div class="catalog-items">
    <?
    foreach($catalogRelated as $item){
        ?>
        <div class="catalog-item">
                <div class="catalog-shadow-item">
                    <a class="image-wrapper">
                    <?php if (!empty($item->image)) { ?>
                        <img class="img-responsive img-default" src="<?= $item->getResizePath('image', 170, 220) ?>" alt="<?= $item->name ?>">
                    <?php } ?>
                    </a>
                    <a class="item-name"><?= $item->name?></a>
                    <div class="item-price"><?= $item->price?></div>
                    <div class="item-button add-to-cart">В корзину</div>
                </div>
            </div>
        <?
    }?>
        </div>
    </div>
<?    
}
?>
                   
                    
