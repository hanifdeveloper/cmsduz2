<!-- Braking news -->
<div class="breaking_news">
    <div class="container">
        <div class="breaking_news_title">Breaking news</div>
        <div class="breaking_news_container">
        <?php foreach($breakingNews as $key => $value): ?>
            <div><a href="<?= $value['news_link']; ?>"><?= $value['news_title']; ?></a></div>
        <?php endforeach; ?>
        </div>
    </div>
</div>