<?php
/* @var $this app\components\View */
use app\assets\AppAsset;
?>
<?php
                    
                    if(!empty($catalog))
                    {
                        ?>
                        <div class="catalog-list">
                            <h2>Самое популярное</h2>
                            <div class="catalog-items">
                                <?foreach($catalog as $item){?>
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
                                <?}?>

                            </div>  
                            
                        </div>

                        <?
                    }
                    ?>
                    
                    <div class="main-text-wrapper">
                        <h1><?=$this->h1;?></h1>
                        <?=$this->tree->getContent();?>
                        
                    </div>

