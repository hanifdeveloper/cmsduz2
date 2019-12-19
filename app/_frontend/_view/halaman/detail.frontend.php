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
                <div class="col col_12_of_12 main_content">
                    
                    <!-- Breadcrumb -->
                    <div class="breadcrumb">
                        <ul class="clearfix">
                            <li><a href="#">Halaman</a></li>
                            <li><?= $article_title; ?></li>
                        </ul>
                    </div>
                    <!-- Article -->
                    <article class="post">
                        <!-- Post header -->
                        <header class="post_header">
                            <h1><?= $article_title; ?></h1>
                            <div class="entry_meta">
                                <span><i class="fa fa-clock-o"></i> <?= $moments; ?></span>
                                <span><i class="fa fa-eye"></i> <?= $article_viewer; ?> views</span>
                                <span><i class="fa fa-user"></i> Administrator</span>
                            </div>
                        </header>
                        <!-- Main content -->
                        <div class="post_main_container">
                            <?= $article_content; ?>
                        </div>
                    </article>
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