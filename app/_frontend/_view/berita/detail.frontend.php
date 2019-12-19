<body>
    <!-- Wrapper -->
    <div id="wrapper" class="wide">
        
        <?php $widget = $this->getModule('widget'); ?>
        <!-- Header -->
        <?php $widget->header(); ?>
                    
        <!-- Container -->
        <div class="container">
            <div class="row">                    
                <!-- Main content -->
                <div class="col col_8_of_12 main_content">
                    
                    <!-- Breadcrumb -->
                    <div class="breadcrumb">
                        <ul class="clearfix">
                            <li><a href="#">Berita</a></li>
                            <li><a href="#"><?= $category_name; ?></a></li>
                            <li>Detail</li>
                        </ul>
                    </div>
                    <!-- Article -->
                    <article class="post">
                        <!-- Post header -->
                        <header class="post_header">
                            <h1><?= $news_title; ?></h1>
                            <div class="entry_meta">
                                <span><i class="fa fa-clock-o"></i> <?= $moments; ?></span>
                                <span><i class="fa fa-commenting-o"></i> 16 comments</span>
                                <span><i class="fa fa-eye"></i> <?= $news_viewer; ?> views</span>
                                <span><i class="fa fa-user"></i> Administrator</span>
                            </div>
                        </header>
                        <!-- Main content -->
                        <div class="post_main_container">
                            <!-- Post content -->
                            <div class="post_content_in_container">                                
                                <a href="<?= $news_image; ?>" class="magnificPopupImage">
                                    <img src="<?= $news_image; ?>" alt="Article">
                                </a>
                                <!-- <span class="photo_credit">Photo: <a href="https://www.pexels.com" target="_blank">Pexels.com</a></span> -->
                            </div>
                            <?= $news_content; ?>
                        </div>
                        <!-- Post controls -->
                        <!-- <div class="post_controls">
                            <div class="prev_post">
                                <span>Previous</span>
                                <a href="#">In Performance: Tonya Pinkins and Dianne Wiest of 'Rasheeda Speaking'</a>
                            </div>
                            <div class="post_separator"></div>
                            <div class="next_post">
                                <span>Next</span>
                                <a href="#">In Performance: Tonya Pinkins and Dianne Wiest of 'Rasheeda Speaking'</a>
                            </div>
                        </div> -->
                        <!-- Author box -->
                        <!-- <div class="author_box">
                            <img src="demo/avatar-images/3.jpg" alt="Avatar">
                            <div class="description">
                                <a class="bio" href="#">John Doe<span class="posts">15 posts</span></a>
                                <p>Vestibulum eu dictum nibh. In congue, purus gravida ultricies fermentum, leo orci cursus nibh, a sollicitudin lectus mi eget felis. Proin eu metus id augue ornare maximus. Sed non nulla vel lectus ullamcorper aliquet eget sed sem.</p>
                                <ul class="social_icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div> -->
                        <!-- Related News -->
                        <?php $widget->relatedNews($news_tag); ?>
                        <!-- Comments -->
                        <?php $widget->comments(); ?>
                    </article>
                </div>                    
                <!-- Sidebar area -->
                <div class="col col_4_of_12 sidebar_area">
                    <div class="theiaStickySidebar">
                        <?php $widget->postPopular(); ?>
                        <?php $widget->banner300(); ?>
                        <?php $widget->tagList($news_tag); ?>
                    </div>
                </div>                    
            </div>
        </div>
        
        <!-- Footer -->
        <?php $widget->footer(); ?>
        
    </div>

    <!-- Javascripts -->
    <?= $this->jsPath; ?>
    <script src="<?= $this->baseUrl; ?>/script"></script>
</body>