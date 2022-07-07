<?php
/* @var $this app\components\View */

use yii\helpers\Html;
use app\assets\AppAsset;
use app\widgets\coolbaby\BasketMini;
use yii\widgets\ActiveForm;
use app\forms\SearchForm;
use app\models\Parameter;


AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
        <meta id="viewport_meta" name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= Html::encode($this->title) ?></title>
        
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="site-wrapper">
            <header>
                <div class="header-wrapper page-wrapper">
                    <div class="logo-wrapper">
                        <div class="logo"><a href="/"><img src="<?= AppAsset::path('images/logo.svg') ?>" name="" /></a></div>
                    </div>
                    
                    <div class="search">
                        <input type="text">
                        <button class="btn" value="Отправить"></button>
                    </div>
                    <div class="phones">
                        <div class="icon-wrapper"><img src="<?= AppAsset::path('images/phones-icon.svg') ?>"></div>
                        <div class="phones-list">
                            <a href="tel:+79999999999">+7 (929) 99-09-09</a>
                            <a href="tel:+79999999999">+7 (929) 99-09-09</a>
                        </div>
                    </div>
                    <div class="basket empty">
                        <div class="icon-wrapper"><img src="<?= AppAsset::path('images/shopping-cart.svg') ?>"><div class="basket-count"></div></div>
                        <div class="basket-empty-caption">Корзина пуста</div>
                        <div class="baket-caption"><span>Корзина</span> <span class="basket-price">1950</span> р</div>
                    </div>
                </div>
            </header>

            <div class="menu-wrapper page-wrapper">
                <nav>
                    <div class="catalog-toggle"><a class="catalog-toggle-link" href="#">Каталог</a></div>
                    <?= app\widgets\TopMenu::widget() ?>
                </nav>
            </div>
            
            <section class="main-wrapper page-wrapper">
                
                    <?= $content ?>
                
            </section>
            <footer>
                <div class="footer-wrapper page-wrapper">
                    <div class="logo-wrapper"></div>
                    <nav class="footer-menu">
                    <?= app\widgets\FooterMenu::widget() ?>
                    </nav>
                    <div class="phones">
                        <img src="<?= AppAsset::path('images/phones-icon.svg') ?>">
                        <div class="phones-list">
                            <a href="tel:+79999999999">+7 (929) 99-09-09</a>
                            <a href="tel:+79999999999">+7 (929) 99-09-09</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
           
               
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>