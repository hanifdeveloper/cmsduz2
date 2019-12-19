<!-- Widget popular posts -->
<aside class="widget">
    <h3 class="widget_title">Popular posts</h3>
    <div class="widget_custom_posts">
        <ul>
        <?php foreach ($popularNews as $news): ?>
            <li>
                <div class="entry_thumbnail">
                    <a href="<?= $news['news_link']; ?>"><img src="<?= $news['news_image']; ?>" alt="Post"></a>
                </div>
                <h3><a href="<?= $news['news_link']; ?>"><?= $news['news_title']; ?></a></h3>
                <div class="entry_meta">
                    <span><i class="fa fa-clock-o"></i> <?= $news['news_date']; ?></span>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</aside>