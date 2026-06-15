<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Laporan <link href="<?= base_url('assets/images/drydock-logo-nobg.png') ?>" rel="icon">
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
  <link href="<?= base_url('assets/logis/css/main.css') ?>" rel="stylesheet"></title>
</head>
<body>
    <section class="py-5">

 
<div class="container">

    <!-- Banner -->
    <div class="position-relative overflow-hidden rounded shadow mb-5"
         style="
         background:url('<?= base_url('assets/images/banner-report.jpg') ?>') center center/cover;
         min-height:350px;">

        <div style="
            position:absolute;
            inset:0;
            background:rgba(10,20,40,.75);">
        </div>

        <div class="position-relative text-center text-white py-5">

            <h1 class="fw-bold mt-5">
                Mainstream Ships Trading Report
            </h1>

            <p class="fs-4">
                Check Transaction Report
            </p>

            <a href="#laporan-table"
               class="btn btn-primary btn-lg px-5">
                View More
            </a>

        </div>

    </div>


    <!-- Judul -->
    <div class="text-center mb-4">

        <h2 class="fw-bold">
            Domestic Sales
        </h2>

    </div>


    <!-- Filter -->
    <form method="get">

        <div class="row justify-content-center mb-5">

            <div class="col-md-3">

                <select name="kategori"
                        class="form-select">

                    <option value="">
                        Semua Kategori
                    </option>

                    <option value="bulk">
                        Bulk Carrier
                    </option>

                    <option value="passenger">
                        Passenger Ship
                    </option>

                    <option value="tugboat">
                        Tugboat
                    </option>

                </select>

            </div>


            <div class="col-md-2">

                <input type="number"
                       name="tahun"
                       min="2020"
                       max="<?= date('Y') ?>"
                       class="form-control"
                       placeholder="Tahun">

            </div>


            <div class="col-md-4">

                <input type="text"
                       name="keyword"
                       class="form-control"
                       placeholder="Cari nama kapal">

            </div>


            <div class="col-md-2">

                <button class="btn btn-primary w-100">
                    Search
                </button>

            </div>

        </div>

    </form>


    <!-- Tabel -->
    <div id="laporan-table">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>No</th>
                        <th>Nama Kapal</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Tanggal</th>

                    </tr>

                </thead>

                <tbody>

                    <?php if(!empty($laporan)): ?>

                        <?php $no=1; ?>

                        <?php foreach($laporan as $row): ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td><?= esc($row['ship_name']) ?></td>

                                <td><?= esc($row['kategori']) ?></td>

                                <td>
                                    $
                                    <?= number_format($row['price'],0,',','.') ?>
                                </td>

                                <td>
                                    <?= $item['status'] ?? '-' ?>
                                </td>

                                <td>
                                    <?= date('Y-m-d',strtotime($row['created_at'])) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="6" class="text-center">

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

</body>
</html>