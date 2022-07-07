<?php
/* @var $this app\components\View */
?>
<div class="subtitle">
    <div>
        <span><?= $content->name ?></span>
    </div>
</div>
<p><?= date('H:i d.m.Y',strtotime($content->g_date)) ?></p>
<?= $content->content ?>