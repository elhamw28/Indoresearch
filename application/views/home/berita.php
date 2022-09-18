<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <br>
            <br>
            <br>
            <p>Artikel</p>
        </header>

        <div class="row">

            <?php foreach ($berita as $art) : ?>
            <div class="col-lg-3">
                <div class="post-box">
                    <div class="post-img"><img src="<?= base_url('./assets_admin/img/berita/') . $art['gambar'];  ?>"
                            class="img-fluid" alt=""></div>
                    <span class="post-date"><?= date('d F Y', $art['date_created']); ?></span>
                    <h3 class="post-title"><?= substr($art['judul'], 0, 20); ?></h3>
                    <a href="<?php echo base_url('home/detailberita/') . $art['id'] ?>"
                        class="readmore stretched-link mt-auto"><span>Read More</span><i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <br>
        <br>
        <br>
        <?= $this->pagination->create_links(); ?>
    </div>


</section><!-- End Recent Blog Posts Section -->