<!-- Main slider -->
<div class="main_slider">
<?php foreach($mainSlider as $key => $value): ?>
    <!-- Slide -->
    <div class="slide">
        <a href="<?= $value['link_berita']; ?>"><img src="<?= $value['image_berita']; ?>" style="width: 100%; height: 400px; object-fit: cover;" alt="Post"></a>
        <div class="slide_content" style="max-width: 100%; width: 100%;">
            <h3><a href="<?= $value['link_berita']; ?>"><?= $value['judul_berita']; ?></a></h3>
            <div class="entry_meta">
                <span><i class="fa fa-clock-o"></i> <?= $value['tanggal_berita']; ?></span>
                <span><i class="fa fa-eye"></i> <a href="#"><?= $value['dibaca_berita']; ?></a></span>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>