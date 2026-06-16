<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Supplier</title>

 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>

    body{
        background:#f4f7fc;
        font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
    }

    .profile-card{
        background:#fff;
        border-radius:15px;
        padding:35px;
        box-shadow:0 4px 15px rgba(0,0,0,.08);
    }

    .profile-image{
        width:140px;
        height:140px;
        object-fit:cover;
        border-radius:50%;
        border:5px solid #0d6efd;
    }

    .profile-avatar{
        width:140px;
        height:140px;
        border-radius:50%;
        background:#0d6efd;
        color:#fff;
        font-size:50px;
        font-weight:bold;
        display:flex;
        align-items:center;
        justify-content:center;
        margin:auto;
    }

    .info-label{
        font-weight:600;
        color:#6c757d;
    }

    .stat-card{
        background:#fff;
        border-radius:12px;
        padding:20px;
        text-align:center;
        box-shadow:0 2px 10px rgba(0,0,0,.05);
    }

    .stat-number{
        font-size:28px;
        font-weight:bold;
        color:#0d6efd;
    }

</style>
 

</head>
<body>

<div class="container py-5">

 
<div class="d-flex justify-content-end mb-4">

    <a href="<?= base_url('admin/supplier') ?>"
       class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>
        Kembali

    </a>

</div>

<div class="profile-card">

    <div class="row">

        <div class="col-md-4 text-center">

            <?php if(!empty($supplier['profile_image'])): ?>

                <img
                    src="<?= base_url('uploads/profile/'.$supplier['profile_image']) ?>"
                    class="profile-image">

            <?php else: ?>

                <div class="profile-avatar">
                    <?= strtoupper(substr($supplier['nama'],0,1)) ?>
                </div>

            <?php endif; ?>

            <h3 class="mt-3">
                <?= esc($supplier['nama']) ?>
            </h3>

            <span class="badge bg-success fs-6">
                Supplier
            </span>

        </div>

        <div class="col-md-8">

            <h4 class="mb-4">
                Informasi Supplier
            </h4>

            <div class="row mb-3">

                <div class="col-md-4 info-label">
                    Nama Perusahaan
                </div>

                <div class="col-md-8">
                    <?= esc($supplier['company_name']) ?>
                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-4 info-label">
                    Email
                </div>

                <div class="col-md-8">
                    <?= esc($supplier['email']) ?>
                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-4 info-label">
                    NPWP
                </div>

                <div class="col-md-8">
                    <?= esc($supplier['npwp']) ?>
                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-4 info-label">
                    No Rekening
                </div>

                <div class="col-md-8">
                    <?= esc($supplier['no_bank']) ?>
                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-4 info-label">
                    Domisili Pelabuhan
                </div>

                <div class="col-md-8">
                    <?= esc($supplier['domisili_pelabuhan']) ?>
                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-4 info-label">
                    Bergabung
                </div>

                <div class="col-md-8">
                    <?= date('d M Y', strtotime($supplier['created_at'])) ?>
                </div>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-md-3">

        <div class="stat-card">

            <div class="stat-number">
                <?= $total_bulk ?>
            </div>

            <div>
                Bulk Carrier
            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="stat-card">

            <div class="stat-number">
                <?= $total_tugboat ?>
            </div>

            <div>
                Tugboat
            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="stat-card">

            <div class="stat-number">
                <?= $total_passenger ?>
            </div>

            <div>
                Passenger Ship
            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="stat-card">

            <div class="stat-number">
                <?= $total_bulk + $total_tugboat + $total_passenger ?>
            </div>

            <div>
                Total Produk
            </div>

        </div>

    </div>

</div>

<div class="text-center mt-4">

    <a
        href="<?= base_url('admin/supplier/produk/'.$supplier['id']) ?>"
        class="btn btn-primary btn-lg">

        <i class="bi bi-box-seam"></i>
        Lihat Produk Supplier

    </a>

</div>
 

</div>

</body>
</html>
