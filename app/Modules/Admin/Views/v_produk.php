<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f7fc;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #0e1d34;
            color: #fff;
            display: flex;
            flex-direction: column;
            box-shadow: 0 0 15px rgba(0, 0, 0, .15);
        }

        .brand {
            padding: 18px 25px;
            font-size: 22px;
            font-weight: 700;
            border-bottom: 1px solid rgba(255, 255, 255, .1);
        }

        .sidebar-menu {
            flex: 1;
            margin-top: 15px;
        }

        .sidebar a {
            display: block;
            padding: 12px 25px;
            color: rgba(255, 255, 255, .8);
            text-decoration: none;
            transition: .3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255, 255, 255, .1);
            color: #fff;
            border-left: 4px solid #0d6efd;
        }

        .sidebar-footer {
            margin-bottom: 20px;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            background: #fff;
            padding: 20px 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .table-hover tbody tr:hover {
            background: #f5f8ff;
        }

        @media(max-width:768px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main-content {
                margin-left: 0;
            }

        }
    </style>
</head>

<body class="bg-light">
    <div class="sidebar">

        <div class="brand">
            <i class="bi bi-ship"></i> Drydock Admin
        </div>

        <div class="sidebar-menu">

            <a href="<?= base_url('admin') ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
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

            <a href="<?= base_url('penjualan') ?>">
                <i class="bi bi-cart-check"></i> Transaksi Penjualan
            </a>

        </div>

        <div class="sidebar-footer">

            <a href="<?= base_url('auth/logout') ?>" class="text-danger">
                <i class="bi bi-box-arrow-left"></i> Logout
            </a>

        </div>

    </div>

    <div class="main-content">
        <div class="topbar">

            <h3 class="mb-0">
                <i class="bi bi-box-seam"></i>
                Kelola Produk (Kapal)
            </h3>

            <div>

                <div class="btn-group me-2">

                    <button
                        type="button"
                        class="btn btn-success dropdown-toggle"
                        data-bs-toggle="dropdown">

                        <i class="bi bi-plus-circle"></i>
                        Tambah Kapal

                    </button>

                    <ul class="dropdown-menu shadow">

                        <li>
                            <a class="dropdown-item"
                                href="<?= base_url('admin/produk/tambah/bulk-carrier') ?>">
                                <i class="bi bi-ship me-2"></i>
                                Bulk Carrier
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                                href="<?= base_url('admin/produk/tambah/passenger-ship') ?>">
                                <i class="bi bi-life-preserver me-2"></i>
                                Passenger Ship
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                                href="<?= base_url('admin/produk/tambah/tugboat') ?>">
                                <i class="bi bi-cursor me-2"></i>
                                Tugboat
                            </a>
                        </li>

                    </ul>

                </div>

                <a href="<?= base_url('admin') ?>" class="btn btn-secondary">
                    Dashboard
                </a>

            </div>

        </div>

        <?php if (session()->getFlashdata('sukses')) : ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="bi bi-check-circle me-2"></i> <?= session()->getFlashdata('sukses') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-hover table-bordered align-middle">
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
                            <?php $i = 1;
                            foreach ($produk as $p) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><strong><?= esc($p['ship_name']); ?></strong></td>
                                    <?php

                                    switch ($p['kategori']) {

                                        case 'Bulk Carrier':
                                            $badge = 'primary';
                                            break;

                                        case 'Passenger Ship':
                                            $badge = 'success';
                                            break;

                                        case 'Tugboat':
                                            $badge = 'warning';
                                            break;

                                        default:
                                            $badge = 'secondary';
                                    }

                                    ?>

                                    <td>

                                        <span class="badge bg-<?= $badge ?>">
                                            <?= esc($p['kategori']) ?>
                                        </span>

                                    </td>
                                    <td><?= esc($p['penjual'] ?? 'Tidak Diketahui'); ?></td>
                                    <td class="text-end fw-bold">

                                        Rp <?= number_format($p['price'], 0, ',', '.') ?>

                                    </td>
                                    <td class="text-center">

                                        <div class="btn-group">

                                            <a href="<?= base_url('admin/produk/detail/' . $p['nama_tabel'] . '/' . $p['id']) ?>"
                                                class="btn btn-info btn-sm text-white">

                                                <i class="bi bi-eye"></i>

                                            </a>

                                            <a href="<?= base_url('admin/produk/edit/' . $p['nama_tabel'] . '/' . $p['id']) ?>"
                                                class="btn btn-warning btn-sm">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>

                                            <a href="<?= base_url('admin/produk/hapus/' . $p['nama_tabel'] . '/' . $p['id']) ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus kapal ini?')">

                                                <i class="bi bi-trash"></i>

                                            </a>

                                        </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>