<?php 
/**
 * @var string $title
 * @var array $kategori
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
        <h2 class="mb-4"><i class="bi bi-tags"></i> Data Kategori Kapal</h2>

        <a href="#" class="btn btn-primary mb-3">+ Tambah Kategori Baru</a>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama Kategori</th>
                    <th width="20%">Slug / URL</th>
                    <th width="40%">Deskripsi</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($kategori)): ?>
                    <?php $i = 1; foreach($kategori as $k) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><strong><?= esc($k['nama_kategori']); ?></strong></td>
                        <td>
                            <code><?= esc($k['slug'] ?? '-') ?></code>
                        </td>

                        <td>
                            <?= esc($k['deskripsi'] ?? '-') ?>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning">Edit</button>
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data kategori.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>