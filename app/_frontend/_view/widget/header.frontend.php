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
                    <?php
                    function createMenuFrontend($navbar){
                        foreach ($navbar as $key => $value) {
                            if($value['disable'] == 'no'){
                                echo '<li>';
                                if(isset($value['submenu'])){
                                    echo '<a href="'.$value['link'].'"><span>'.$value['text'].'</span></a>';
                                    echo '<ul class="sub-menu">';
                                    createMenuFrontend($value['submenu']);
                                    echo '</ul>';
                                }else{
                                    echo '<a href="'.$value['link'].'">'.$value['text'].'</a>';
                                }
                                echo '</li>';
                            }
                        }
                    }
                    createMenuFrontend($navbar);
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <?php $widget = $this->getModule('widget'); ?>
    <?php $widget->breakingNews(); ?>
    
</header>