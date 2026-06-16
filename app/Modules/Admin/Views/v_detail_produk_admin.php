<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Agar form readonly terlihat beda (abu-abu terang) */
        .form-control:read-only { background-color: #f8f9fa; border-color: #e9ecef; }
    </style>
</head>
<body class="bg-light">

<div class="container-fluid py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-info-circle me-2"></i> Detail Kapal - <?= esc($kapal['ship_name'] ?? '-') ?>
            </h5>
            <a href="<?= base_url('admin/produk') ?>" class="btn btn-sm btn-secondary">Kembali</a>
        </div>

        <div class="card-body p-4">
            
            <?php 
                // Menentukan letak folder gambar
                $folder = 'bulk_carrier';
                if($tabel == 'passenger_ships') $folder = 'passenger';
                if($tabel == 'tugboats') $folder = 'tugboat';
            ?>
            
            <div class="row mb-4 justify-content-center">
                <div class="col-md-10 text-center">
                    <img src="<?= base_url('assets/images/' . $folder . '/' . ($kapal['image'] ?? 'default.jpg')) ?>" 
                         class="img-fluid rounded shadow-sm border" style="max-height: 450px; width: 100%; object-fit: cover;" alt="Foto Kapal">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Nama Kapal</label>
                    <input type="text" class="form-control fw-bold" value="<?= esc($kapal['ship_name'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Tipe Kapal</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['ship_type'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Class</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['class'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Bendera (Flag)</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['flag'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Tempat Dibangun</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['built_place'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Tanggal Dibangun</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['built_date'] ?? '-') ?>" readonly>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold text-muted small">LOA (m)</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['loa'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold text-muted small">Breadth (m)</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['breadth'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold text-muted small">Depth (m)</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['depth'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold text-muted small">Draft (m)</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['draft'] ?? '-') ?>" readonly>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold text-muted small">GT</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['gt'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold text-muted small">NT</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['nt'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Merk Mesin Utama</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['me_brand'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Daya Mesin Utama (kW)</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['me_power'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Kecepatan (Knots)</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['speed'] ?? '-') ?>" readonly>
                </div>

                <?php if($kategori == 'Bulk Carrier'): ?>
                <div class="col-12 mt-3 mb-2"><h6 class="text-primary border-bottom pb-2">Spesifikasi Bulk Carrier</h6></div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">DWT</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['dwt'] ?? '-') ?> Ton" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Capacity (m³)</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['capacity'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Jumlah Palka</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['cargo_hold_no'] ?? '-') ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Hatch Cover Type</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['hatch_cover_type'] ?? '-') ?>" readonly>
                </div>
                <?php endif; ?>

                <?php if($kategori == 'Passenger Ship'): ?>
                <div class="col-12 mt-3 mb-2"><h6 class="text-primary border-bottom pb-2">Spesifikasi Passenger Ship</h6></div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Kapasitas Penumpang</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['passengers'] ?? '-') ?> Orang" readonly>
                </div>
                <?php endif; ?>

                <?php if($kategori == 'Tugboat'): ?>
                <div class="col-12 mt-3 mb-2"><h6 class="text-primary border-bottom pb-2">Spesifikasi Tugboat</h6></div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Bollard Pull</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['bollard_pull'] ?? '-') ?> Ton" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold text-muted small">Propulsion Type</label>
                    <input type="text" class="form-control" value="<?= esc($kapal['propulsion_type'] ?? '-') ?>" readonly>
                </div>
                <?php endif; ?>

                <div class="col-12 mt-4 mb-2"><h6 class="text-primary border-bottom pb-2">Harga Jual</h6></div>
                
                <div class="col-md-12 mb-3">
                    <input type="text" class="form-control form-control-lg text-success fw-bold bg-white border-success" 
                           value="$ <?= number_format($kapal['price'] ?? 0, 0, ',', '.') ?>" readonly>
                </div>
            </div>

            <div class="text-end mt-4 border-top pt-3">
                <a href="<?= base_url('admin/produk') ?>" class="btn btn-secondary px-5">Kembali</a>
            </div>

        </div>
    </div>
</div>

</body>
</html>