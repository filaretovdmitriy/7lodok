<?php
/* @var $this app\components\View */

use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\assets\AppAsset;
?>
<h1><?= $this->h1 ?></h1>
        
<div class="images-gallery">
        <?php if (!empty($gallerys)) {
            foreach ($gallerys as $gallery) { ?>
                
                    <a class="image-gallery-element" href="<?= Url::to(['site/gallery_element', 'gallery_categorie_id' => $gallery->id]) ?>">
                        <?php if (!empty($gallery->image)) { ?>
                            <img src="<?= $gallery->getResizePath('image', 200, 200, 1) ?>" alt="<?= $gallery->name ?>">
                        <?php } else { ?>
                            
                        <?php } ?>
                    </a>
                
            <?php
            }
        } else { ?>
            <div>Список пуст</div>
        <?php } ?>
</div>

        <?= LinkPager::widget([
            'pagination' => $pages,
            'options' => ['class' => 'paginator']
        ]) ?>
   