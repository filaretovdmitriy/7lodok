<?
use app\assets\AppAsset;
?>

<div class="basket mini-basket <?if($count==0) echo 'empty'?>">
    <div class="icon-wrapper"><img src="<?= AppAsset::path('images/shopping-cart.svg') ?>"><div class="basket-count mini-basket-count"><?= $count ?></div></div>
    <div class="basket-empty-caption">Корзина пуста</div>
    <div class="baket-caption"><span class="baket-caption-name">Корзина</span> <div><span class="basket-price mini-basket-price"><?= number_format($price, 0, '.', ' ') ?></span> руб. </div></div>
</div>

<?/*
<a href="/basket">
    <span class="mini-basket-price">
        
    </span>
    р.
    <i class="fa fa-shopping-cart"></i>
</a>
<span class="badge badge-sea rounded-x mini-basket-count"><?= $count ?></span>
*/?>