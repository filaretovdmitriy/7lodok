<?php
use yii\widgets\Breadcrumbs;
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>
    <section class="breadcrumbs">
        <?= Breadcrumbs::widget(
            [
                'links' => \Yii::$app->controller->bread,
                'activeItemTemplate' => '{link}',
                'options' => ['class' => 'container'],
                'itemTemplate' => '{link}<span class="divider">&nbsp;</span>',
                'tag' => 'div'
            ]
        ) ?>
    </section>
    <div class="container content">
        <?= $content ?>
    </div>
<?php $this->endContent(); ?>