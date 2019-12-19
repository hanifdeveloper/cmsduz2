<!-- Related articles -->
<h5 class="title_section">Related articles</h5>
<div class="related_articles">
    <div class="row">
    <?php foreach($relatedNews as $news): ?>
        <div class="col col_4_of_12">
            <div class="article_standard_view">
                <article class="item">
                    <div class="item_header">
                        <a href="<?= $news['news_link']; ?>"><img src="<?= $news['news_image']; ?>" alt="Post"></a>
                    </div>
                    <div class="item_content">
                        <h3><a href="<?= $news['news_link']; ?>"><?= $news['news_title']; ?></a></h3>
                        <div class="entry_meta">
                            <span><i class="fa fa-clock-o"></i> <?= $news['news_date']; ?></span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>