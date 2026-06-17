<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* CSS DISAMAKAN PERSIS DENGAN v_dashboard */
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
            z-index: 1000;
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
    </style>
</head>

<body class="bg-light">

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

        <a href="<?= base_url('admin/produk') ?>" class="active">
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
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0 text-dark"><i class="bi bi-box-seam me-2"></i> Kelola Produk (Kapal)</h3>

            <div>
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-success dropdown-toggle shadow-sm" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Kapal
                    </button>
                    <ul class="dropdown-menu shadow">
                        <li><a class="dropdown-item" href="<?= base_url('admin/produk/tambah/bulk-carrier') ?>"><i class="bi bi-ship me-2"></i> Bulk Carrier</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('admin/produk/tambah/passenger-ship') ?>"><i class="bi bi-life-preserver me-2"></i> Passenger Ship</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('admin/produk/tambah/tugboat') ?>"><i class="bi bi-cursor me-2"></i> Tugboat</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <?php if (session()->getFlashdata('sukses')) : ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm">
                <i class="bi bi-check-circle me-2"></i> <?= session()->getFlashdata('sukses') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle border">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Kapal</th>
                                <th>Kategori</th>
                                <th>Supplier / Penjual</th>
                                <th>Harga</th>
                                <th class="text-center" width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($produk)): ?>
                                <?php $i = 1; foreach ($produk as $p) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><strong><?= esc($p['ship_name']); ?></strong></td>
                                        <td><span class="badge bg-secondary"><?= esc($p['kategori']); ?></span></td>
                                        <td><?= esc($p['penjual'] ?? 'Tidak Diketahui'); ?></td>
                                        <td class="fw-bold text-success">Rp <?= number_format($p['price'], 0, ',', '.'); ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/produk/detail/' . $p['nama_tabel'] . '/' . $p['id']) ?>" class="btn btn-sm btn-info text-white" title="Lihat Detail Admin">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="<?= base_url('admin/produk/edit/' . $p['nama_tabel'] . '/' . $p['id']) ?>" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="<?= base_url('admin/produk/hapus/' . $p['nama_tabel'] . '/' . $p['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kapal ini secara permanen?')" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Belum ada data kapal di sistem.</td>
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