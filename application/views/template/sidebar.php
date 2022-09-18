<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link text-center">
        <img class="mx-auto d-block img-fluid" src="<?= base_url('assets_admin/img/logo_akn_tulisan_putih.png') ?>" width="100" alt="">
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="mt-2">
            <div class="text-center mx-auto brand-link text-center">
                <img class="mx-auto d-block img-fluid" src="<?= base_url('assets_admin/img/indo.png') ?>" width="150"
                    alt="">
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">ADMINISTRATOR</li>
                <li class="nav-item">
                    <a href="<?= base_url('admin') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/list_berita') ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-newspaper"></i>
                        <p> Berita</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/kategori') ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-folder-plus"></i>
                        <p> Kategori</p>
                    </a>
                </li>
                <li class="nav-header">USER</li>
                <li class="nav-item">
                    <a href="<?= base_url('users/ubah_password') ?>" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>Ubah Password</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    </div>
    <!--
 /.sideb
ar -->


</aside>