<!-- Main slider -->
<div class="main_slider">
<?php foreach($headlineNews as $key => $value): ?>
    <!-- Slide -->
    <div class="slide">
        <a href="<?= $value['news_link']; ?>"><img src="<?= $value['news_image']; ?>" style="width: 100%; height: 400px; object-fit: cover;" alt="Post"></a>
        <div class="slide_content" style="max-width: 100%; width: 100%;">
            <h3><a href="<?= $value['news_link']; ?>"><?= $value['news_title']; ?></a></h3>
            <div class="entry_meta">
                <span><i class="fa fa-clock-o"></i> <?= $value['news_date']; ?></span>
                <span><i class="fa fa-eye"></i> <a href="#"><?= $value['news_viewer']; ?></a></span>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>