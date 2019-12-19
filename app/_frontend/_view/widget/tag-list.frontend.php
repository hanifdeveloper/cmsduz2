<!-- Widget tag cloud -->
<aside class="widget widget_tag_cloud">
    <h3 class="widget_title"><span>News Tag</span></h3>
    <div class="tagcloud">
        <?php 
        foreach ($tags as $tag):
            echo '<a href="#">'.$tag.'</a>';
        endforeach; 
        ?>
    </div>
</aside>