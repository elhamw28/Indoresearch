<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
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

            <div class="col-lg">
                <div class="card card-primary card-outline">
                    <div class="card-header row">
                        <div class="col-6">
                            <h5>Tulisan Baru</h5>
                        </div>
                        <div class="col-6 text-white text-right">
                            <a href="<?= base_url('admin/list_berita') ?>" class="btn btn-primary">
                                <i class="fas fa-angle-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/add_post_berita') ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-lg-10">
                                    <input type="text" name="judul" class="form-control" placeholder="Judul Postingan"
                                        aria-label="Judul Postingan" aria-describedby="button-addon2">
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary" type="submit" id="button-addon2">Simpan</button>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card card-primary card-outline mr-1">
                        <div class="card-header row">
                            <h6>Berita</h6>
                        </div>
                        <div class="card-body">
                            <!-- This container will become the editable. -->
                            <textarea name="isi_konten" id="editor1"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header row">
                            <h6>Pengaturan Lainnya</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tipe_tulisan">Tipe Tulisan</label>
                                <select name="tipe_tulisan" class="custom-select" id="tipe_tulisan" value="Berita"
                                    disabled>
                                    <option value="Berita" selected>Berita</option>
                                    <option value="Artikel">Artikel</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipe_tulisan">Kategori</label>
                                <select name="kategori" class="custom-select">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input name="gambar" type="file" class="form-control" id="gambar" class="form-control"
                                    name="gambar">
                            </div>
                            <!-- <div class="form-group">
                                <label for="tipe_tulisan">Meta Keyword</label>
                                <input type="text" class="form-control" name="meta_keyword" id="meta_keyword">
                            </div> -->
                            <div class="form-group">
                                <label for="author">Penulis</label>
                                <input class="form-control" name="author" id="author"></input>
                            </div>
                            <div class="form-group">
                                <label for="status_tulisan">Status Tulisan</label>
                                <select class="form-select" name="status_tulisan" id="status_tulisan"
                                    value="<?= set_value('status_tulisan') ?>" required>
                                    <option value="" selected disabled>Pilih Status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Publish">Publish</option>
                                    <option value="Draft">Draft</option>
                                </select>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>

<script>
CKEDITOR.replace('editor1');
</script>