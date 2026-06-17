<?php 
/**
 * @var string $title
 * @var array $user
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { background-color: #f4f7fc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        /* Sidebar Styles */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0; left: 0;
            background-color: #0e1d34;
            padding-top: 20px;
            color: #fff;
            transition: all 0.3s;
        }
        .sidebar .brand { padding: 15px 25px; font-size: 1.5rem; font-weight: bold; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 20px; }
        .sidebar a {
            padding: 12px 25px;
            text-decoration: none;
            font-size: 1rem;
            color: rgba(255,255,255,0.7);
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover, .sidebar a.active { background-color: rgba(255,255,255,0.1); color: #fff; border-left: 4px solid #0d6efd; }
        .sidebar i { margin-right: 10px; }
        
        /* Main Content Styles */
        .main-content { margin-left: 250px; padding: 30px; }
        .topbar { background: #fff; padding: 15px 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center; }
        .stat-card { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); border-left: 5px solid #0d6efd; }
        .stat-card.success { border-left-color: #198754; }
        .stat-card.warning { border-left-color: #ffc107; }
        .chart-container { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-top: 30px; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="brand">
        <i class="bi bi-ship"></i> Drydock Admin
    </div>

    <a href="<?= base_url('admin') ?>" class="active">
        <i class="bi bi-speedometer2"></i> Dasbor
    </a>

    <a href="<?= base_url('admin/pengguna') ?>">
        <i class="bi bi-people"></i> Kelola Pengguna
    </a>

    <a href="<?= base_url('admin/supplier') ?>">
        <i class="bi bi-building"></i> Kelola Supplier
    </a>

    <a href="<?= base_url('admin/produk') ?>">
        <i class="bi bi-box-seam"></i> Kelola Produk
    </a>

    <a href="<?= base_url('detailpenjualan') ?>">
        <i class="bi bi-cart-check"></i> Transaksi Penjualan
    </a>

    <div style="position:absolute; bottom:20px; width:100%;">
        <a href="<?= base_url('auth/logout') ?>" class="text-danger">
            <i class="bi bi-box-arrow-left"></i> Logout
        </a>
    </div>
</div>

<div class="main-content">

    <div class="topbar">
        <h4 class="mb-0 text-dark">Ringkasan Dasbor</h4>

        <div class="d-flex align-items-center">
            <span class="me-3 fw-bold">
                Halo, <?= esc($user['nama'] ?? 'Admin') ?>!
            </span>

            <div style="
                width:40px;
                height:40px;
                background:#0d6efd;
                color:white;
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                font-weight:bold;
            ">
                <?= strtoupper(substr($user['nama'] ?? 'A',0,1)) ?>
            </div>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row g-4">

        <div class="col-md-4">
            <div class="stat-card">
                <h6 class="text-muted">Total Pengguna Aktif</h6>
                <h2 class="fw-bold"><?= $total_pengguna ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card success">
                <h6 class="text-muted">
                    Total Supplier
                </h6>

                <h2 class="fw-bold">
                    <?= $total_supplier ?>
                </h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card success">
                <h6 class="text-muted">Total Produk</h6>
                <h2 class="fw-bold"><?= $total_produk ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card warning">
                <h6 class="text-muted">Kapal Terjual</h6>
                <h2 class="fw-bold"><?= $total_terjual ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card warning">
                <h6 class="text-muted">Jumlah Kategori</h6>
                <h2 class="fw-bold"><?= $total_kategori ?></h2>
            </div>
        </div>
        

    </div>

    <!-- Grafik Utama -->
    <div class="row mt-4">

        <div class="col-lg-8">
            <div class="chart-container">
                <h5 class="mb-4">
                    Trafik Penjualan 6 Bulan Terakhir
                </h5>

                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="chart-container">

                <h5 class="mb-4">
                    Status Transaksi
                </h5>

                <ul class="list-group list-group-flush">

                    <li class="list-group-item d-flex justify-content-between">
                        Menunggu Konfirmasi
                        <span class="badge bg-warning rounded-pill">
                            14
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Negosiasi
                        <span class="badge bg-info rounded-pill">
                            2
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Selesai
                        <span class="badge bg-success rounded-pill">
                            123
                        </span>
                    </li>

                </ul>

            </div>
        </div>

    </div>

    <!-- Grafik Batang + Top Buyer -->
    <div class="row mt-4">

        <div class="col-lg-6">

            <div class="chart-container">

                <h5 class="mb-4">
                    Penjualan Bulanan
                </h5>

                <canvas id="barChart"></canvas>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="chart-container">

                <h5 class="mb-4">
                    Top 5 Pembeli
                </h5>

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Total Transaksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php if(!empty($top_buyers)): ?>

                        <?php foreach($top_buyers as $i => $buyer): ?>

                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= esc($buyer['nama']) ?></td>
                                <td><?= esc($buyer['total_transaksi']) ?></td>
                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="3" class="text-center">
                                Belum ada data
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script>

// LINE CHART
const ctx = document.getElementById('salesChart').getContext('2d');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: <?= $bulan_grafik ?>,

        datasets: [{

            label: 'Jumlah Kapal Terjual',

            data: <?= $data_penjualan ?>,

            backgroundColor: 'rgba(13,110,253,0.15)',

            borderColor: '#0d6efd',

            borderWidth: 3,

            fill: true,

            tension: 0.4,

            pointRadius: 5

        }]

    },

    options: {

        responsive: true,

        plugins: {
            legend: {
                display: false
            }
        },

        scales: {
            y: {
                beginAtZero: true
            }
        }

    }

});


// BAR CHART
const barCtx = document.getElementById('barChart').getContext('2d');

new Chart(barCtx, {

    type: 'bar',

    data: {

        labels: <?= $bulan_grafik ?>,

        datasets: [{

            label: 'Kapal Terjual',

            data: <?= $data_penjualan ?>,

            backgroundColor: [
                '#0d6efd',
                '#198754',
                '#ffc107',
                '#dc3545',
                '#6f42c1',
                '#20c997'
            ],

            borderRadius: 8

        }]

    },

    options: {

        responsive: true,

        plugins: {
            legend: {
                display: false
            }
        },

        scales: {
            y: {
                beginAtZero: true
            }
        }

    }

});

</script>

</body>
</html>