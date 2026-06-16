<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
    <div class="brand">
        <i class="bi bi-ship"></i> Drydock Admin
    </div>

    <a href="<?= base_url('admin') ?>" >
        <i class="bi bi-speedometer2"></i> Dasbor
    </a>

    <a href="<?= base_url('admin/pengguna') ?>" class="active">
        <i class="bi bi-people"></i> Kelola Pengguna
    </a>

    <a href="<?= base_url('admin/supplier') ?>">
        <i class="bi bi-building"></i> Kelola Supplier
    </a>

    <a href="<?= base_url('admin/produk') ?>">
        <i class="bi bi-box-seam"></i> Kelola Produk
    </a>

    <a href="<?= base_url('penjualan') ?>">
        <i class="bi bi-cart-check"></i> Transaksi Penjualan
    </a>

    <div style="position:absolute; bottom:20px; width:100%;">
        <a href="<?= base_url('auth/logout') ?>" class="text-danger">
            <i class="bi bi-box-arrow-left"></i> Logout
        </a>
    </div>
</div>
<div class="main-content">

    <h3 class="mb-4">
        Kelola Pengguna
    </h3>

    <form method="get" class="mb-3">

        <input
            type="text"
            name="q"
            value="<?= esc($_GET['q'] ?? '') ?>"
            class="form-control"
            placeholder="Cari nama atau email">

    </form>

    <table class="table table-bordered table-hover bg-white">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th width="180">Aksi</th>
            </tr>

        </thead>

        <tbody>

        <?php if(!empty($users)): ?>

            <?php foreach($users as $u): ?>

            <tr>

                <td><?= $u['id'] ?></td>

                <td><?= esc($u['nama']) ?></td>

                <td><?= esc($u['email']) ?></td>

                <td>

                    <?php if($u['role'] == 'admin'): ?>

                        <span class="badge bg-danger">
                            Admin
                        </span>

                    <?php elseif($u['role'] == 'supplier'): ?>

                        <span class="badge bg-success">
                            Supplier
                        </span>

                    <?php else: ?>

                        <span class="badge bg-secondary">
                            User
                        </span>

                    <?php endif; ?>

                </td>

                <td>

                    <a
                        href="<?= base_url('admin/pengguna/detail/'.$u['id']) ?>"
                        class="btn btn-primary btn-sm">

                        Detail

                    </a>

                    <a
                        href="<?= base_url('admin/pengguna/hapus/'.$u['id']) ?>"
                        onclick="return confirm('Yakin hapus user ini?')"
                        class="btn btn-danger btn-sm">

                        Hapus

                    </a>

                </td>

            </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>

                <td colspan="5" class="text-center">

                    Tidak ada data pengguna

                </td>

            </tr>

        <?php endif; ?>

        </tbody>

    </table>

</div>

</table>
</body>
</html>