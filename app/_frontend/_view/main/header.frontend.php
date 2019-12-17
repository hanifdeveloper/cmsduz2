<header id="header">
    <!-- Header main -->
    <div class="header_main">
        <div class="container">
            <div class="logo">
                <h1><a href="index.html"><?= $this->web_header; ?></a></h1>
            </div>
        </div>
    </div>
    <!-- Header menu -->
    <div id="header_menu" class="header_menu header_is_sticky">
        <div class="container">
            <div class="toggle_main_navigation"><i class="fa fa-bars"></i></div>
            <nav id="main_navigation" class="clearfix">
                <ul class="main_navigation clearfix">
                    <li><a href="#">Travel</a></li>
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Music</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <?php $widget = $this->getModule('widget'); ?>
    <?php $widget->breakingNews(); ?>
    
</header>