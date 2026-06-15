<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita DryDock</title>

    <!-- Favicons (Menggunakan logo Drydock) -->
    <link href="<?= base_url('assets/images/drydock-logo-nobg.png') ?>" rel="icon">
    <link href="<?= base_url('assets/images/drydock-logo-nobg.png') ?>" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/logis/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/aos/aos.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= base_url('assets/logis/css/main.css') ?>" rel="stylesheet">
</head>
<body>
    <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="<?= base_url() ?>" class="logo d-flex align-items-center me-auto">
        <img src="<?= base_url('assets/images/drydock-logo-2w.png') ?>" alt="Drydock Logo" style="max-height: 140px;">
      </a>

     <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?= base_url('beranda') ?>" >Beranda</a></li>
          <li><a href="#tentangkami">Tentang Kami</a></li>
          <li><a href="#layanan">Layanan</a></li>
          <li><a href="#produk">Katalog</a></li>

          <!-- Dropdown Menu Informasi -->
          <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="<?= base_url('berita') ?>" class="active">Berita</a></li>
              <li><a href="#laporan">Laporan</a></li>
              <li><a href="#faq">FAQ</a></li>
            </ul>
          </li>

          <li><a href="#contact">Kontak</a></li>
          <li><a href="<?= base_url('profil') ?>" >Profil</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

<div class="container berita-page py-5">

    <div class="row g-4">

        <!-- Slider Berita Utama -->
        <div class="col-lg-8">

            <div id="heroNews"
                 class="carousel slide news-slider"
                 data-bs-ride="carousel">

                <div class="carousel-inner">

                    <?php foreach ($beritaUtama as $key => $item): ?>

                        <div class="carousel-item <?= ($key == 0) ? 'active' : '' ?>">

                            <img src="<?= base_url('uploads/berita/' . ($item['gambar'] ?? 'default.jpg')) ?>"
                                 class="d-block w-100"
                                 alt="<?= esc($item['judul'] ?? '') ?>">

                            <div class="slider-overlay">

                                <span class="badge bg-primary">
                                   
                                </span>

                                <h2>
                                    <?= esc($item['judul'] ?? '') ?>
                                </h2>

                                <a href="<?= base_url('berita/' . ($item['slug'] ?? '')) ?>"
                                   class="btn btn-light">
                                    Baca Selengkapnya
                                </a>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

                <button class="carousel-control-prev"
                        type="button"
                        data-bs-target="#heroNews"
                        data-bs-slide="prev">

                    <span class="carousel-control-prev-icon"></span>

                </button>

                <button class="carousel-control-next"
                        type="button"
                        data-bs-target="#heroNews"
                        data-bs-slide="next">

                    <span class="carousel-control-next-icon"></span>

                </button>

            </div>

        </div>

        <!-- Berita Samping -->
        <div class="col-lg-4">

            <?php foreach ($beritaSamping as $item): ?>

                <div class="card shadow-sm mb-4 border-0">

                    <img src="<?= base_url('uploads/berita/' . ($item['gambar'] ?? 'default.jpg')) ?>"
                         class="card-img-top"
                         alt="<?= esc($item['judul'] ?? '') ?>">

                    <div class="card-body">

                        <span class="badge bg-secondary mb-2">
                            <?= esc($item['kategori'] ?? 'Berita') ?>
                        </span>

                        <h5 class="card-title">
                            <?= esc($item['judul'] ?? '') ?>
                        </h5>

                        <a href="<?= base_url('berita/' . ($item['slug'] ?? '')) ?>"
                           class="btn btn-primary btn-sm">

                            Baca Selengkapnya

                        </a>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</div>

<script src="<?= base_url('assets/logis/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>