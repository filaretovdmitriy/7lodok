<?php
/* @var $this app\components\View */

use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;
?>

                <aside>
                    <nav class="catalog-left-menu">
                        <?= app\widgets\CatalogMenu::widget() ?>
                    </nav>
                </aside>
                <main>
                <div class="inner-page-text">
                        <?= Breadcrumbs::widget(
                                [
                                    'links' => \Yii::$app->controller->bread,
                                    'activeItemTemplate' => '{link}',
                                    'options' => ['class' => 'breadcrumbs'],
                                    'itemTemplate' => '<li>{link}</li><span class="separator">-</span>',
                                    'tag' => 'ul'
                                ]
                            ) ?>
                        <div class="main-text-wrapper">
                           
                        </div>
                    </div>
                </main>

<section class="col-sm-8 col-md-9 col-lg-10 content-center">
    <div class="divider divider-lg">
    </div>
    <h1><?= $catalog_categorie->name ?></h1>
    <!-- Description -->
    <?= $catalog_categorie->content ?>
    <!-- //end Description -->
    <!-- Filters -->
    <div class="filters-panel">
        <div class="row">
            <div class="col-sm-3 col-md-3 col-lg-4 hidden-xs">
                <div class="view-mode">
                    <a href="#" class="view-grid active icon flaticon-tiles"></a><a href="#" class="view-list icon flaticon-menu29"></a>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-4 hidden-xs">
                Показывать по
                <?= app\widgets\coolbaby\PageLimits::widget(['pages' => $pages]) ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                Сортировать:
                <div class="btn-group">
                    <?= $sort->link('name', ['class' => 'btn btn-default']) ?>
                    <?= $sort->link('price', ['class' => 'btn btn-default']) ?>
                </div>
            </div>
        </div>
    </div>
    <!-- //end Filters -->
    <!-- Listing products -->
    <div class="products-list">
        
        <?php if (!empty($catalog)) { ?>
            <?php foreach ($catalog as $item) {
                $categorie = $item->categorie;
                ?>
                <div class="product-preview-outer">
                    <div class="product-preview">
                        <div class="preview-image-outer">
                            <a href="<?= \yii\helpers\Url::to([
                                'site/catalog_element',
                                'catalog_categorie_alias' => $categorie->alias,
                                'catalog_id' => $item->id,
                                'catalog_alias' => $item->alias,
                            ]) ?>" class="preview-image">
                                <?php if (!empty($item->image)) { ?>
                                    <img class="img-responsive img-default" src="<?= $item->getResizePath('image', 170, 220) ?>" alt="<?= $item->name ?>">
                                <?php } ?>
                            </a>
                        </div>
                        <h3 class="title">
                            <a href="<?= \yii\helpers\Url::to([
                                    'site/catalog_element',
                                    'catalog_categorie_alias' => $categorie->alias,
                                    'catalog_id' => $item->id,
                                    'catalog_alias' => $item->alias
                                ]) ?>">
                                <?= $item->name ?>
                            </a>
                        </h3>
                        <span class="price new"><?= $item->price ?> р.</span>
                        <?php if (!empty($item->price_old)) { ?>
                            <span class="price old"><?= $item->price_old ?> р.</span>
                        <?php } ?>
                        <ul class="product-controls-list">
                            <li><a href="#" data-id="<?= $item->id ?>" class="wishlist-add-good"><span class="icon flaticon-heart68"></span></a></li>
                        </ul>
                        <div class="info">
                            <?= $item->content ?>
                        </div>
                        <ul class="product-controls-list-row">
                            <li><a href="#" data-id="<?= $item->id ?>" class="wishlist-add-good"><span class="icon flaticon-heart68"></span></a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-xs-12">
                <div class="alert alert-info fade in">
                    <strong>Список пуст.</strong> Не найдено товаров соответсвующих Вашему запросу
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- Filters -->
    <div class="filters-panel">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-8 hidden-xs">
                <div class="view-mode">
                    <a href="#" class="view-grid active icon flaticon-tiles"></a><a href="#" class="view-list icon flaticon-menu29"></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <?= LinkPager::widget([
                    'pagination' => $pages,
                    'options' => ['class' => 'paginator pull-right text-right']
                ]) ?>
            </div>
        </div>
    </div>
    <!-- //end Filters -->
