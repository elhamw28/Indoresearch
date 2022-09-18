<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <?= $this->session->flashdata('message');  ?>
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
                <div class="card card-primary col card-outline">
                    <div class="card-header row">
                        <div class="col text-white text-right">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus text-white"> </i> Tambah Kategori
                            </a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/add_kategori') ?>" method="POST">
                                            <div class="form-group">
                                                <label for="nama_kategori">Nama Kategori</label>
                                                <input type="text" class="form-control" id="nama_kategori"
                                                    name="nama_kategori">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kategori as $f) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $f['nama_kategori'] ?></td>
                                    <td>
                                        <a href="#" class="badge badge-pill badge-success" data-toggle="modal"
                                            data-target="#editfakultas<?= $f['id']; ?>"><i class="fas fa-edit"></i>
                                            Edit</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editfakultas<?= $f['id']; ?>" tabindex="-1"
                                            aria-labelledby="editfakultasModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content col-lg-12">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editfakultasModalLabel">Ubah
                                                            Kategori</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('admin/editkategori'); ?>"
                                                            method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="nama_fakultas" class="form-label">Nama
                                                                    Fakultas</label>
                                                                <input type="text" class="form-control"
                                                                    id="nama_kategori" name="nama_kategori"
                                                                    value="<?= $f['nama_kategori']; ?>" required>
                                                                <input type="text" class="form-control" id="id"
                                                                    name="id" value="<?= $f['id']; ?>" hidden required>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>

                                                        <button type="submit" class="btn btn-primary">Ubah
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="<?php echo base_url('admin/hapuskategori/') . $f['id'] ?>"
                                            class="badge badge-pill badge-danger"
                                            onclick="return confirm ('Hapus daftar?')"> <i class="fas fa-window-close">
                                            </i> Delete</a>
                                    </td>
                                </tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</div>