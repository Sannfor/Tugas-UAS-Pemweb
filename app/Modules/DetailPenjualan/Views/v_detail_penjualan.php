<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7fc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        /* Sidebar Styles */
        .sidebar { height: 100vh; width: 250px; position: fixed; top: 0; left: 0; background-color: #0e1d34; padding-top: 20px; color: #fff; transition: all 0.3s; z-index: 1000; }
        .sidebar .brand { padding: 15px 25px; font-size: 1.5rem; font-weight: bold; border-bottom: 1px solid rgba(255,255,255,0.1); margin-bottom: 20px; }
        .sidebar a { padding: 12px 25px; text-decoration: none; font-size: 1rem; color: rgba(255,255,255,0.7); display: block; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background-color: rgba(255,255,255,0.1); color: #fff; border-left: 4px solid #0d6efd; }
        .sidebar i { margin-right: 10px; }
        
        /* Main Content Styles */
        .main-content { margin-left: 250px; padding: 30px; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="brand">
        <i class="bi bi-ship"></i> Drydock Admin
    </div>
    <a href="<?= base_url('admin') ?>">
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
</div>

<div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0 text-dark"><i class="bi bi-receipt me-2"></i> Daftar Transaksi Penjualan</h3>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle border">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">ID Transaksi</th>
                            <th>Waktu Transaksi</th>
                            <th>Pembeli</th>
                            <th>Supplier (Penjual)</th>
                            <th>Kapal Terjual</th>
                            <th>Nominal (USD)</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($transaksi)): ?>
                            <?php foreach($transaksi as $t): ?>
                            <tr>
                                <td class="text-center fw-bold text-primary">#TRX-<?= esc($t['id']) ?></td>
                                <td><?= date('d M Y, H:i', strtotime($t['created_at'])) ?></td>
                                <td>
                                    <div class="fw-bold"><?= esc($t['nama_pembeli'] ?? 'User Dihapus') ?></div>
                                    <small class="text-muted">ID: <?= esc($t['buyer_id']) ?></small>
                                </td>
                                <td>
                                    <div class="fw-bold"><?= esc($t['nama_penjual'] ?? 'User Dihapus') ?></div>
                                    <small class="text-muted">ID: <?= esc($t['seller_id']) ?></small>
                                </td>
                                <td>
                                    <div class="fw-bold"><?= esc($t['nama_kapal']) ?></div>
                                    <span class="badge bg-secondary"><?= esc($t['kategori_kapal']) ?></span>
                                </td>
                                <td class="fw-bold text-success">
                                    $ <?= number_format($t['transaction_price'], 2, ',', '.') ?>
                                </td>
                                <td class="text-center">
                                    <?php 
                                        $status = strtolower($t['status']);
                                        if($status == 'completed' || $status == 'success') {
                                            echo '<span class="badge bg-success px-3 py-2">Selesai</span>';
                                        } elseif($status == 'pending') {
                                            echo '<span class="badge bg-warning text-dark px-3 py-2">Proses</span>';
                                        } else {
                                            echo '<span class="badge bg-danger px-3 py-2">'.esc($t['status']).'</span>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                    Belum ada data transaksi penjualan.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>