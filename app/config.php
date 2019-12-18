<?php
return array(
    /* Website Configuration */
    'project' => 'CMSDUZ-2',
    'setting' => array(
        'web_title' => 'CMS Frameduz v2',
        'web_author' => 'Hanif Muhammad',
        'web_description' => 'Content Management System',
        'web_header' => 'CMSDUZ v2',
        'web_footer' => '&copy; 2019 CMSDUZ-v2',
        'admin_path' => 'admin-panel',
        'admin_header' => 'Admin Panel',
        'admin_footer' => '&copy; 2019 CMSDUZ-v2',
        'dir_upload_image' => UPLOAD.'image',
        'dir_upload_lampiran' => UPLOAD.'lampiran',
        'file_type_image' => 'jpeg|jpg|png',
        'file_type_lampiran' => 'pdf',
        'max_size' => 10485760, // 10mb,
    ),
    /* Database Configuration */
    'database' => array(
        'dbweb_cmsduz' => array(
            'driver' => 'mysql',
            'port' => 3306,
            'host' => 'localhost',
            'user' => 'root',
            'password' => 'root',
            'dbname' => 'dbweb_cmsduz2',
            'charset' => 'utf8',
            'collate' => 'utf8_general_ci',
            'persistent' => false,
            'defaultValue' => array(
                'id_category' => date('YmdHis'),
                'id_news' => date('YmdHis'),
                'id_album' => date('YmdHis'),
                'id_gallery' => date('YmdHis'),
                'id_menu' => date('YmdHis'),
                // 'id_menu' => 0, // RESET => ALTER TABLE `tref_menu` AUTO_INCREMENT = 5;
                'news_date' => date('Y-m-d'),
                'datetime' => date('Y-m-d H:i:s'),
                'news_publish' => 'unpublish',
                'album_publish' => 'unpublish',
                'news_viewer' => 0,
                'user_id' => 1,
                'headline' => 'yes',
                'menu_default' => 'no',
                'menu_disable' => 'no',
                'menu_parent' => '',
                'menu_order' => 0,
            ),
            /* Response Message Configuration */
            'responseMessage' => array(
                'login' => array(
                    'validate' => array(
                        array('title' => 'Maaf', 'text' => 'Username atau Password salah..', 'type' => 'warning'),
                        array('title' => 'Sukses', 'text' => 'Login berhasil ...', 'type' => 'info'),
                    ),
                ),
                'menu' => array(
                    'simpan' => array(
                        array('title' => 'Maaf', 'text' => 'Menu gagal disimpan', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Menu telah disimpan', 'type' => 'success'),
                    ),
                    'hapus' => array(
                        array('title' => 'Maaf', 'text' => 'Menu gagal dihapus', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Menu telah dihapus', 'type' => 'success'),
                    ),
                ),
                'kategori' => array(
                    'simpan' => array(
                        array('title' => 'Maaf', 'text' => 'Kategori gagal disimpan', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Kategori telah disimpan', 'type' => 'success'),
                    ),
                    'hapus' => array(
                        array('title' => 'Maaf', 'text' => 'Kategori gagal dihapus', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Kategori telah dihapus', 'type' => 'success'),
                    ),
                ),
                'berita' => array(
                    'upload' => array(
                        array('title' => 'Maaf', 'text' => 'Failed Upload', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Success Upload', 'type' => 'success'),
                    ),
                    'simpan' => array(
                        array('title' => 'Maaf', 'text' => 'Berita gagal disimpan', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Berita telah disimpan', 'type' => 'success'),
                    ),
                    'hapus' => array(
                        array('title' => 'Maaf', 'text' => 'Berita gagal dihapus', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Berita telah dihapus', 'type' => 'success'),
                    ),
                ),
                'album' => array(
                    'upload' => array(
                        array('title' => 'Maaf', 'text' => 'Failed Upload', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Success Upload', 'type' => 'success'),
                    ),
                    'simpan' => array(
                        array('title' => 'Maaf', 'text' => 'Album gagal disimpan', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Album telah disimpan', 'type' => 'success'),
                    ),
                    'hapus' => array(
                        array('title' => 'Maaf', 'text' => 'Album gagal dihapus', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Album telah dihapus', 'type' => 'success'),
                    ),
                ),
                'galeri' => array(
                    'upload' => array(
                        array('title' => 'Maaf', 'text' => 'Failed Upload', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Success Upload', 'type' => 'success'),
                    ),
                    'simpan' => array(
                        array('title' => 'Maaf', 'text' => 'Galeri gagal disimpan', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Galeri telah disimpan', 'type' => 'success'),
                    ),
                    'hapus' => array(
                        array('title' => 'Maaf', 'text' => 'Galeri gagal dihapus', 'type' => 'error'),
                        array('title' => 'Sukses', 'text' => 'Galeri telah dihapus', 'type' => 'success'),
                    ),
                ),
            ),
        )
    ),
    /* Navbar Configuration */
    'navbar' => array(
        'backend' => array(
            'Dashboard' => array(
                'icon' => '<i class="material-icons">dashboard</i>',
                'link' => '',
            ),
            'Menu' => array(
                'icon' => '<i class="material-icons">menu</i>',
                'link' => 'menu',
            ),
            'Content' => array(
                'icon' => '<i class="material-icons">description</i>',
                'link' => '#',
                'submenu' => array(
                    'Kategori' => array(
                        'icon' => '',
                        'link' => 'kategori',
                    ),
                    'Berita' => array(
                        'icon' => '',
                        'link' => 'berita',
                    ),
                    'Artikel' => array(
                        'icon' => '',
                        'link' => 'artikel',
                    ),
                    'Komentar' => array(
                        'icon' => '',
                        'link' => 'komentar',
                    ),
                )
            ),
            'Media' => array(
                'icon' => '<i class="material-icons">perm_media</i>',
                'link' => '#',
                'submenu' => array(
                    'Album' => array(
                        'icon' => '',
                        'link' => 'album',
                    ),
                    'Galeri' => array(
                        'icon' => '',
                        'link' => 'galeri',
                    ),
                    'Download' => array(
                        'icon' => '',
                        'link' => 'download',
                    ),
                )
            ),
            // 'Login' => array(
            //     'icon' => '<i class="material-icons">vpn_key</i>',
            //     'link' => 'login',
            // ),
            'Logout' => array(
                'icon' => '<i class="material-icons">exit_to_app</i>',
                'link' => 'logout',
            ),
        ),
        'frontend' => array(
            'Beranda' => array(
                'link' => '',
                'page_title' => 'Kemetrologian Kabupaten Batang',
            ),
        ),
    ),
    /* Template Configuration */
    'template' => array(
        'backend' => array(
            'basePath' => 'adminBSB/', // Path template
            'css' => array(
                'plugins/bootstrap/css/bootstrap.css',
                'plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
                'plugins/bootstrap-select/css/bootstrap-select.css',
                'plugins/bootstrap-tagsinput/bootstrap-tagsinput.css',
                'plugins/light-gallery/css/lightgallery.css',
                'plugins/nestable/jquery-nestable.css',
                'plugins/sweetalert/sweetalert.css',
                'plugins/node-waves/waves.css',
                'plugins/waitme/waitMe.css',
                'plugins/animate-css/animate.css',
                'plugins/morrisjs/morris.css',
                'css/themes/all-themes.css',
                'css/style.css',
            ),
            'js' => array(
                'plugins/jquery/jquery.min.js',
                'plugins/momentjs/moment.js',
                'plugins/bootstrap/js/bootstrap.js',
                'plugins/bootstrap-select/js/bootstrap-select.js',
                'plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
                'plugins/bootstrap-tagsinput/bootstrap-tagsinput.js',
                'plugins/bootstrap-notify/bootstrap-notify.js',
                'plugins/jquery-slimscroll/jquery.slimscroll.js',
                'plugins/light-gallery/js/lightgallery-all.js',
                'plugins/nestable/jquery.nestable.js',
                'plugins/sweetalert/sweetalert.min.js',
                'plugins/node-waves/waves.js',
                'plugins/waitme/waitMe.js',
                // 'plugins/jquery-countto/jquery.countTo.js',
                // 'plugins/raphael/raphael.min.js',
                // 'plugins/morrisjs/morris.js',
                // 'plugins/chartjs/Chart.bundle.js',
                // 'plugins/flot-charts/jquery.flot.js',
                // 'plugins/flot-charts/jquery.flot.resize.js',
                // 'plugins/flot-charts/jquery.flot.pie.js',
                // 'plugins/flot-charts/jquery.flot.categories.js',
                // 'plugins/flot-charts/jquery.flot.time.js',
                // 'plugins/jquery-sparkline/jquery.sparkline.js',
                'plugins/jquery-inputmask/jquery.inputmask.bundle.js',
                'plugins/jquery-validation/jquery.validate.js',
                'plugins/ckeditor/ckeditor.js',
                'js/admin.js',
                // 'js/pages/index.js',
                'js/demo.js',
            )
        ),
        'frontend' => array(
            'basePath' => 'fastNews/', // Path template
            'css' => array(
                'css/normalize.css',
                'css/typography.css',
                'css/fontawesome.css',
                'css/colors.css',
                'css/style.css',
            ),
            'js' => array(
                'js/jquery.js',
                'js/jquery-ui.js',
                'js/jquery-stickykit.js',
                'js/jquery-lightbox.js',
                'js/jquery-fitvids.js',
                'js/jquery-carousel.js',
                'js/jquery-init.js',
            )
        ),
    ),
);
/* ---------------------- */
?>
