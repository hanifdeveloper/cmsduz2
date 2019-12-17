<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?= $this->templatePath; ?>images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                <div class="email">john.doe@example.com</div>
                
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <?php
                function createMenu($menu, $adminUrl){
                    foreach ($menu as $key => $value):
                        $menu = '<li><a href="{link}">{icon}{text}</a></li>';
                        $link = ($value['link'] == '#') ? 'javascript:void(0);' : $adminUrl.'/'.$value['link'];
                        $link = rtrim($link, '/');
                        $icon = $value['icon'];
                        $text = '<span>'.$key.'</span>';
                        if(isset($value['submenu'])){
                            echo '<li><a href="'.$link.'" class="menu-toggle">'.$icon.$text.'</a><ul class="ml-menu">';
                            createMenu($value['submenu'], $adminUrl);
                            echo '</ul></li>';
                        }else{
                            echo str_replace(array('{link}', '{icon}', '{text}'), array($link, $icon, $text), $menu);
                        }
                    endforeach;
                }

                createMenu($this->navbar_backend, $this->adminUrl);
                ?>
                <li><a href="<?= $this->baseUrl; ?>" target="_blank"><i class="material-icons">http</i><span>View Web</span></a></li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                <?= $this->admin_footer; ?>
            </div>
            <div class="version">
                <b>Version: </b> 1.0.4
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>