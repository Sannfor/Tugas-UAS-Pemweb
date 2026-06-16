<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengguna</title>

 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body{
        background:#f4f7fc;
        font-family:'Segoe UI',sans-serif;
    }

    .container-custom{
        max-width:1200px;
        margin:auto;
        padding:40px 20px;
    }

    .topbar{
        background:#fff;
        border-radius:15px;
        padding:20px 30px;
        margin-bottom:25px;
        box-shadow:0 4px 20px rgba(0,0,0,.05);

        display:flex;
        justify-content:space-between;
        align-items:center;
    }

    .detail-card{
        border:none;
        border-radius:20px;
        overflow:hidden;
        box-shadow:0 10px 30px rgba(0,0,0,.08);
    }

    .profile-avatar{
        width:130px;
        height:130px;
        margin:auto;

        border-radius:50%;

        background:linear-gradient(135deg,#0d6efd,#4f8cff);

        color:#fff;

        display:flex;
        align-items:center;
        justify-content:center;

        font-size:48px;
        font-weight:700;

        box-shadow:0 10px 25px rgba(13,110,253,.3);
    }

    .info-label{
        font-size:.9rem;
        color:#6c757d;
        font-weight:600;
        margin-bottom:6px;
    }

    .info-box{
        background:#f8f9fa;
        border:1px solid #e9ecef;
        border-radius:12px;
        padding:12px 15px;
        min-height:55px;
    }

    .section-divider{
        border-top:1px solid #eee;
        margin-top:25px;
        padding-top:25px;
    }
    .profile-photo{
    width:130px;
    height:130px;
    border-radius:50%;
    object-fit:cover;
    display:block;
    margin:auto;
    border:5px solid #fff;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
    }

    .profile-avatar{
        width:130px;
        height:130px;
        margin:auto;

        border-radius:50%;

        background:linear-gradient(135deg,#0d6efd,#4f8cff);

        color:#fff;

        display:flex;
        align-items:center;
        justify-content:center;

        font-size:48px;
        font-weight:700;

        box-shadow:0 10px 25px rgba(13,110,253,.3);
    }
</style>
 

</head>
<body>

<div class="container-custom">

 
<div class="topbar">

    <h3 class="mb-0">
        <i class="bi bi-person-badge"></i>
        Detail Pengguna
    </h3>

    <a href="<?= base_url('admin/pengguna') ?>"
       class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>
        Kembali

    </a>

</div>

<div class="card detail-card">

    <div class="card-body p-5">

        <div class="text-center mb-5">

            <?php if(!empty($pengguna['profile_image'])): ?>

                <img
                    src="<?= base_url('uploads/profile/'.$pengguna['profile_image']) ?>"
                    alt="Foto Profil"
                    class="profile-photo">

            <?php else: ?>

                <div class="profile-avatar">
                    <?= strtoupper(substr($pengguna['nama'],0,1)) ?>
                </div>

                <div class="text-muted mt-2">
                    <i class="bi bi-camera-fill"></i>
                    Foto Profil Pengguna
                </div>

            <?php endif; ?>

            <h2 class="mt-4 mb-2">
                <?= esc($pengguna['nama']) ?>
            </h2>

            <?php if($pengguna['role'] == 'admin'): ?>

                <span class="badge bg-danger px-3 py-2">
                    Admin
                </span>

            <?php elseif($pengguna['role'] == 'supplier'): ?>

                <span class="badge bg-success px-3 py-2">
                    Supplier
                </span>

            <?php else: ?>

                <span class="badge bg-secondary px-3 py-2">
                    User
                </span>

            <?php endif; ?>

            <div class="text-muted mt-3">
                ID User #<?= $pengguna['id'] ?>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-4">

                <div class="info-label">
                    Email
                </div>

                <div class="info-box">
                    <?= esc($pengguna['email']) ?>
                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="info-label">
                    NPWP
                </div>

                <div class="info-box">
                    <?= esc($pengguna['npwp'] ?? '-') ?>
                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="info-label">
                    No Rekening
                </div>

                <div class="info-box">
                    <?= esc($pengguna['no_bank'] ?? '-') ?>
                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="info-label">
                    Domisili Pelabuhan
                </div>

                <div class="info-box">
                    <?= esc($pengguna['domisili_pelabuhan'] ?? '-') ?>
                </div>

            </div>

            <div class="col-md-12 mb-4">

                <div class="info-label">
                    Nama Perusahaan
                </div>

                <div class="info-box">
                    <?= esc($pengguna['company_name'] ?? '-') ?>
                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="info-label">
                    Tanggal Daftar
                </div>

                <div class="info-box">
                    <?= !empty($pengguna['created_at']) ? date('d F Y', strtotime($pengguna['created_at'])) : '-' ?>
                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="info-label">
                    Status Akun
                </div>

                <div class="info-box">

                    <span class="badge bg-success">
                        Aktif
                    </span>

                </div>

            </div>

        </div>

        <div class="section-divider text-end">

            

            <a href="<?= base_url('admin/pengguna/hapus/'.$pengguna['id']) ?>"
               class="btn btn-danger"
               onclick="return confirm('Yakin ingin menghapus pengguna ini?')">

                <i class="bi bi-trash"></i>
                Hapus Pengguna

            </a>

        </div>

    </div>

</div>
 

</div>

</body>
</html>
