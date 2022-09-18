<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Indoresearch</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets_admin/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets_admin/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets_admin/') ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <?= $this->session->flashdata('message');  ?>
        <div class="card">
            <div class="card-body login-card-body">
                <div class="mb-3">
                    <img class="mx-auto d-block" src="<?= base_url('assets_admin/img/indo.png') ?>" width="200" alt="">
                </div>

                <p class="login-box-msg">Halaman login administrator</p>

                <form action="<?= base_url('auth/index') ?>" method="post">
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" name="username" id="username" class="form-control"
                                value="<?= set_value('username') ?>" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control"
                                <?= set_value('password') ?> placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="text-center ">
                        <button type="submit" class="btn btn-primary col-lg">Sign In</button>
                    </div>
                </form>
                <hr>
                <div>
                    <p class="text-center"><small>Copyright 2022 <br>Indoresearch
                            <br> All Right Reserved</small></p>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets_admin/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets_admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets_admin/') ?>dist/js/adminlte.min.js"></script>
</body>

</html>