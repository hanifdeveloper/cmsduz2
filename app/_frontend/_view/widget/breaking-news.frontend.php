<!-- Braking news -->
<div class="breaking_news">
    <div class="container">
        <div class="breaking_news_title">Breaking news</div>
        <div class="breaking_news_container">
        <?php foreach($breakingNews as $key => $value): ?>
            <div><a href="<?= $value['link_berita']; ?>"><?= $value['judul_berita']; ?></a></div>
        <?php endforeach; ?>
        </div>
    </div>
</div>