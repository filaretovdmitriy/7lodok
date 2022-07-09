<?php
/* @var $this app\components\View */

use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;
?>

                <aside>
                
                <form method="get">
                    <div class="catalog-filter">
                        <?foreach ($catalog_categorie->catalogCategorieProps as $elem) {?>
                            <?if ($elem->props->is_filter == 1) { ?>
                                <div class="catalog-filter-panel">
                                    <div class="catalog-filter-header"><a href="#"><?= $elem->props->name ?></a></div>
                                    <?php if (($elem->props->prop_type_list_id == 1) || ($elem->props->prop_type_list_id == 3)) { ?>
                                        <div class="catalog-filter-variants">
                                            <?php foreach ($elem->props->propsValues as $elem2) { ?>
                                                <div class="catalog-filter-variant">
                                                    <input type="radio" <?php  if (isset($get_prop[$elem->props->id])&&($get_prop[$elem->props->id]==$elem2->id))echo "checked";?> value="<?=$elem2->id?>" name="prop[<?= $elem->props->id ?>]" id="radio<?= $elem2->id ?>">
                                                    <label><?= $elem2->name ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?}?>

                                    <?if ($elem->props->prop_type_list_id == 2) {
                                        ?>
                                        <div class="catalog-filter-variants">
                                            <?php foreach ($elem->props->propsValues as $elem2) { ?>
                                                <div class="catalog-filter-variant">
                                                    <input type="checkbox" <?php  if (isset($get_prop[$elem->props->id])&&(in_array($elem2->id,$get_prop[$elem->props->id])))echo "checked";?> value="<?= $elem2->id ?>" name="prop[<?= $elem->props->id ?>][]" id="checkbox<?= $elem2->id ?>">
                                                    <label><?= $elem2->name ?></label>
                                                </div>
                                            <?php } ?>
                                            </div>
                                        <?php
                                    }?>
                                </div>
                                
                            <?}?>
                        <?}?>
                        <div class="catalog-filter-panel">
                            <div class="catalog-filter-header"><a href="#">Цена</a></div>
                            <div class="catalog-filter-price-range">
                                <input type="text" name="min_price" id="input-number-min">
                                <span class="divider">-</span>
                                <input type="text" name="max_price" id="input-number-max">
                            </div>
                            <div class="price-filter-slider">
                                <div id="input-range"></div>
                            </div>
                        </div>
                       
                        <div class="catalog-filter-buttons">
                            <input type="button" class="show-filter-result btn" value="Показать">
                            <input type="button" class="reset-filter-result reset-btn" value="Сбросить">
                        </div>
                    </div>
                </form>
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
                            <h1><?= $catalog_categorie->name ?></h1>
                            <?= $catalog_categorie->content ?>
                        </div>
                        <div class="catalog-list">

                            <div class="catalog-sort-panel">
                                <a class="catalog-sort-item asc active">По цене</a>
                                <a class="catalog-sort-item">По названию</a>
                                <a class="catalog-sort-item">По скидке</a>
                            </div>

                            <?php if (!empty($catalog)) { ?>
                                <div class="catalog-items">
                                <?php foreach ($catalog as $item) {
                                    $categorie = $item->categorie;
                                    ?>
                                
                                <div class="catalog-item">
                                    <div class="catalog-shadow-item">
                                        <a class="image-wrapper" href="<?= \yii\helpers\Url::to([
                                'site/catalog_element',
                                'catalog_categorie_alias' => $categorie->alias,
                                'catalog_id' => $item->id,
                                'catalog_alias' => $item->alias,
                            ]) ?>">
                                        <?php if (!empty($item->image)) { ?>
                                            <img class="img-responsive img-default" src="<?= $item->getResizePath('image', 170, 220) ?>" alt="<?= $item->name ?>">
                                        <?php } ?>
                                        </a>
                                        <a class="item-name" href="<?= \yii\helpers\Url::to([
                                                'site/catalog_element',
                                                'catalog_categorie_alias' => $categorie->alias,
                                                'catalog_id' => $item->id,
                                                'catalog_alias' => $item->alias,
                                            ]) ?>">
                                            <?= $item->name ?>
                                        </a>
                                        <div class="item-price"><?= $item->price ?>руб</div>
                                        <div class="item-button add-to-cart">В корзину</div>
                                    </div>
                                </div>
                                <?}?>
                                </div>
                            <?}
                            else{
                                ?>
                            Товары по заданным критериям не найдены
                            <?}?>
                        
                            <div class="catalog-paginator">
                                <?= LinkPager::widget([
                                    'pagination' => $pages,
                                    'options' => ['class' => 'paginator pull-right text-right']
                                ]) ?>
                            </div>
                           
                            
                        </div>
                    </div>
                </main>

