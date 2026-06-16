<?php

/**
 * @var string $title
 * @var array $kapal
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= esc($title) ?></title>

    <link href="<?= base_url('assets/images/drydock-logo-nobg.png') ?>" rel="icon">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/css/main.css') ?>" rel="stylesheet">

    <style>
        /* Tambahan sedikit CSS agar tabel rapi */
        .spec-table th {
            background-color: #f8f9fa;
            width: 40%;
        }

        .price-tag {
            color: #0d6efd;
            font-weight: 700;
            font-size: 2.5rem;
        }
    </style>
</head>

<body class="service-details-page">

    <header id="header" class="header d-flex align-items-center sticky-top" style="background-color: #0e1d34;">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="<?= base_url() ?>" class="logo d-flex align-items-center me-auto">
                <img src="<?= base_url('assets/images/drydock-logo-nobg.png') ?>" alt="Drydock Logo" style="max-height: 50px;">
            </a>
            <a class="btn-getstarted" href="<?= base_url() ?>">Kembali ke Beranda</a>
        </div>
    </header>

    <main class="main">

        <div class="py-4 bg-light border-bottom">
            <div class="container d-flex justify-content-between align-items-center">

                <h2 class="mb-0 fw-bold text-dark" style="font-size: 28px;">
                    <?= esc($kapal['ship_name']) ?>
                </h2>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="font-weight: 600; font-size: 15px;">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-primary text-decoration-none">Katalog</a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Detail Kapal</li>
                    </ol>
                </nav>

            </div>
        </div>

        <section id="service-details" class="service-details section">
            <div class="container">

                <div class="row gy-5">
                    <div class="col-lg-7">
                        <img src="<?= base_url(
                                        isset($kapal['passengers'])
                                            ? 'assets/images/passenger/' . $kapal['image']
                                            : (isset($kapal['bollard_pull'])
                                                ? 'assets/images/tugboat/' . $kapal['image']
                                                : 'assets/images/bulk_carrier/' . $kapal['image'])
                                    ); ?>"
                            class="img-fluid rounded shadow-sm w-100">

                        <div class="mt-4 p-4 border rounded">

                            <?php if (session()->getFlashdata('sukses')) : ?>
                                <div class="alert alert-success border-2">
                                    <i class="bi bi-chat-dots-fill me-2"></i> <?= session()->getFlashdata('sukses') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger border-2">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>


                            <h3 class="price-tag mb-0"><sup>$</sup><?= number_format($kapal['price'], 0, ',', '.'); ?></h3>
                            <p class="text-muted mt-2"><i class="bi bi-info-circle"></i> Harga dapat dinegosiasikan. Silakan hubungi kami untuk survei kapal.</p>

                            <?php if (isset($is_blocked) && $is_blocked) : ?>
                                <button class="btn btn-secondary btn-lg w-100 mt-2" disabled>
                                    <i class="bi bi-x-octagon-fill me-2"></i> Fitur Tawar Terkunci
                                </button>
                                <p class="text-danger small mt-2 text-center fw-bold">
                                    <i class="bi bi-exclamation-triangle"></i> Anda telah ditolak 2 kali oleh penjual pada kapal ini. Ganti akun untuk menawar ulang.
                                </p>
                            <?php else : ?>
                                <button class="btn btn-primary btn-lg w-100 mt-2" data-bs-toggle="modal" data-bs-target="#modalTawar">
                                    <i class="bi bi-chat-left-dots me-2"></i> Hubungi Penjual / Tawar Harga
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0 fs-5"><i class="bi bi-card-list me-2"></i> Spesifikasi Teknis</h4>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-bordered table-hover mb-0 spec-table">
                                    <tbody>
                                        <tr>
                                            <th>DWT</th>
                                            <td><?= esc($kapal['dwt'] ?? '-') ?> Ton</td>
                                        </tr>

                                        <tr>
                                            <th>Gross Tonnage (GT)</th>
                                            <td><?= esc($kapal['gt'] ?? '-') ?> Ton</td>
                                        </tr>

                                        <tr>
                                            <th>Net Tonnage (NT)</th>
                                            <td><?= esc($kapal['nt'] ?? '-') ?> Ton</td>
                                        </tr>

                                        <tr>
                                            <th>Jumlah Palka</th>
                                            <td><?= esc($kapal['cargo_hold_no'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Panjang Hatch</th>
                                            <td><?= esc($kapal['hatch_length'] ?? '-') ?> m</td>
                                        </tr>

                                        <tr>
                                            <th>Lebar Hatch</th>
                                            <td><?= esc($kapal['hatch_width'] ?? '-') ?> m</td>
                                        </tr>

                                        <tr>
                                            <th>Kapasitas Muatan</th>
                                            <td><?= esc($kapal['capacity'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Derrick Crane</th>
                                            <td><?= esc($kapal['derrick_crane'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Tipe Konstruksi Hull</th>
                                            <td><?= esc($kapal['hull_construction_type'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Tipe Hatch Cover</th>
                                            <td><?= esc($kapal['hatch_cover_type'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Kapasitas Penumpang</th>
                                            <td><?= esc($kapal['passengers'] ?? '-') ?> Orang</td>
                                        </tr>

                                        <tr>
                                            <th>Bollard Pull</th>
                                            <td><?= esc($kapal['bollard_pull'] ?? '-') ?> Ton</td>
                                        </tr>

                                        <tr>
                                            <th>Merk Rudder Propeller</th>
                                            <td><?= esc($kapal['rudder_propeller_brand'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Fire Fighting</th>
                                            <td><?= esc($kapal['fire_fighting'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Propulsion Type</th>
                                            <td><?= esc($kapal['propulsion_type'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Merk Mesin</th>
                                            <td><?= esc($kapal['me_brand'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Model Mesin</th>
                                            <td><?= esc($kapal['main_engine_model'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Daya Mesin</th>
                                            <td><?= esc($kapal['me_power'] ?? '-') ?> kW</td>
                                        </tr>

                                        <tr>
                                            <th>RPM</th>
                                            <td><?= esc($kapal['rpm'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Kecepatan</th>
                                            <td><?= esc($kapal['speed'] ?? '-') ?> Knots</td>
                                        </tr>

                                        <tr>
                                            <th>Merk Mesin Bantu</th>
                                            <td><?= esc($kapal['aux_engine_brand'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Jumlah Mesin Bantu</th>
                                            <td><?= esc($kapal['aux_engine_no'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Daya Mesin Bantu</th>
                                            <td><?= esc($kapal['aux_engine_power'] ?? '-') ?> kW</td>
                                        </tr>

                                        <tr>
                                            <th>Konsumsi BBM</th>
                                            <td><?= esc($kapal['oil_consumption'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Standar Emisi NOX</th>
                                            <td><?= esc($kapal['nox_emission_standard'] ?? '-') ?></td>
                                        </tr>

                                        <tr>
                                            <th>Tanggal Available</th>
                                            <td><?= esc($kapal['release_date'] ?? '-') ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main>

    <footer id="footer" class="footer dark-background mt-auto py-3 text-center">
        <div class="container">
            <p class="mb-0">© Copyright <strong>Drydock</strong>. All Rights Reserved</p>
        </div>
    </footer>

    <script src="<?= base_url('assets/logis/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <div class="modal fade" id="modalTawar" tabindex="-1" aria-labelledby="modalTawarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalTawarLabel"><i class="bi bi-cash-coin me-2"></i> Ajukan Penawaran Harga</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('kapal/tawar') ?>" method="post">
                    <?= csrf_field() ?> <!-- ✅ TAMBAHKAN INI -->

                    <div class="modal-body p-4">
                        <p>Anda sedang menawar kapal: <strong><?= esc($kapal['ship_name']) ?></strong></p>
                        <p class="text-muted small">Harga Asli: $<?= number_format($kapal['price'], 0, ',', '.') ?></p>

                        <input type="hidden" name="ship_id" value="<?= $kapal['id'] ?>">

                        <div class="mb-3">
                            <label for="offer_price" class="form-label fw-bold">Masukkan Harga Tawaran Anda ($)</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control form-control-lg" id="offer_price" name="offer_price" placeholder="Contoh: 2400000" required>
                            </div>
                            <div class="form-text text-warning"><i class="bi bi-shield-lock"></i> Kesempatan menawar terbatas. Penjual berhak menolak jika terlalu rendah.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success"><i class="bi bi-send-fill me-1"></i> Kirim Tawaran</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>