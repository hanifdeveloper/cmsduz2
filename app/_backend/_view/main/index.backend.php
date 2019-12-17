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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>DASHBOARD</h2>
                        </div>
                        <div class="body">
                            <?php $this->debugResponse($_SESSION); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= $this->jsPath; ?>
    <script src="<?= $this->adminUrl; ?>/script"></script>
</body>