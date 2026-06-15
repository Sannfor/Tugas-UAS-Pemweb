<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Menjadi Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="bi bi-building"></i> Pendaftaran Profil Supplier</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="alert alert-info">
                            Anda harus melengkapi data perusahaan/entitas penjualan Anda sebelum dapat mengiklankan kapal di Katalog Drydock.
                        </div>

                        <form action="<?= base_url('supplier/simpan_pendaftaran') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Perusahaan / Agensi</label>
                                <input type="text" name="nama_perusahaan" class="form-control" placeholder="Contoh: PT. Sukses Maritim Nusantara" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nama Kontak Person (PIC)</label>
                                    <input type="text" name="nama_kontak" class="form-control" placeholder="Contoh: Budi Santoso" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nomor Telepon / WhatsApp</label>
                                    <input type="text" name="telepon" class="form-control" placeholder="Contoh: 081234567890" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Email Bisnis</label>
                                <input type="email" name="email" class="form-control" placeholder="Contoh: sales@maritimnusantara.com" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Alamat Kantor / Operasional</label>
                                <textarea name="alamat" rows="3" class="form-control" placeholder="Contoh: Jl. Pelabuhan Raya No. 12, Tanjung Priok, Jakarta Utara" required></textarea>
                            </div>

                            <div class="text-end">
                                <a href="<?= base_url('profil') ?>" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-success">Daftar Menjadi Supplier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>