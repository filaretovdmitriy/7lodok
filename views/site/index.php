<?php
/* @var $this app\components\View */
?>
<div class="site-index">
    <div class="headline"><h1><?= $this->h1 ?></h1></div>


    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <?= $this->tree->getContent() ?>
            </div>
        </div>
    </div>
</div>
