<?php
/* @var $this app\components\View */

use yii\widgets\LinkPager;
use app\components\IcmsHelper;
?>
<div class="col-sm-12">
    <?php if (!empty($contents)) { ?>
        <div>
            <?= $this->tree->getContent() ?>
        </div>
    
        <?php foreach ($contents as $content) { ?>
            <div class="row">
                <div class="subtitle">
                    <div>
                        <span><a href="<?= yii\helpers\Url::to(['site/news_element', 'alias' => $content->alias]) ?>">​<?= $content->name ?></a></span>
                    </div>
                </div>
                <div class="testimonials">
                    <div class="inside">
                        <p><?= $content->anons ?></p>
                        <p><strong><?= IcmsHelper::dateTimeFormat('d.m.Y H:i', $content->g_date) ?> </strong></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?= LinkPager::widget([
            'pagination' => $pages,
        ]);
    } else { ?>
        <div class="alert alert-info fade in">
            <strong>Список новостей пуст</strong>
        </div>
    <?php } ?>
</div>