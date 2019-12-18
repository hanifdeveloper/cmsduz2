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
                            <!-- Related articles -->
                            <h5 class="title_section">Related articles</h5>
                            <div class="related_articles">
                                <div class="row">
                                    <div class="col col_4_of_12">
                                        <div class="article_standard_view">
                                            <article class="item">
                                                <div class="item_header">
                                                    <a href="post_standard.html"><img src="<?= $this->templatePath; ?>/demo/article-list-view/13.jpg" alt="Post"></a>
                                                </div>
                                                <div class="item_content">
                                                    <h3><a href="post_standard.html">FIFA Temporarily Suspends Former Head of Evaluation</a></h3>
                                                    <div class="entry_meta">
                                                        <span><i class="fa fa-clock-o"></i> 15 minutes ago</span>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="col col_4_of_12">
                                        <div class="article_standard_view">
                                            <article class="item">
                                                <div class="item_header">
                                                    <a href="post_standard.html"><img src="<?= $this->templatePath; ?>demo/article-list-view/12.jpg" alt="Post"></a>
                                                </div>
                                                <div class="item_content">
                                                    <h3><a href="post_standard.html">FIFA Temporarily Suspends Former Head of Evaluation</a></h3>
                                                    <div class="entry_meta">
                                                        <span><i class="fa fa-clock-o"></i> 15 minutes ago</span>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="col col_4_of_12">
                                        <div class="article_standard_view">
                                            <article class="item">
                                                <div class="item_header">
                                                    <a href="post_standard.html"><img src="<?= $this->templatePath; ?>demo/article-list-view/9.jpg" alt="Post"></a>
                                                </div>
                                                <div class="item_content">
                                                    <h3><a href="post_standard.html">FIFA Temporarily Suspends Former Head of Evaluation</a></h3>
                                                    <div class="entry_meta">
                                                        <span><i class="fa fa-clock-o"></i> 15 minutes ago</span>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Comments -->
                            <h5 class="title_section">16 Comments</h5>
                            <ol class="comments_list" id="comments">
                                <li class="comment">
                                    <article>
                                        <div class="comment_avatar">
                                            <img src="demo/avatar-images/1.png" alt="Avatar">
                                        </div>
                                        <div class="comment_content">
                                            <div class="meta">
                                                <span class="comment_author"><a href="#">John Doe</a></span>
                                                <span class="comment_date">August 20, at 09:57</span>
                                            </div>
                                            <p>Proin eu metus id augue ornare maximus. Sed non nulla vel lectus ullamcorper aliquet eget sed sem. Nam justo ipsum, pretium ut porta non, molestie blandit metus. Sed pellentesque velit ullamcorper libero volutpat, quis suscipit lorem blandit. Sed malesuada mi tellus, porttitor eleifend diam aliquet vitae.</p>
                                            <a href="#" class="comment_reply">Reply</a>
                                        </div>
                                    </article>
                                </li>
                            </ol>
                            <!-- Respond -->
                            <h5 class="title_section">Leave a Comment</h5>
                            <div id="respond">
                                <div id="writecomment" class="writecomment">
                                    <a href="#" name="respond"></a>
                                    <div id="respond" class="comment-respond">
                                        <form class="comment-form">
                                            <p>
                                                <label>Nickname <span class="required">*</span></label>
                                                <input type="text" placeholder="Nickname" name="author" id="author">
                                            </p>
                                            <p>
                                                <label>E-mail <span class="required">*</span></label>
                                                <input type="text" placeholder="E-mail" name="email" id="email">
                                            </p>
                                            <p>
                                                <label>Website</label>
                                                <input type="text" placeholder="Website" name="url" id="url">
                                            </p>
                                            <p>
                                                <label>Comment <span>*</span></label>
                                                <textarea name="comment" id="comment" placeholder="Your comment.."></textarea>
                                            </p>						
                                            <p class="form-submit">
                                                <input name="submit" type="submit" id="submit" class="submit btn btn_black" value="Post a Comment">
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </article>

                </div>                    
                <!-- Sidebar area -->
                <div class="col col_4_of_12 sidebar_area">
                    <div class="theiaStickySidebar">
                        <?php //$widget->formSearch(); ?>
                        <?php $widget->postRecent(); ?>
                        <?php $widget->banner300(); ?>
                        <?php $widget->postTimeline(); ?>
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