</section>
<!-- //end Right column -->
<!-- Left column -->
<aside class="col-sm-4 col-md-3 col-lg-2 content-aside">
    <div class="panel-group accordion-simple">
        
    
    <form method="get">
            <?php
            foreach ($catalog_categorie->catalogCategorieProps as $elem) {
                if ($elem->props->is_filter == 1) { ?>
                    <div class="panel">
                        <div class="panel-heading">
                            <a data-toggle="collapse" class="collapsed" href="#box<?= $elem->id ?>"><span class="arrow-down">+</span><span class="arrow-up">-</span> <?= $elem->props->name ?></a>
                        </div>
                        <div id="box<?= $elem->id ?>" class="panel-collapse in">
                            <div class="panel-body">
                                    <?php if (($elem->props->prop_type_list_id == 1) || ($elem->props->prop_type_list_id == 3)) { ?>
                                        <?php foreach ($elem->props->propsValues as $elem2) { ?>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" <?php  if (isset($get_prop[$elem->props->id])&&($get_prop[$elem->props->id]==$elem2->id))echo "checked";?> value="<?=$elem2->id?>" name="prop[<?= $elem->props->id ?>]" id="radio<?= $elem2->id ?>">
                                                <?= $elem2->name ?>
                                            </label>
                                        </div>
                                        <?php } ?>
                                        <?php
                                    }
                                    if ($elem->props->prop_type_list_id == 2) {
                                        ?>
                                        <ul class="simple-list">
                                            <?php foreach ($elem->props->propsValues as $elem2) { ?>
                                            <li>
                                                <input type="checkbox" <?php  if (isset($get_prop[$elem->props->id])&&(in_array($elem2->id,$get_prop[$elem->props->id])))echo "checked";?> value="<?= $elem2->id ?>" name="prop[<?= $elem->props->id ?>][]" id="checkbox<?= $elem2->id ?>">
                                                <span class="label"><?= $elem2->name ?></span>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <?php
                                    }
                                    if ($elem->props->prop_type_list_id == 0) {
                                        if (($elem->props->prop_type_id == 3) || ($elem->props->prop_type_id == 1)) {
                                            ?>
                                            <div class="slider-snap snap<?= $elem->props->id ?>"></div>
                                            <p class="slider-snap-text">
                                            <div class="input-group">
                                                <input name="prop[<?= $elem->props_id ?>][min]"
                                                    class="form-control slider-snap-value-lower slider-snap-value-lower<?= $elem->props->id ?>">
                                                <span class="input-group-addon">—</span>
                                                <input name="prop[<?= $elem->props_id ?>][max]"
                                                    class="form-control slider-snap-value-upper slider-snap-value-upper<?= $elem->props->id ?>">
                                            </div>
                                            </p>
                                            <?php $this->registerJs("
                                                jQuery(document).ready(function(){
                                                    jQuery('.snap" . $elem->props->id . "').noUiSlider({
                                                        start: [ " . (isset($get_prop[$elem->props_id])?$get_prop[$elem->props_id]['min']:$props_min_max[$elem->props_id]['min']) . ", "
                                                                   . (isset($get_prop[$elem->props_id])?$get_prop[$elem->props_id]['max']:$props_min_max[$elem->props_id]['max']) . " ],
                                                        connect: true,
                                                        step: 0.1,
                                                        range: {
                                                            'min': " . $props_min_max[$elem->props_id]['min'] . ",
                                                            'max': " . $props_min_max[$elem->props_id]['max'] . "
                                                        }
                                                    });
                                                    jQuery('.snap" . $elem->props->id . "').Link('lower').to(jQuery('.slider-snap-value-lower" . $elem->props->id . "'));
                                                    jQuery('.snap" . $elem->props->id . "').Link('upper').to(jQuery('.slider-snap-value-upper" . $elem->props->id . "'));
                                                })
                                            ");
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            }
            ?>
            <?php if (!empty($minPrice)&&(!empty($maxPrice))) { ?>
            <div class="panel">
                <div class="panel-heading">
                    <a data-toggle="collapse" class="collapsed" href="#box-price"><span class="arrow-down">+</span><span class="arrow-up">-</span> Цена</a>
                </div>
                <div id="box-price" class="panel-collapse in">
                    <div class="panel-body">
                        <div class="slider-snap snap-price"></div>
                            <p class="slider-snap-text">
                            <div class="input-group">
                                <input name="price_min" class="form-control slider-snap-value-lower slider-snap-value-lower-price">
                                <span class="input-group-addon">—</span>
                                <input name="price_max" class="form-control slider-snap-value-upper slider-snap-value-upper-price">
                            </div>
                            </p>
                            <?php $this->registerJs("
                                    jQuery(document).ready(function(){
                                        jQuery('.snap-price').noUiSlider({
                                            start: [ " . $price_min_get . ", " . $price_max_get . " ],
                                            connect: true,
                                            range: {
                                                'min':  " . $minPrice . ",
                                                'max': " . $maxPrice . "
                                            }
                                        });
                                        jQuery('.snap-price').Link('lower').to(jQuery('.slider-snap-value-lower-price'));
                                        jQuery('.snap-price').Link('upper').to(jQuery('.slider-snap-value-upper-price'));
                                    })
                                ");
                            ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <button type="submit" class="btn btn-brd btn-brd-hover btn-lg btn-sea-shop btn-block">Искать</button>
    </form>
    </div>
</aside>