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
                                                    <?= BOOTSTRAP::inputText('cari', 'text', '', 'class="form-control filter-options" placeholder="Cari Kategori"'); ?>
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
                            <div id="list_content" class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kategori</th>
                                            <th>Link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list-content-detail">
                                        <tr class="list-content-rows">
                                            <th>{number}</th>
                                            <td>{category_name}</td>
                                            <td><a href="{category_link}" target="_blank">{category_link}</a></td>
                                            <td>
                                                <a href="javascript:void(0);" id="{id_category}" class="btn-form" data-toggle="tooltips" data-placement="top" title="Edit" data-original-title="Edit"><i class="material-icons">mode_edit</i></a>
                                                <a href="javascript:void(0);" id="{id_category}" class="btn-delete" data-toggle="tooltips" data-placement="top" title="Delete" data-original-title="Delete" data-message="Yakin data {category_name} akan dihapus ?"><i class="material-icons">delete</i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="list_paging">
                                <ul class="pagination">
                                    <li class="pagging page-item" number-page=""><a href="javascript:void(0);" class="waves-effect">{page}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= $this->jsPath; ?>
    <script src="<?= $this->adminUrl; ?>/script"></script>
    <script src="<?= $this->adminUrl; ?>/kategori/script"></script>
</body>