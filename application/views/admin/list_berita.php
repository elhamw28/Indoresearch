<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div>
                <?= $this->session->flashdata('message');  ?>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header row">
                            <!-- <div class="col-6">
                                <form action="">
                                    <div class="input-group">
                                        <select name="" id="" class="form-control">
                                            <option value="">Semua</option>
                                            <option value="">Draft</option>
                                            <option value="">Pending</option>
                                            <option value="">Publish</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="button" id="button-addon2">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                            <div class="col-12 text-white text-right">
                                <a href="<?= base_url('admin/post_berita') ?>" class="btn btn-primary">
                                    <i class="fas fa-plus text-white"> </i> Post baru
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Tanggal</th>
                                        <th>Baca</th>
                                        <th>Pembuat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($berita as $b) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $b['gambar']; ?></td>
                                        <td><?= $b['judul']; ?></td>
                                        <td><?= $b['nama_kategori']; ?></td>
                                        <td><?= (date("d F Y", $b['date_created'])); ?></td>
                                        <td>X</td>
                                        <td><?= $b['author']; ?></td>
                                        <td><?= $b['status_tulisan']; ?></td>

                                        <td>
                                            <a href="<?php echo base_url('admin/ubah_berita/') . $b['id'] ?>"
                                                class="badge badge-success">Ubah</a>

                                            <a href="<?php echo base_url('admin/hapusberita/') . $b['id'] ?>"
                                                class="badge badge-danger"
                                                onclick="return confirm ('Hapus daftar?')">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++;  ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0 text-center">Status Tulisan</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pending</td>
                                        <td><?= $status['jumlah']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Publish</td>
                                        <td><?= $statusa['jumlaha']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
    </section>
</div>