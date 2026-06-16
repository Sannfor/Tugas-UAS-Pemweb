<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Transaksi</title>

    <link href="<?= base_url('assets/images/drydock-logo-nobg.png') ?>" rel="icon">
    <link href="<?= base_url('assets/images/drydock-logo-nobg.png') ?>" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="<?= base_url('assets/logis/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/aos/aos.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">

    <!-- Main CSS -->
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
          <li><a href="<?= base_url('beranda') ?>">Beranda</a></li>
          <li><a href="<?= base_url('beranda#tentangkami') ?>">Tentang Kami</a></li>
          <li><a href="<?= base_url('beranda#layanan') ?>">Layanan</a></li>
          <li><a href="<?= base_url('beranda#produk') ?>">Katalog</a></li>

          <!-- Dropdown Menu Informasi -->
          <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li>
                <a href="<?= base_url('berita') ?>">Berita</a>
              </li>
              <li><a href="<?= base_url('laporan') ?>" class="active">Laporan</a></li>
              <li><a href="<?= base_url('beranda#faq') ?>">FAQ</a></li>
            </ul>
          </li>

          <li><a href="<?= base_url('beranda#contact') ?>">Kontak</a></li>
          <li><a href="<?= base_url('profil') ?>">Profil</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
<section class="py-5" style="margin-top:120px;">



<div class="container">

    <!-- Banner -->
    <div class="position-relative overflow-hidden rounded shadow mb-5"
         style="background:url('<?= base_url('assets/images/banner-report.jpg') ?>') center center/cover; min-height:350px;">

        <div style="position:absolute; inset:0; "></div>

        <div class="position-relative text-center text-white py-5">

            <h1 class="fw-bold mt-5 text-white "
                style="font-size: 3rem; text-shadow: 2px 2px 10px rgb(0, 0, 0);">
                Mainstream Ships Trading Report
            </h1>

            <p class="fs-4 text-white"
                style="text-shadow: 1px 1px 5px rgb(0, 0, 0);">
                Check Transaction Report
            </p>

            <a href="<?= base_url('laporan/cetak') ?>"
            target="_blank"
            class="btn btn-primary btn-lg px-5">
                <i class="fas fa-file-pdf"></i>
                Download PDF
            </a>

        </div>

    </div>

    <!-- Judul -->
    <div class="text-center mb-4">
        <h2 class="fw-bold">
            Transaction Report
        </h2>
    </div>

    <!-- Tabel -->
    <div id="laporan-table">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Buyer ID</th>
                        <th>Seller ID</th>
                        <th>Ship ID</th>
                        <th>Harga Transaksi</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>

                </thead>

                <tbody>

                <?php if (!empty($laporan)): ?>

                    <?php $no = 1; ?>

                    <?php foreach ($laporan as $row): ?>

                        <tr>

                            <td><?= $no++ ?></td>

                            <td><?= esc($row['id']) ?></td>

                            <td><?= esc($row['buyer_name']) ?></td>

                            <td><?= esc($row['seller_name']) ?></td>

                            <td><?= esc($row['ship_name']) ?></td>

                            <td>
                                $
                                <?= number_format($row['transaction_price'], 0, ',', '.') ?>
                            </td>

                            <td><?= esc($row['status']) ?></td>

                            <td><?= date('Y-m-d', strtotime($row['created_at'])) ?></td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="8" class="text-center">
                            Tidak ada data laporan
                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</section>

<script src="<?= base_url('assets/logis/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>