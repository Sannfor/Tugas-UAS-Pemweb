<?php

/**
 * @var array $kapal_bulk
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Drydock - Marketplace Jual Beli Kapal</title>
  <meta name="description" content="Platform marketplace terpercaya untuk jual beli dan sewa kapal laut.">
  <meta name="keywords" content="kapal, jual kapal, beli kapal, drydock, kapal kargo, tugboat, passenger ship">

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

  <!-- =======================================================
  * Template Name: Logis
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Updated: Apr 08 2026 with Bootstrap v5.3.8
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <style>
    /* 1. Mengurangi jarak atas-bawah pada navbar agar tetap ramping */
    .header {
      padding: 5px 0 !important;
      /* Dipersempit lagi jarak atas-bawahnya */
    }

    /* 2. Membesarkan ukuran logo */
    .header .logo img {
      max-height: 100px !important;
      /* Naikkan drastis dari 50px ke 85px (Bisa diubah 70-100 sesuai selera) */
      width: auto !important;
      /* Menjaga logo tidak gepeng */
    }

    /* 3. (Opsional) Jika ada teks sistem di sebelah logo, sembunyikan atau sesuaikan */
    .header .logo .sitename {
      display: none;
      /* Tambahkan ini jika di dalam gambar logomu sudah ada tulisan DRYDOCK-nya */
    }
  </style>
  
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="<?= base_url() ?>" class="logo d-flex align-items-center me-auto">
        <img src="<?= base_url('assets/images/drydock-logo-2w.png') ?>" alt="Drydock Logo" style="max-height: 140px;">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Beranda</a></li>
          <li><a href="#tentangkami">Tentang Kami</a></li>
          <li><a href="#layanan">Layanan</a></li>
          <li><a href="#produk">Katalog</a></li>

          <!-- Dropdown Menu Informasi -->
          <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#berita">Berita</a></li>
              <li><a href="#laporan">Laporan</a></li>
              <li><a href="#faq">FAQ</a></li>
            </ul>
          </li>

          <li><a href="#kontak">Kontak</a></li>
          <li><a href="<?= base_url('profil') ?>">Profil</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>





    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="<?= base_url('assets/logis/img/world-dotted-map.png') ?>" alt="" class="hero-bg" data-aos="fade-in">

      <div class="container">
        <div class="row gy-4 d-flex justify-content-between">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2 data-aos="fade-up">Solusi Terpercaya untuk Jual Beli Kapal</h2>
            <p data-aos="fade-up" data-aos-delay="100">Temukan berbagai jenis kapal berkualitas dan terhubung langsung dengan penjual terpercaya melalui platform DryDock</p>

            <div class="d-flex flex-wrap justify-content-center gap-5"
              data-aos="fade-up"
              data-aos-delay="200">

              <a href="<?= base_url('produk/tanker') ?>" class="btn btn-primary ship-btn shadow-sm">
                🚢 Tanker
              </a>

              <a href="<?= base_url('produk/tugboat') ?>" class="btn btn-primary ship-btn shadow-sm">
                ⚓ Tugboat
              </a>

              <a href="<?= base_url('produk/ferry') ?>" class="btn btn-primary ship-btn shadow-sm">
                🛳️ Ferry
              </a>

            </div>

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="300">

              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="0" class="purecounter">232</span>
                  <p>Clients</p>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="0" class="purecounter">521</span>
                  <p>Projects</p>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="0" class="purecounter">1453</span>
                  <p>Support</p>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="0" class="purecounter">32</span>
                  <p>Workers</p>
                </div>
              </div><!-- End Stats Item -->

            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="<?= base_url('assets/logis/img/hero-img.png') ?>" class="img-fluid mb-3 mb-lg-0" alt="Ilustrasi Drydock">
          </div>

        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
            <div>
              <h4 class="title">Lorem Ipsum</h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              <a href="#" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-truck"></i></div>
            <div>
              <h4 class="title">Dolor Sitema</h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
              <a href="#" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-truck-ramp-box"></i></div>
            <div>
              <h4 class="title">Sed ut perspiciatis</h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
              <a href="#" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- Tentang Section -->
    <section id="tentangkami" class="team section-bg" style="padding: 60px 0;">

      <div class="container section-title" data-aos="fade-up">
        <span>Tentang Kami</span>
        <h2>Tentang Kami</h2>

        <p class="mt-3" style="max-width: 850px; margin: 0 auto; line-height: 1.8; text-align: center; font-size: 1.1rem;">
          <strong>Drydock</strong> hadir sebagai inovasi digital terdepan dalam industri maritim, menyediakan platform <i>marketplace</i> armada kapal yang aman, transparan, dan efisien. Berawal dari visi untuk menyederhanakan proses transaksi maritim global, sistem ini dirancang secara khusus untuk menghubungkan pemilik kapal, agen, dan pembeli potensial di seluruh belahan dunia.
        </p>

        <div style="max-width: 850px; margin: 40px auto 0; text-align: left;">
          <h5 class="fw-bold mb-4 text-center" style="color: #0e1d34; font-size: 1.2rem;">Nilai Utama Layanan Kami:</h5>
          <div class="row gy-4">

            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill fs-4 me-3" style="color: #0d6efd; margin-top: 2px;"></i>
                <div>
                  <strong style="color: #0e1d34; font-size: 1.1rem;">Katalog Armada Terlengkap</strong>
                  <p class="text-muted mb-0" style="font-size: 1rem; line-height: 1.6;">Menyediakan ragam spesifikasi armada, mulai dari <i>Bulk Carrier</i>, <i>Tugboat</i>, hingga Kapal Penumpang.</p>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill fs-4 me-3" style="color: #0d6efd; margin-top: 2px;"></i>
                <div>
                  <strong style="color: #0e1d34; font-size: 1.1rem;">Data Spesifikasi Transparan</strong>
                  <p class="text-muted mb-0" style="font-size: 1rem; line-height: 1.6;">Menyajikan informasi komprehensif terkait dimensi, kapasitas mesin, hingga standar emisi setiap kapal.</p>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill fs-4 me-3" style="color: #0d6efd; margin-top: 2px;"></i>
                <div>
                  <strong style="color: #0e1d34; font-size: 1.1rem;">Negosiasi Cepat & Interaktif</strong>
                  <p class="text-muted mb-0" style="font-size: 1rem; line-height: 1.6;">Dilengkapi dengan fitur penawaran harga langsung (<i>bidding</i>) untuk mempercepat proses kesepakatan.</p>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="d-flex align-items-start">
                <i class="bi bi-check-circle-fill fs-4 me-3" style="color: #0d6efd; margin-top: 2px;"></i>
                <div>
                  <strong style="color: #0e1d34; font-size: 1.1rem;">Jangkauan Pasar Global</strong>
                  <p class="text-muted mb-0" style="font-size: 1rem; line-height: 1.6;">Membuka akses tanpa batas geografis yang memudahkan ekspansi bisnis pelayaran ke ranah internasional.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="container mt-5" data-aos="fade-up">

        <div class="text-center mb-4">
          <h3 class="fw-bold text-uppercase" style="color: #0e1d34; font-size: 1.5rem;">Tim Pengembang</h3>
          <div style="width: 50px; height: 3px; background-color: #0d6efd; margin: 10px auto;"></div>
        </div>

        <div class="row justify-content-center text-center gy-4">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member w-100">
              <div class="member-img mb-3">
                <img src="<?= base_url('assets/images/team/Hasan.jpg'); ?>" class="img-fluid rounded-circle" alt="Ahmadi Hasan" style="width: 200px; height: 200px; object-fit: cover; border: 8px solid rgba(0,0,0,0.04); padding: 5px;">
              </div>
              <div class="member-info">
                <h4 class="fw-bold mb-1" style="color: #0e1d34; font-size: 1.25rem;">Ahmadi Hasan</h4>
                <span class="d-block text-secondary mb-3 fw-semibold" style="font-size: 1rem;">2411016110012</span>
                <p class="fst-italic text-muted px-3" style="font-size: 1.05rem;">"Try to do your best for the future."</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member w-100">
              <div class="member-img mb-3">
                <img src="<?= base_url('assets/images/team/Raka.jpg'); ?>" class="img-fluid rounded-circle" alt="Raka Erhansyah" style="width: 200px; height: 200px; object-fit: cover; border: 8px solid rgba(0,0,0,0.04); padding: 5px;">
              </div>
              <div class="member-info">
                <h4 class="fw-bold mb-1" style="color: #0e1d34; font-size: 1.25rem;">Raka Erhansyah Arwany</h4>
                <span class="d-block text-secondary mb-3 fw-semibold" style="font-size: 1rem;">2411016310006</span>
                <p class="fst-italic text-muted px-3" style="font-size: 1.05rem;">"Beat stress by going to the gym."</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- End Tentang Section -->

    <!-- ======= Services Section ======= -->
    <section id="layanan" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Layanan Kami<br></span>
        <h2>Layanan Kami</h2>
        <p>Dukungan layanan terpadu untuk kelancaran transaksi dan operasional maritim Anda</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">

          <!-- Layanan 1: Katalog & Marketplace -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-img">
                <!-- Tambahan style tinggi tetap dan object-fit -->
                <img src="<?= base_url('assets/images/layanan/marketplace-armada.jpg') ?>" alt="Katalog Armada" class="img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
              </div>
              <div class="card-body p-4 text-center">
                <h3 class="fw-bold"><a href="#" class="stretched-link text-decoration-none" style="color: #0e1d34;">Marketplace Armada</a></h3>
                <p class="text-muted mb-0">Platform terpercaya untuk eksplorasi dan transaksi jual beli kapal (Bulk Carrier, Tugboat, Passenger) dengan data spesifikasi yang sangat rinci.</p>
              </div>
            </div>
          </div><!-- End Card Item -->

          <!-- Layanan 2: Bidding / Negosiasi -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-img">
                <!-- Tambahan style tinggi tetap dan object-fit -->
                <img src="<?= base_url('assets/images/layanan/sistem-negosiasi.jpg') ?>" alt="Sistem Negosiasi" class="img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
              </div>
              <div class="card-body p-4 text-center">
                <h3 class="fw-bold"><a href="#" class="stretched-link text-decoration-none" style="color: #0e1d34;">Sistem Negosiasi</a></h3>
                <p class="text-muted mb-0">Fitur <i>bidding</i> interaktif yang memungkinkan pembeli melakukan tawar-menawar harga secara aman dan real-time langsung dengan pemilik kapal.</p>
              </div>
            </div>
          </div><!-- End Card Item -->

          <!-- Layanan 3: Inspeksi -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-img">
                <!-- Tambahan style tinggi tetap dan object-fit -->
                <img src="<?= base_url('assets/images/layanan/inspeksi-teknis.jpg') ?>" alt="Inspeksi Kapal" class="img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
              </div>
              <div class="card-body p-4 text-center">
                <h3 class="fw-bold"><a href="#" class="stretched-link text-decoration-none" style="color: #0e1d34;">Inspeksi Teknis</a></h3>
                <p class="text-muted mb-0">Layanan verifikasi dan audit fisik lambung serta mesin kapal yang dilakukan oleh tim surveyor maritim independen bersertifikat kelas dunia.</p>
              </div>
            </div>
          </div><!-- End Card Item -->

          <!-- Layanan 4: Pengurusan Dokumen -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-img">
                <!-- Tambahan style tinggi tetap dan object-fit -->
                <img src="<?= base_url('assets/images/layanan/legal-dokumen.jpg') ?>" alt="Pengurusan Dokumen Legal" class="img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
              </div>
              <div class="card-body p-4 text-center">
                <h3 class="fw-bold"><a href="#" class="stretched-link text-decoration-none" style="color: #0e1d34;">Legal & Dokumen</a></h3>
                <p class="text-muted mb-0">Dukungan penuh untuk pengurusan administrasi kepemilikan kapal, perubahan bendera (flagging), serta dokumen klasifikasi (BKI, CCS, dll).</p>
              </div>
            </div>
          </div><!-- End Card Item -->

          <!-- Layanan 5: Pengiriman Kapal -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-img">
                <!-- Tambahan style tinggi tetap dan object-fit -->
                <img src="<?= base_url('assets/images/layanan/ship-delivery.jpg') ?>" alt="Pengiriman Kapal" class="img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
              </div>
              <div class="card-body p-4 text-center">
                <h3 class="fw-bold"><a href="#" class="stretched-link text-decoration-none" style="color: #0e1d34;">Ship Delivery</a></h3>
                <p class="text-muted mb-0">Manajemen logistik untuk pelayaran pemindahan kapal dari galangan (drydock) atau pelabuhan asal menuju pelabuhan tujuan akhir Anda.</p>
              </div>
            </div>
          </div><!-- End Card Item -->

          <!-- Layanan 6: Pembiayaan (Financing) -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="card h-100 shadow-sm border-0">
              <div class="card-img">
                <!-- Tambahan style tinggi tetap dan object-fit -->
                <img src="<?= base_url('assets/images/layanan/pembiyayaan.jpg') ?>" alt="Pembiayaan Maritim" class="img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
              </div>
              <div class="card-body p-4 text-center">
                <h3 class="fw-bold"><a href="#" class="stretched-link text-decoration-none" style="color: #0e1d34;">Pembiayaan (Financing)</a></h3>
                <p class="text-muted mb-0">Konsultasi dan solusi pendanaan untuk pembelian armada melalui kemitraan strategis dengan berbagai lembaga keuangan maritim global.</p>
              </div>
            </div>
          </div><!-- End Card Item -->

        </div>
      </div>

    </section><!-- /Services Section -->

    <section id="call-to-action" class="call-to-action section dark-background text-center" style="background: linear-gradient(rgba(14, 29, 52, 0.8), rgba(14, 29, 52, 0.8)), url('<?= base_url('assets/logis/img/cta-bg.jpg') ?>') center center / cover fixed; padding: 100px 0;">

      <div class="container" data-aos="zoom-in">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h3 class="text-white fw-bold mb-3">Siap Menemukan Armada Impian Anda?</h3>
            <p class="text-white mb-4 fs-5" style="opacity: 0.9;">
              Bergabunglah dengan ratusan perusahaan pelayaran dan agen maritim yang telah mempercayakan transaksi jual-beli kapal mereka kepada Drydock. Proses cepat, data transparan, dan jangkauan global.
            </p>

            <div class="d-flex justify-content-center gap-3 mt-4">
              <a class="btn btn-primary rounded-pill px-5 py-3 fw-bold shadow" href="#produk" style="background-color: #0d6efd; border: none;">Katalog Kapal</a>
              <a class="btn btn-outline-light rounded-pill px-5 py-3 fw-bold shadow" href="#contact">Hubungi Tim Kami</a>
            </div>
          </div>
        </div>
      </div>

    </section>
    <section id="features" class="features section" style="padding: 60px 0;">

      <div class="container section-title" data-aos="fade-up">
        <span>Fitur Platform</span>
        <h2>Fitur Platform</h2>
        <p>Teknologi yang dirancang untuk memudahkan setiap tahap transaksi maritim Anda</p>
      </div>

      <div class="container">

        <div class="row gy-4 align-items-center features-item mb-5">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
            <img src="<?= base_url('assets/images/layanan/penyaringan-spesifik.jpg') ?>" class="img-fluid shadow" alt="Advanced Filter" style="width: 100%; height: 350px; object-fit: cover; border-radius: 12px;">
          </div>
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            <h3 class="fw-bold">Penyaringan Spesifikasi Tingkat Lanjut</h3>
            <p class="fst-italic">
              Sistem pencarian cerdas yang menghemat waktu Anda dalam menyortir ribuan data kapal.
            </p>
            <ul>
              <li><i class="bi bi-check"></i> <span>Filter akurat berdasarkan Gross Tonnage (GT), Deadweight (DWT), dan tahun pembuatan.</span></li>
              <li><i class="bi bi-check"></i> <span>Pencarian berbasis lokasi bendera (Flag) dan area navigasi.</span></li>
              <li><i class="bi bi-check"></i> <span>Penyortiran mesin kapal berdasarkan merek dan kekuatan kW.</span></li>
            </ul>
          </div>
        </div>

        <div class="row gy-4 align-items-center features-item mb-5">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?= base_url('assets/images/layanan/analisis-trend.jpg') ?>" class="img-fluid shadow" alt="Price Trends" style="width: 100%; height: 350px; object-fit: cover; border-radius: 12px;">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
            <h3 class="fw-bold">Analitik Tren Harga Pasar</h3>
            <p class="fst-italic">
              Ambil keputusan investasi yang lebih cerdas dengan dukungan data analitik visual.
            </p>
            <p>
              Setiap detail kapal dilengkapi dengan grafik interaktif pergerakan harga jual. Fitur ini memberikan Anda visibilitas penuh terhadap valuasi pasar saat ini, riwayat harga, dan membantu menentukan penawaran yang kompetitif.
            </p>
          </div>
        </div>

        <div class="row gy-4 align-items-center features-item mb-5">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
            <img src="<?= base_url('assets/images/layanan/negosiasi-virtual.jpg') ?>" class="img-fluid shadow" alt="Virtual Negotiation" style="width: 100%; height: 350px; object-fit: cover; border-radius: 12px;">
          </div>
          <div class="col-md-7" data-aos="fade-up">
            <h3 class="fw-bold">Ruang Negosiasi Virtual (Bidding Room)</h3>
            <p>Fasilitas komunikasi terenkripsi yang mempertemukan pembeli dan pemilik kapal tanpa perlu perantara fisik.</p>
            <ul>
              <li><i class="bi bi-check"></i> <span>Kirimkan nominal penawaran harga dengan satu klik persetujuan.</span></li>
              <li><i class="bi bi-check"></i> <span>Ajukan permintaan inspeksi langsung dari dasbor Anda.</span></li>
              <li><i class="bi bi-check"></i> <span>Rekam jejak percakapan tersimpan rapi sebagai dokumen legal awal.</span></li>
            </ul>
          </div>
        </div>

        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
            <img src="<?= base_url('assets/images/layanan/verifikasi.jpg') ?>" class="img-fluid shadow" alt="Verified Publisher" style="width: 100%; height: 350px; object-fit: cover; border-radius: 12px;">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
            <h3 class="fw-bold">Sistem Verifikasi Publisher & Broker</h3>
            <p class="fst-italic">
              Keamanan transaksi Anda adalah prioritas kami dengan sistem verifikasi akun yang ketat.
            </p>
            <p>
              Ketahui dengan siapa Anda bertransaksi. Setiap kapal yang diunggah menampilkan lencana verifikasi pengunggah beserta kontak komunikasi yang telah diautentikasi oleh tim keamanan kami untuk mencegah penipuan.
            </p>
          </div>
        </div>

      </div>

    </section>

    <!-- Katalog Section (Dipanggil dari folder Katalog) -->
    <?= view('App\Modules\Katalog\Views\katalog_section', ['kapal_bulk' => $kapal_bulk]) ?>
    <!-- End Katalog Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section dark-background">

      <!-- Pastikan path background ini sesuai dengan foldermu -->
      <img src="<?= base_url('assets/logis/img/testimonials-bg.jpg') ?>" class="testimonials-bg" alt="Testimonials Background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <!-- Testimonial 1 -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Budi Santoso</h3>
                <h4>CEO PT. Maritim Nusantara</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Drydock sangat membantu perusahaan kami dalam mengekspansi armada. Fitur <i>bidding</i> langsung dengan pemilik kapal membuat kami mendapatkan harga Bulk Carrier yang sangat kompetitif tanpa perantara yang berbelit.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <!-- Testimonial 2 -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sarah Wijaya</h3>
                <h4>Direktur Operasional (Ferry Line)</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Sebagai penyedia layanan kapal penumpang, keamanan adalah nomor satu. Data spesifikasi yang transparan dan layanan inspeksi dari Drydock memberi kami rasa aman yang luar biasa sebelum melakukan transaksi jutaan dolar.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <!-- Testimonial 3 -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Capt. Andi Pratama</h3>
                <h4>Fleet Manager</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Sangat efisien! Kami mendaftarkan 3 unit Tugboat lama kami di platform ini dan berhasil terjual dalam waktu kurang dari dua bulan. Proses verifikasi publisher-nya juga membuat semuanya terasa sangat profesional.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <!-- Testimonial 4 -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>David Chen</h3>
                <h4>Maritime Broker (Singapore)</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Jangkauan pasar global Drydock tidak main-main. Saya berhasil menghubungkan klien saya di Eropa dengan galangan kapal di Asia Tenggara dengan sangat mudah melalui dasbor ruang negosiasi virtual mereka.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <!-- Testimonial 5 -->
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>Michael R.</h3>
                <h4>Investor Maritim</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Selain menyediakan katalog yang luar biasa, tim Legal Drydock sangat membantu dalam pengurusan dokumen pergantian bendera (flagging). Ini benar-benar layanan hulu ke hilir (<i>end-to-end</i>) yang sempurna.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- ======= Faq Section ======= -->
    <section id="faq" class="faq section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Pertanyaan Umum (FAQ)</span>
        <h2>Pertanyaan Umum (FAQ)</h2>
        <p>Temukan jawaban untuk pertanyaan yang paling sering diajukan seputar layanan Drydock</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10">

            <div class="faq-container">

              <!-- FAQ 1 -->
              <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Bagaimana cara kerja sistem tawar-menawar (bidding) di Drydock?</h3>
                <div class="faq-content">
                  <p>Setelah Anda mendaftar dan memverifikasi akun, Anda dapat masuk ke Ruang Negosiasi Virtual pada halaman detail kapal. Anda bisa langsung mengajukan nominal penawaran harga kepada pemilik kapal. Jika pemilik setuju, sistem akan merekam kesepakatan tersebut untuk dilanjutkan ke tahap inspeksi dan legalisasi kontrak.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <!-- FAQ 2 -->
              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Apakah kapal yang dijual di katalog sudah melalui proses verifikasi?</h3>
                <div class="faq-content">
                  <p>Ya, tim surveyor independen kami melakukan peninjauan awal terhadap dokumen kelas dan riwayat operasional kapal sebelum diizinkan tampil di katalog. Namun, pembeli tetap sangat disarankan untuk menggunakan layanan "Inspeksi Teknis" kami sebelum melakukan pembayaran final.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <!-- FAQ 3 -->
              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Siapa saja yang bisa mendaftarkan (menjual) kapalnya di platform ini?</h3>
                <div class="faq-content">
                  <p>Pemilik langsung (Owner), perusahaan pelayaran, maupun agen broker maritim resmi dapat menjual kapal mereka di Drydock. Setiap pengunggah (publisher) wajib melewati tahap otentikasi KYC (Know Your Customer) untuk menjamin keamanan transaksi dan menghindari penipuan.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <!-- FAQ 4 -->
              <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Apakah Drydock membantu pengurusan dokumen kepemilikan dan asuransi?</h3>
                <div class="faq-content">
                  <p>Tentu. Kami memiliki layanan "Legal & Dokumen" yang terintegrasi. Tim ahli kami akan memfasilitasi proses pergantian kepemilikan (Bill of Sale), balik nama, pergantian bendera kapal (Flagging), hingga menghubungkan Anda dengan penyedia asuransi laut (Marine Insurance) terpercaya.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <!-- FAQ 5 -->
              <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Berapa lama estimasi pengiriman kapal (Ship Delivery) ke negara tujuan?</h3>
                <div class="faq-content">
                  <p>Estimasi pengiriman sangat bergantung pada jarak lokasi pelabuhan asal kapal dengan pelabuhan tujuan Anda, serta kondisi cuaca. Namun, melalui layanan "Ship Delivery" kami, kami akan menyediakan kru berpengalaman yang menjamin kapal tiba seefisien mungkin sambil terus memperbarui kordinat pelayarannya kepada Anda.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

        </div>

      </div>

    </section><!-- /Faq Section -->
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">

        <!-- Kolom 1: Tentang Aplikasi -->
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="#hero" class="logo d-flex align-items-center">
            <span class="sitename">Drydock</span>
          </a>
          <p>Drydock adalah platform <i>marketplace</i> penyedia layanan jual-beli kapal maritim terpercaya. Kami menghubungkan pemilik armada, agen, dan pembeli potensial dari seluruh dunia dengan proses transaksi yang aman, transparan, dan efisien.</p>
          <div class="social-links d-flex mt-4">
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <!-- Kolom 2: Tautan Menu Navbar (Sudah Disesuaikan dengan ID terbaru) -->
        <div class="col-lg-2 col-6 footer-links">
          <h4>Tautan Berguna</h4>
          <ul>
            <li><a href="#hero">Beranda</a></li>
            <li><a href="#tentangkami">Tentang Kami</a></li>
            <li><a href="#produk">Katalog</a></li>
            <li><a href="#berita">Berita</a></li>
            <li><a href="#laporan">Laporan</a></li>
            <li><a href="#faq">FAQ</a></li>
          </ul>
        </div>

        <!-- Kolom 3: Daftar Layanan -->
        <div class="col-lg-2 col-6 footer-links">
          <h4>Layanan Kami</h4>
          <ul>
            <li><a href="#layanan">Marketplace Armada</a></li>
            <li><a href="#layanan">Sistem Negosiasi</a></li>
            <li><a href="#layanan">Inspeksi Teknis</a></li>
            <li><a href="#layanan">Legal & Dokumen</a></li>
            <li><a href="#layanan">Ship Delivery</a></li>
          </ul>
        </div>

        <!-- Kolom 4: Kontak -->
        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Hubungi Kami</h4>
          <p>Gedung Maritim Tower, Lt. 12</p>
          <p>Jl. Pelabuhan Utama No. 1, Tanjung Priok</p>
          <p>Jakarta Utara, 14310, Indonesia</p>
          <p class="mt-4"><strong>Telepon:</strong> <span>+62 811 2345 6789</span></p>
          <p><strong>Email:</strong> <span>info@drydock.id</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>&copy; <span>Copyright</span> <strong class="px-1 sitename">Drydock</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- Sesuai lisensi dan kredit ke tim kamu -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> | Developed by <strong>Tim Pengembang Drydock</strong>
      </div>
    </div>

  </footer><!-- End Footer -->

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/logis/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/logis/vendor/php-email-form/validate.js') ?>"></script>
  <script src="<?= base_url('assets/logis/vendor/aos/aos.js') ?>"></script>
  <script src="<?= base_url('assets/logis/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
  <script src="<?= base_url('assets/logis/vendor/glightbox/js/glightbox.min.js') ?>"></script>
  <script src="<?= base_url('assets/logis/vendor/swiper/swiper-bundle.min.js') ?>"></script>

  <!-- Main JS File -->
  <script src="<?= base_url('assets/logis/js/main.js') ?>"></script>

</body>

</html>