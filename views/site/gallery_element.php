<?php
/* @var $this app\components\View */
?>
<h1><?= $this->h1 ?></h1>
<div class="images-gallery">
    
        <?php if (!empty($gallery)) {
            foreach ($gallery as $img) { ?>
               
                    <a href="<?= $img->getPath('image') ?>" class="image-gallery-element" data-fancybox="fancy">
                        <?php if (!empty($img->image)) { ?>
                            <img src="<?= $img->getResizePath('image', 200, 200, 1) ?>" alt="<?= $img->name ?>">
                        <?php } else { ?>
                            
                        <?php } ?>
                       
                    </a>
                
            <?php
            }
        } else { ?>
            <div>
                <strong>Список пуст</strong>
            </div>
        <?php } ?>
    
</div>