<?php 
/**
 * @var string $title
 * @var array $kapal_bulk
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="<?= base_url('assets/logis/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="p-4">

    <div class="container-fluid">
        <h2 class="mb-4">Daftar Kapal Bulk Carrier</h2>

        <?php if(session()->getFlashdata('sukses')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('sukses') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <a href="#" class="btn btn-primary mb-3">Tambah Kapal Baru</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Kapal</th>
                    <th>Bendera (Flag)</th>
                    <th>Kapasitas</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach($kapal_bulk as $k) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $k['ship_name']; ?></td>
                    <td><?= $k['flag']; ?></td>
                    <td><?= $k['capacity']; ?> m³</td>
                    <td>$ <?= number_format($k['price'], 0, ',', '.'); ?></td>
                    <td>
                        <span class="badge bg-<?= ($k['status'] == 'available') ? 'success' : 'secondary' ?>">
                            <?= ucfirst($k['status']); ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?= base_url('produk/hapus/' . $k['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kapal ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>