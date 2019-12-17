<body class="theme-red">
    <!-- Loader -->
    <?php $this->subView('main/loader'); ?>
    <!-- Header -->
    <?php $this->subView('main/header'); ?>
    <!-- Navbar -->
    <?php $this->subView('main/navbar'); ?>
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
                                <li><a href="javascript:void(0);" class="editor_area btn-close" data-toggle="tooltip" data-placement="top" title="Tutup Editor" data-original-title="Tutup Editor"><i class="material-icons">close</i></a></li>
                            </ul>
                            <button type="button" id="" class="btn btn-form bg-red btn-circle-lg waves-effect waves-circle waves-float list_area" data-toggle="tooltip" data-placement="left" title="Tambah Data" data-original-title="Tambah Data" style="position: fixed; right: 20px; bottom: 20px; z-index: 99;"><i class="material-icons">note_add</i></button>
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
                                                    <?= BOOTSTRAP::inputText('cari', 'text', '', 'class="form-control filter-options" placeholder="Cari Berita"'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kategori">Kategori</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <?= BOOTSTRAP::inputSelect('kategori', $category_choice, '', 'class="form-control show-tick filter-options" data-live-search="true"'); ?>
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
                                <div class="list-content-detail">
                                    <div class="media list-content-rows">
                                        <div class="media-left">
                                            <div class="media-thumbnail">
                                                <a href="{news_image}" data-sub-html="{news_title}" class="image_list">
                                                    <img class="media-object" src="{news_image}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-action">
                                                <h4 class="media-heading">
                                                    <a href="{news_link}" target="_blank">{news_title}</a>
                                                </h4>
                                                <div class="media-action-content">
                                                    <a href="javascript:void(0);" id="{id_news}" class="btn-form" data-toggle="tooltips" data-placement="top" title="Edit" data-original-title="Edit"><i class="material-icons">mode_edit</i></a>
                                                    <a href="javascript:void(0);" id="{id_news}" class="btn-delete" data-toggle="tooltips" data-placement="top" title="Delete" data-original-title="Delete" data-message="Yakin data {news_title} akan dihapus ?"><i class="material-icons">delete</i></a>
                                                </div>
                                            </div>
                                            {short_content}
                                            <div class="demo-image-copyright"><span class="badge bg-teal">{category_name}</span>&nbsp;<span class="badge bg-blue">{news_publish}</span>&nbsp;<span class="badge bg-red">{headline}</span></div>
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
                        <div id="data_editor" class="body editor_area">
                            <form id="form_editor" onsubmit="return false" autocomplete="off">
                                <div id="editor_content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span data-form-object="news_content"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <label for="judul_berita">Judul</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <span data-form-object="id_news"></span>
                                                    <span data-form-object="news_title"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="category_id">Kategori</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <span data-form-object="category_id"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="news_date">Tanggal Posting</label>
                                                    
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <span data-form-object="news_date"></span>
                                                        </div>
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">date_range</i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="news_publish">Publish</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <span data-form-object="news_publish"></span>
                                                </div>
                                            </div>
                                            <label for="headline">Headline</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <span data-form-object="headline"></span>
                                                </div>
                                            </div>
                                            <label for="news_tag">Tag</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <span data-form-object="news_tag"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="news_image">Gambar</label>
                                            <div class="form-group">
                                                <span data-form-object="news_image"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="editor_action">
                                    <button type="submit" class="btn btn-block btn-lg btn-primary m-t-15 waves-effect">SIMPAN</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= $this->jsPath; ?>
    <script src="<?= $this->adminUrl; ?>/script"></script>
    <script src="<?= $this->adminUrl; ?>/berita/script"></script>
</body>