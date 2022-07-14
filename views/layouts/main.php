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
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="site-wrapper">
            <header>
                <div class="header-wrapper page-wrapper">
                    <div class="burger-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
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
                            <?
                                if(is_array(Parameter::getValue(3))) {
                                    foreach(Parameter::getValue(3) as $phone)
                                    {
                                        ?>
                                            <a href="tel:+<?=preg_replace('/[^0-9]/', '', $phone)?>"><?=$phone?></a>
                                        <?
                                    }
                                }
                            ?>
                            
                            
                        </div>
                    </div>
                    <?= app\widgets\BasketMini::widget() ?>
                    
                </div>
            </header>

            <div class="menu-wrapper page-wrapper">
                <nav>
                    <div class="catalog-toggle"><a class="catalog-toggle-link" href="/catalog">Каталог</a></div>
                    <?= app\widgets\TopMenu::widget() ?>
                </nav>
            </div>
            
            <section class="main-wrapper page-wrapper">
                
                    <?= $content ?>
                
            </section>
            <footer>
                <div class="footer-wrapper page-wrapper">
                    <div class="logo-wrapper"><a href="/"><img src="<?= AppAsset::path('images/logo.svg') ?>" name="" /></a></div>
                    <nav class="footer-menu">
                    <?= app\widgets\FooterMenu::widget() ?>
                    </nav>
                    <div class="phones">
                        <img src="<?= AppAsset::path('images/phones-icon.svg') ?>">
                        <div class="phones-list">
                            <?
                                if(is_array(Parameter::getValue(3))) {
                                    foreach(Parameter::getValue(3) as $phone)
                                    {
                                        ?>
                                            <a href="tel:+<?=preg_replace('/[^0-9]/', '', $phone)?>"><?=$phone?></a>
                                        <?
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
           
               
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>