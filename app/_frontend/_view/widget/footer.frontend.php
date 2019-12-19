<?php $widget = $this->getModule('widget'); ?>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col col_4_of_12">
                <?php $widget->about(); ?>
            </div>
            <div class="col col_4_of_12">
                <?php $widget->postPopular(); ?>
            </div>
            <div class="col col_4_of_12">
                <?php $widget->postTimeline(); ?>
            </div>
        </div>
    </div>
</footer>

<!-- Copyright -->
<div id="copyright">
    <div class="container">
        <?= $this->web_footer; ?>
    </div>
</div>