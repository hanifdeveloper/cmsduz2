<body class="theme-red">
    <!-- Loader -->
    <?php $this->subView('main/loader'); ?>
    <!-- Header -->
    <?php $this->subView('main/header'); ?>
    <!-- Navbar -->
    <?php $this->subView('main/navbar'); ?>
    <!-- Modal -->
    <?php $this->subView('main/modal'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <?php $this->subView('main/breadcrumb'); ?>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="project" class="card">
                        <div class="header">
                            <h2 id="page_title"></h2>
                            <ul class="header-dropdown m-r-0">
                                <li><a href="javascript:void(0);" class="list_area" data-target="#filterOptions" data-toggle="collapse" title="Kategori Pencarian" aria-expanded="true" aria-controls="filterOptions"><i class="material-icons">search</i></a></li>
                                <li><a href="javascript:void(0);" class="list_area btn-load" data-toggle="tooltip" data-placement="top" title="Perbarui Data" data-original-title="Perbarui Data"><i class="material-icons">loop</i></a></li>
                            </ul>
                            <button type="button" id="" class="btn btn-form bg-red btn-circle-lg waves-effect waves-circle waves-float list_area" data-toggle="tooltip" data-placement="left" title="Tambah Data" data-original-title="Tambah Data" style="position: fixed; right: 20px; bottom: 20px; z-index: 99;"><i class="material-icons">add</i></button>
                        </div>
                        <div id="data_list" class="body list_area">
                            <div class="collapse" id="filterOptions" aria-expanded="true" style="">
                                <form id="form_list" onsubmit="return false" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="cari">&nbsp;</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">search</i>
                                                </span>
                                                <div class="form-line">
                                                    <?= BOOTSTRAP::inputText('cari', 'text', '', 'class="form-control filter-options" placeholder="Cari Gambar"'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="album">Album</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <?= BOOTSTRAP::inputSelect('album', $album_choice, '', 'class="form-control show-tick filter-options" data-live-search="true"'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="page_query" class="col-md-12"></div>
                                    </div>
                                    <?= BOOTSTRAP::inputKey('page', 1); ?>
                                </form>
                            </div>
                            <div id="list_empty">
                                <div class="text-center">
                                    <i class="material-icons font-50">search</i>
                                    <h4 id="err_status">Data tidak ditemukan</h4>
                                    <p id="err_message">Kata kunci yang Anda masukan tidak ditemukan dalam database</p>
                                </div>
                            </div>
                            <div id="list_content">
                                <div class="list-content-detail list-unstyled row clearfix">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 list-content-rows">
                                        <div class="thumbnail">
                                            <a href="{gallery_image}" data-sub-html="{gallery_name}" class="image_list">
                                                <img src="{gallery_image}" class="image-crop">
                                            </a>
                                            <div class="caption">
                                                <p class="text-right">
                                                    <a href="javascript:void(0);" id="{id_gallery}" class="btn btn-success btn-form" data-toggle="tooltips" data-placement="top" title="Edit" data-original-title="Edit">Edit</a>
                                                    <a href="javascript:void(0);" id="{id_gallery}" class="btn btn-danger btn-delete" data-toggle="tooltips" data-placement="top" title="Delete" data-original-title="Delete" data-message="Yakin data {gallery_name} akan dihapus ?">Delete</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="list_paging">
                                <ul class="pagination">
                                    <li class="pagging page-item" number-page=""><a href="javascript:void(0);" class="waves-effect">{page}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="data_form" class="body form_area">
                            <div id="form_content">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="album_id">Album</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span data-form-object="album_id"></span>
                                            </div>
                                        </div>
                                        <label for="gallery_name">Nama Gallery</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span data-form-object="id_gallery"></span>
                                                <span data-form-object="gallery_name"></span>
                                            </div>
                                        </div>
                                        <label for="gallery_desc">Keterangan Gallery</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span data-form-object="gallery_desc"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="gallery_image">Gambar</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <span data-form-object="gallery_image"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= $this->jsPath; ?>
    <script src="<?= $this->adminUrl; ?>/script"></script>
    <script src="<?= $this->adminUrl; ?>/galeri/script"></script>
</body>