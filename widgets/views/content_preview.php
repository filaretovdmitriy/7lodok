<?php if (!empty($items)) { ?>
    <div id="myCarousel" class="carousel slide carousel-v1">
        <div class="carousel-inner">
            <?php
            $cnt = 0;
            foreach ($items as $item) {
                ?>
                <div class="item <?php
                $cnt++;
                if ($cnt == 1) {
                    echo "active";
                }
                ?>">
                    <a href="/news/<?= $item->alias ?>">
                        <?php if (!empty($item->image)) { ?>
                            <img src="/upload/icms/images/content/<?= $item->image ?>" alt="<?= $item->name ?>">
        <?php } ?>
                        <div class="carousel-caption">
                            <p><?= $item->name ?></p>
                        </div>
                    </a>
                </div>
    <?php } ?>
        </div>

        <div class="carousel-arrow">
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
<?php } ?>