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
                            <li><a href="index.html">Home</a></li>
                            <li>404 Page</li>
                        </ul>
                    </div>
                    <!-- Main heading -->
                    <div class="main_heading">
                        <h1>404 Page</h1>
                    </div>
                    <!-- Title section -->
                    <div class="page_404">
                        <i class="fa fa-exclamation-triangle"></i>
                        <h1>Error 404</h1>
                        <h3><?= $error_message; ?></h3>
                        <a href="<?= $this->baseUrl; ?>" class="btn">Back to home</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <?php $widget->footer(); ?>
        
    </div>

    <!-- Javascripts -->
    <?= $this->jsPath; ?>
</body>