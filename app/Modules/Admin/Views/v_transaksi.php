<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2><i class="bi bi-cart-check"></i> Riwayat Transaksi Penjualan</h2>
            <a href="<?= base_url('admin') ?>" class="btn btn-secondary">Kembali ke Dasbor</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Tanggal</th>
                            <th>Nama Pembeli</th>
                            <th>Nama Penjual (Supplier)</th>
                            <th>Total Nominal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($transaksi)): ?>
                            <?php foreach($transaksi as $t) : ?>
                            <tr>
                                <td>#TRX-<?= esc($t['id']); ?></td>
                                <td><?= date('d M Y H:i', strtotime($t['created_at'])); ?></td>
                                <td><strong><?= esc($t['nama_pembeli'] ?? '-'); ?></strong></td>
                                <td><?= esc($t['nama_penjual'] ?? '-'); ?></td>
                                <td>Rp <?= number_format($t['price'] ?? $t['amount'] ?? 0, 0, ',', '.'); ?></td>
                                <td>
                                    <?php 
                                        $status = strtolower($t['status'] ?? 'pending');
                                        if($status == 'success' || $status == 'selesai' || $status == 'accepted') {
                                            echo '<span class="badge bg-success">Selesai</span>';
                                        } elseif($status == 'failed' || $status == 'ditolak') {
                                            echo '<span class="badge bg-danger">Ditolak</span>';
                                        } else {
                                            echo '<span class="badge bg-warning text-dark">Diproses</span>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada riwayat transaksi penjualan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>