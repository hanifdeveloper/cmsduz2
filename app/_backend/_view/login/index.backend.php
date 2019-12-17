<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><?= $this->admin_header; ?></b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card sign_in">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <?= BOOTSTRAP::inputText('username', 'text', '', 'class="form-control" placeholder="Username" required autofocus'); ?>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <?= BOOTSTRAP::inputText('password', 'password', '', 'class="form-control" placeholder="Password" required'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5"></div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 p-t-5 response-message">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?= $this->jsPath; ?>
    <script src="<?= $this->adminUrl; ?>/script"></script>
    <script src="<?= $this->adminUrl; ?>/login/script"></script>
</body>