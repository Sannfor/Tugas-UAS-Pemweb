<?php 
/**
 * @var string $title
 * @var array $supplier
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <link href="<?= base_url('assets/logis/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="p-4 bg-light">

    <div class="container bg-white p-4 rounded shadow-sm">
        <h2 class="mb-4"><i class="bi bi-building"></i> Data Supplier / Agen</h2>

        <a href="#" class="btn btn-primary mb-3">+ Tambah Supplier Baru</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Kontak Person</th>
                    <th>Email / Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($supplier)): ?>
                    <?php $i = 1; foreach($supplier as $s) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= esc($s['nama_perusahaan']); ?></td>
                        <td><?= esc($s['nama_kontak']); ?></td>
                        <td>
                            <?= esc($s['email']); ?><br>
                            <small class="text-muted"><?= esc($s['telepon']); ?></small>
                        </td>
                        <td>
                            <span class="badge bg-<?= ($s['status_verifikasi'] == 'Verified') ? 'success' : 'warning' ?>">
                                <?= esc($s['status_verifikasi']); ?>
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info text-white">Detail</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data supplier.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>