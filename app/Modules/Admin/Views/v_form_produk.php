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
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="bi bi-ship me-2"></i> <?= empty($produk) ? 'Tambah' : 'Edit' ?> Kapal - <?= ucwords(str_replace('-', ' ', esc($kategori))) ?>
                </h5>
                <a href="<?= base_url('admin/produk') ?>" class="btn btn-sm btn-secondary">Kembali</a>
            </div>

            <div class="card-body p-4">
                <form action="<?= base_url('admin/produk/simpan') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <input type="hidden" name="kategori" value="<?= esc($kategori) ?>">
                    <input type="hidden" name="id" value="<?= esc($produk['id'] ?? '') ?>">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted small">Nama Kapal</label>
                            <input type="text" name="ship_name" class="form-control" value="<?= esc($produk['ship_name'] ?? '') ?>" placeholder="Contoh: SMS Nassau" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted small">Tipe Kapal</label>
                            <input type="text" name="ship_type" class="form-control" value="<?= esc($produk['ship_type'] ?? '') ?>" placeholder="Contoh: Bulk Carrier">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted small">Class</label>
                            <input type="text" name="class" class="form-control" value="<?= esc($produk['class'] ?? '') ?>" placeholder="Contoh: BKI / NK / RINA">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted small">Bendera (Flag)</label>
                            <input type="text" name="flag" class="form-control" value="<?= esc($produk['flag'] ?? '') ?>" placeholder="Contoh: Indonesia">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted small">Tempat Dibangun</label>
                            <input type="text" name="built_place" class="form-control" value="<?= esc($produk['built_place'] ?? '') ?>" placeholder="Contoh: Batam">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted small">Tanggal Dibangun</label>
                            <input type="date" name="built_date" class="form-control" value="<?= esc($produk['built_date'] ?? '') ?>">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold text-muted small">LOA (m)</label>
                            <input type="number" step="0.01" name="loa" class="form-control" value="<?= esc($produk['loa'] ?? '') ?>" placeholder="Cth: 120.50">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold text-muted small">Breadth (m)</label>
                            <input type="number" step="0.01" name="breadth" class="form-control" value="<?= esc($produk['breadth'] ?? '') ?>" placeholder="Cth: 20.00">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold text-muted small">Depth (m)</label>
                            <input type="number" step="0.01" name="depth" class="form-control" value="<?= esc($produk['depth'] ?? '') ?>" placeholder="Cth: 10.00">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold text-muted small">Draft (m)</label>
                            <input type="number" step="0.01" name="draft" class="form-control" value="<?= esc($produk['draft'] ?? '') ?>" placeholder="Cth: 5.50">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold text-muted small">GT</label>
                            <input type="number" step="0.01" name="gt" class="form-control" value="<?= esc($produk['gt'] ?? '') ?>" placeholder="Cth: 2999.00">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label fw-bold text-muted small">NT</label>
                            <input type="number" step="0.01" name="nt" class="form-control" value="<?= esc($produk['nt'] ?? '') ?>" placeholder="Cth: 1679.00">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted small">Merk Mesin Utama</label>
                            <input type="text" name="me_brand" class="form-control" value="<?= esc($produk['me_brand'] ?? '') ?>" placeholder="Contoh: ZICHAI / Caterpillar">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted small">Daya Mesin Utama (kW)</label>
                            <input type="number" name="me_power" class="form-control" value="<?= esc($produk['me_power'] ?? '') ?>" placeholder="Contoh: 735">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted small">Kecepatan (Knots)</label>
                            <input type="number" step="0.01" name="speed" class="form-control" value="<?= esc($produk['speed'] ?? '') ?>" placeholder="Contoh: 10.00">
                        </div>

                        <?php if ($kategori == 'bulk-carrier'): ?>
                            <div class="col-12 mt-3 mb-2">
                                <h6 class="text-primary border-bottom pb-2">Spesifikasi Bulk Carrier</h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted small">DWT</label>
                                <input type="number" name="dwt" class="form-control" value="<?= esc($produk['dwt'] ?? '') ?>" placeholder="Contoh: 5045">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted small">Capacity (m³)</label>
                                <input type="number" step="0.01" name="capacity" class="form-control" value="<?= esc($produk['capacity'] ?? '') ?>" placeholder="Contoh: 10000">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted small">Jumlah Palka (Cargo Hold No)</label>
                                <input type="number" name="cargo_hold_no" class="form-control" value="<?= esc($produk['cargo_hold_no'] ?? '') ?>" placeholder="Contoh: 2">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted small">Hatch Cover Type</label>
                                <input type="text" name="hatch_cover_type" class="form-control" value="<?= esc($produk['hatch_cover_type'] ?? '') ?>" placeholder="Contoh: Hydraulic folding">
                            </div>
                        <?php endif; ?>

                        <?php if ($kategori == 'passenger-ship'): ?>
                            <div class="col-12 mt-3 mb-2">
                                <h6 class="text-primary border-bottom pb-2">Spesifikasi Passenger Ship</h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted small">Kapasitas Penumpang</label>
                                <input type="number" name="passengers" class="form-control" value="<?= esc($produk['passengers'] ?? '') ?>" placeholder="Contoh: 350">
                            </div>
                        <?php endif; ?>

                        <?php if ($kategori == 'tugboat'): ?>
                            <div class="col-12 mt-3 mb-2">
                                <h6 class="text-primary border-bottom pb-2">Spesifikasi Tugboat</h6>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted small">Bollard Pull (Ton)</label>
                                <input type="number" step="0.01" name="bollard_pull" class="form-control" value="<?= esc($produk['bollard_pull'] ?? '') ?>" placeholder="Contoh: 45.00">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-muted small">Propulsion Type</label>
                                <input type="text" name="propulsion_type" class="form-control" value="<?= esc($produk['propulsion_type'] ?? '') ?>" placeholder="Contoh: ASD / Z-Drive">
                            </div>
                        <?php endif; ?>

                        <div class="col-12 mt-4 mb-2">
                            <h6 class="text-primary border-bottom pb-2">Harga & Media</h6>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold text-muted small">Harga Jual (USD)</label>
                            <input type="number" name="price" class="form-control form-control-lg text-primary fw-bold" value="<?= esc($produk['price'] ?? '') ?>" placeholder="Contoh: 2500000" required>
                        </div>

                        <!-- Bagian Foto Kapal yang telah diperbarui -->
                        <div class="col-md-12 mb-4">
                            <label class="form-label fw-bold text-muted small">Foto Kapal</label>

                            <?php if (!empty($produk['image'])): ?>
                                <?php
                                $folder = 'bulk_carrier';
                                if ($kategori == 'passenger-ship') $folder = 'passenger';
                                if ($kategori == 'tugboat') $folder = 'tugboat';
                                ?>
                                <div class="mb-3 d-flex align-items-center p-3 bg-white border rounded shadow-sm">
                                    <img src="<?= base_url('assets/images/' . $folder . '/' . $produk['image']) ?>"
                                        alt="Foto Kapal Saat Ini"
                                        class="img-thumbnail me-3" style="max-height: 80px; border-radius: 8px;">
                                    <div>
                                        <span class="badge bg-secondary mb-1">File saat ini:</span><br>
                                        <code class="text-dark fs-6"><?= esc($produk['image']) ?></code>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Trik Input Group untuk Nama File -->
                            <div class="input-group">
                                <label class="input-group-text bg-secondary text-white" for="inputFoto">
                                    <i class="bi bi-upload"></i>
                                </label>

                                <!-- Input file asli disembunyikan -->
                                <input type="file" name="image" id="inputFoto" class="d-none" accept="image/*">

                                <!-- Input teks dummy untuk menampilkan nama file -->
                                <input type="text" id="teksNamaFile" class="form-control"
                                    value="<?= !empty($produk['image']) ? esc($produk['image']) : 'Tidak ada file yang dipilih' ?>"
                                    readonly onclick="document.getElementById('inputFoto').click();" style="cursor: pointer;">
                            </div>

                            <small class="text-muted mt-2 d-block">
                                <i class="bi bi-info-circle me-1"></i>
                                <?= !empty($produk['image']) ? 'Biarkan kotak di atas seperti itu jika Anda tidak ingin mengubah foto.' : 'Pilih file gambar untuk diunggah.' ?>
                            </small>
                        </div>

                        <!-- Script untuk mengubah teks saat file dipilih -->
                        <script>
                            document.getElementById('inputFoto').addEventListener('change', function(e) {
                                var teksInput = document.getElementById('teksNamaFile');
                                if (e.target.files.length > 0) {
                                    teksInput.value = e.target.files[0].name;
                                    teksInput.classList.add('text-primary', 'fw-bold');
                                }
                            });
                        </script>
                    </div>

                    <div class="text-end mt-2">
                        <button type="submit" class="btn btn-primary px-5">
                            <i class="bi bi-save me-1"></i> Simpan Data Kapal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>