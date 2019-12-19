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
                    <?php $widget->headlineNews(); ?>
                    <?php $widget->postMain(); ?>
                    <?php $widget->banner468(); ?>
                    <?php $widget->postList(); ?>
                    <?php $widget->banner468(); ?>
                    <?php $widget->postGridColumn(); ?>
                </div>                    
                <!-- Sidebar area -->
                <div class="col col_4_of_12 sidebar_area">
                    <div class="theiaStickySidebar">
                        <?php $widget->formSearch(); ?>
                        <?php $widget->postPopular(); ?>
                        <?php $widget->banner300(); ?>
                        <?php $widget->postTimeline(); ?>
                    </div>
                </div>                    
            </div>
        </div>
        
        <!-- Wild container -->
        <div class="wild_conatiner">
            <div class="container">
                <?php $widget->postGridRows(); ?>
            </div>
        </div>
        
        <!-- Container -->
        <div class="container">
            <div class="row">     
                <!-- Sidebar area -->
                <div class="col col_4_of_12 sidebar_area">
                    <div class="theiaStickySidebar">
                        <?php $widget->banner125(); ?>
                        <?php $widget->postPopular(); ?>
                        <?php $widget->tagList(); ?>
                    </div>
                </div>       
                <!-- Main content -->
                <div class="col col_8_of_12 main_content">
                    <?php $widget->postList(); ?>
                    <?php $widget->postGridColumn(); ?>
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