
<div class="box-heading">Популярные</div>
<div id="wood_block">
    <ul id="popular" class="book_slider">
        <?php foreach ($model as $poet): ?>
            <li>
                <a href="/site/poet/id/<?php echo $poet->id; ?>">
                    <?php
                    $avaSmallUrl = $poet->photoImgBehavior->getFileUrl('ava_small');
                    if ($avaSmallUrl) {
                        echo CHtml::image($avaSmallUrl,'',array('class'=>'poet_image'));
                    }
                    ?>
                    <span id="poet_title"><?php echo $poet->name; ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="clearfix"></div>
    <a class="prev" id="foo5_prev" href="#"><span>prev</span></a>
    <a class="next" id="foo5_next" href="#"><span>next</span></a>
    <div class="pagination" id="foo5_pag"></div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Using default configuration
        $("#popular").carouFredSel({
            items: 6,
            circular: true,
            infinite: false,
            auto: false,
            prev: {
                button: "#foo5_prev",
                key: "left",
                items: 3,
                easing: "easeInQuart",
                duration: 750
            },
            next: {
                button: "#foo5_next",
                key: "right",
                items: 3,
                easing: "easeInQuart",
                duration: 750
            },
            pagination: {
                container: "#foo5_pag",
                keys: true,
                easing: "easeOutBounce",
                duration: 3000
            }
        });

    });
</script>