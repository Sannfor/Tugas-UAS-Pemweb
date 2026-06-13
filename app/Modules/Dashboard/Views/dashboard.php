<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('app/Modules/Admin/Views/css/dashboard.css') ?>">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar col-md-3 col-lg-2 p-3">
            <h4 class="text-center mb-4"><i class="fas fa-ship"></i> KapalMarket</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link text-white active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fas fa-box"></i> Produk Kapal</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fas fa-users"></i> Mitra</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fas fa-shopping-cart"></i> Transaksi</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fas fa-chart-bar"></i> Laporan</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fas fa-map"></i> Mapping</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10">
            <!-- Topbar -->
            <div class="topbar p-3 d-flex justify-content-between align-items-center">
                <h5>Welcome back, <?= session()->get('nama') ?>!</h5>
                <div>
                    <a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>

            <div class="p-4">
                <h2>Dashboard Overview</h2>
                
                <!-- Stat Cards -->
                <div class="row g-4 mt-3">
                    <div class="col-md-3">
                        <div class="card stat-card text-white p-4">
                            <i class="fas fa-ship fa-3x mb-3"></i>
                            <h4>248</h4>
                            <p>Total Kapal</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card text-white p-4">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <h4>124</h4>
                            <p>Mitra Aktif</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card text-white p-4">
                            <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                            <h4>87</h4>
                            <p>Transaksi Hari Ini</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card text-white p-4">
                            <i class="fas fa-dollar-sign fa-3x mb-3"></i>
                            <h4>$2.4M</h4>
                            <p>Total Penjualan</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card p-4">
                            <h5>Recent Transactions</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Pesanan</th>
                                        <th>Pembeli</th>
                                        <th>Kapal</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>#KP-3921</td><td>Ahmad Santoso</td><td>MV. Ocean Queen</td><td>$245,000</td><td><span class="badge bg-success">Selesai</span></td></tr>
                                    <tr><td>#KP-3920</td><td>PT. Laut Biru</td><td>Tugboat Hercules</td><td>$89,500</td><td><span class="badge bg-warning">Pending</span></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>