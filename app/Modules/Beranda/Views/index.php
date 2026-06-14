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

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="<?= base_url() ?>" class="logo d-flex align-items-center me-auto">
        <img src="<?= base_url('assets/images/drydock-logo-2w.png') ?>" alt="Drydock Logo" style="max-height: 140px;">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Beranda</a></li>
          <li><a href="#tentangkami">Tentang Kami</a></li>
          <li><a href="#produk">Katalog</a></li>
          <li><a href="#layanan">Layanan</a></li>
          <li><a href="#berita">Berita</a></li>
          <li><a href="#kontak">Kontak</a></li>
          <li><a href="#laporan">Laporan</a></li>
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
                <img src="<?= base_url('assets/logis/img/service-1.jpg') ?>" alt="Katalog Armada" class="img-fluid">
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
                <img src="<?= base_url('assets/logis/img/service-2.jpg') ?>" alt="Sistem Negosiasi" class="img-fluid">
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
                <img src="<?= base_url('assets/logis/img/service-3.jpg') ?>" alt="Inspeksi Kapal" class="img-fluid">
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
                <img src="<?= base_url('assets/logis/img/service-4.jpg') ?>" alt="Pengurusan Dokumen Legal" class="img-fluid">
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
                <img src="<?= base_url('assets/logis/img/service-5.jpg') ?>" alt="Pengiriman Kapal" class="img-fluid">
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
                <img src="<?= base_url('assets/logis/img/service-6.jpg') ?>" alt="Pembiayaan Maritim" class="img-fluid">
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
            <img src="<?= base_url('assets/logis/img/features-1.jpg') ?>" class="img-fluid rounded shadow" alt="Advanced Filter">
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
            <img src="<?= base_url('assets/logis/img/features-2.jpg') ?>" class="img-fluid rounded shadow" alt="Price Trends">
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
            <img src="<?= base_url('assets/logis/img/features-3.jpg') ?>" class="img-fluid rounded shadow" alt="Virtual Negotiation">
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
            <img src="<?= base_url('assets/logis/img/features-4.jpg') ?>" class="img-fluid rounded shadow" alt="Verified Publisher">
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

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background">

      <img src="<?= base_url('assets/logis/img/testimonials-bg.jpg') ?>" class="testimonials-bg" alt="Testimonials">

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

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Frequently Asked Questions</span>
        <h2>Frequently Asked Questions</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10">

            <div class="faq-container">

              <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                <div class="faq-content">
                  <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                <div class="faq-content">
                  <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h3>
                <div class="faq-content">
                  <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

        </div>

      </div>

    </section><!-- /Faq Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Drydock</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>United States</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Drydock</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> | <a href="https://bootstrapmade.com/tools/">DevTools</a>
      </div>
    </div>

  </footer>

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