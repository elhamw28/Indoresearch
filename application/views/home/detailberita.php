<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url('home') ?>">Home</a></li>
                <li></li>
            </ol>
            <h2>Blog Details</h2>

        </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">
                        <center>

                            <div class="entry-img">
                                <img src="<?= base_url('./assets_admin/img/berita/') . $berita['gambar'];  ?>" alt=""
                                    class="img-fluid" height="400" width="600" margin-top="20px">
                            </div>
                        </center>


                        <h2 class="entry-title" style=" color: #80c31b">
                            <?= $berita['judul']; ?>
                        </h2>


                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html"> <?= $berita['author']; ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html"><time
                                            datetime="2020-01-01"><?= date('d F Y', $berita['date_created']); ?></time></a>
                                </li>
                            </ul>
                        </div>
                        <p><?= $berita['isi_konten']; ?>
                        </p>


                    </article><!-- End blog entry -->



                    <div class="blog-comments">



                    </div><!-- End blog comments -->
                    <br>
                    <div class="social-links">
                        <a href="https://www.facebook.com/indoresearch/" class="facebook"><i
                                class="bi bi-facebook"></i></a>
                        <a href="https://instagram.com/indoresearch?igshid=YmMyMTA2M2Y=" class="instagram"><i
                                class="bi bi-instagram"></i></a>
                    </div>


                </div><!-- End blog entries list -->


                <br>
                <br>
                <br>
                <br>
                <br>

                <div class="col-lg-4">

                    <div class="sidebar">

                        <a href="<?= base_url('home'); ?>" class="logo d-flex align-items-center">
                            <img src="<?= base_url() ?>/assets/img/indo.png" alt="" height="80px" width="300px">
                        </a>
                    </div>

                </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

        </div>

        </div>
    </section><!-- End Blog Single Section -->

</main><!-- End #main -->