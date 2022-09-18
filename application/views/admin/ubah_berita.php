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

                        <form action="<?= base_url('admin/aksi_ubah_berita'); ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="id" name="id"
                                        value="<?= $ubah_berita['id']; ?>" hidden>
                                </div>

                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="<?= $ubah_berita['judul']; ?>" required>
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary" type="submit" id="button-addon2">Edit</button>
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
                            <textarea name="isi_konten" id="editor1"
                                required><?= $ubah_berita['isi_konten'] ?></textarea>
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
                                <select name="tipe_tulisan" class="custom-select" id="tipe_tulisan"
                                    value="<?= $ubah_berita['tipe_tulisan']; ?>" disabled>
                                    <option value="Berita" selected>Berita</option>
                                    <option value="Artikel">Artikel</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipe_tulisan">Kategori</label>
                                <select name="kategori" class="custom-select" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <?php foreach ($kategori as $k) : ?>
                                    <option <?= ($k['id'] == $ubah_berita['id_kategori']) ? 'selected' : '' ?>
                                        value="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label> <br>

                                <input type='file' id="gambar" name="gambar" onchange="pressed()"
                                    style="width:100px; color:transparent;"><label
                                    id="fileLabel"><?= $ubah_berita['gambar'] ?></label> <br>
                                <img class="mt-3"
                                    src="<?= base_url('assets_admin/img/berita/') . $ubah_berita['gambar'] ?>"
                                    alt="gambar" width="100" height="100">
                            </div>
                            <!-- <div class="form-group">
                                <label for="tipe_tulisan">Meta Keyword</label>
                                <input type="text" class="form-control" name="meta_keyword" id="meta_keyword">
                            </div>
                            <div class="form-group">
                                <label for="tipe_tulisan">Meta Deskripsi</label>
                                <textarea class="form-control" name="meta_deskripsi" id="meta_deskripsi"></textarea>
                            </div> -->
                            <div class="form-group">
                                <label for="status_tulisan">Status Tulisan</label>
                                <div>
                                    <select class="form-select" name="status_tulisan" id="status_tulisan"
                                        value="<?= set_value('status_tulisan') ?>" required>
                                        <option value="" selected disabled>Pilih Status</option>
                                        <option <?php if ($ubah_berita['status_tulisan'] == 'Pending') {
                                                    echo 'selected';
                                                } ?> value="Pending">Pending</option>
                                        <option <?php if ($ubah_berita['status_tulisan'] == 'Publish') {
                                                    echo 'selected';
                                                } ?> value="Publish">Publish</option>
                                        <option <?php if ($ubah_berita['status_tulisan'] == 'Draft') {
                                                    echo 'selected';
                                                } ?> value="Draft">Draft</option>
                                    </select>
                                </div>
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
<script>
window.pressed = function() {
    var a = document.getElementById('gambar');
    if (a.value == "") {
        fileLabel.innerHTML = "Chose file";
    } else {
        var theSplit = a.value.split('\\');
        fileLabel.innerHTML = theSplit[theSplit.length - 1];
    }
};
</script>