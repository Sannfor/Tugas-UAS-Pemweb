<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Supplier</title>

 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body{
        background-color:#f4f7fc;
        font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
    }

    .sidebar{
        height:100vh;
        width:250px;
        position:fixed;
        top:0;
        left:0;
        background:#0e1d34;
        padding-top:20px;
    }

    .sidebar .brand{
        padding:15px 25px;
        font-size:1.5rem;
        font-weight:bold;
        color:#fff;
        border-bottom:1px solid rgba(255,255,255,.1);
        margin-bottom:20px;
    }

    .sidebar a{
        padding:12px 25px;
        text-decoration:none;
        display:block;
        color:rgba(255,255,255,.7);
    }

    .sidebar a:hover,
    .sidebar a.active{
        background:rgba(255,255,255,.1);
        color:#fff;
        border-left:4px solid #0d6efd;
    }

    .main-content{
        margin-left:250px;
        padding:30px;
    }

    .page-card{
        background:#fff;
        border-radius:12px;
        box-shadow:0 2px 10px rgba(0,0,0,.05);
        padding:25px;
    }

    .supplier-avatar{
        width:45px;
        height:45px;
        border-radius:50%;
        background:#0d6efd;
        color:#fff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-weight:bold;
    }
</style>
 

</head>
<body>

<div class="sidebar">

 
<div class="brand">
    <i class="bi bi-ship"></i> Drydock Admin
</div>

<a href="<?= base_url('admin') ?>">
    <i class="bi bi-speedometer2"></i>
    Dasbor
</a>

<a href="<?= base_url('admin/pengguna') ?>">
    <i class="bi bi-people"></i>
    Kelola Pengguna
</a>

<a href="<?= base_url('admin/supplier') ?>" class="active">
    <i class="bi bi-building"></i>
    Kelola Supplier
</a>

<a href="#">
    <i class="bi bi-box-seam"></i>
    Kelola Produk
</a>

<a href="#">
    <i class="bi bi-tags"></i>
    Kategori Kapal
</a>

<a href="#">
    <i class="bi bi-cart-check"></i>
    Transaksi Penjualan
</a>

<div style="position:absolute;bottom:20px;width:100%;">
    <a href="<?= base_url('logout') ?>" class="text-danger">
        <i class="bi bi-box-arrow-left"></i>
        Logout
    </a>
</div>
 

</div>

<div class="main-content">

 
<div class="page-card">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="mb-0">
            <i class="bi bi-building"></i>
            Kelola Supplier
        </h3>

    </div>

    <form method="get" class="mb-4">

        <input
            type="text"
            name="q"
            value="<?= esc($_GET['q'] ?? '') ?>"
            class="form-control"
            placeholder="Cari supplier...">

    </form>

    <table class="table table-bordered table-hover align-middle">

        <thead class="table-dark">

            <tr>
                <th width="70">Foto</th>
                <th>Nama</th>
                <th>Perusahaan</th>
                <th>Email</th>
                <th>Pelabuhan</th>
                <th width="100">Aksi</th>
            </tr>

        </thead>

        <tbody>

        <?php if(!empty($suppliers)): ?>

            <?php foreach($suppliers as $s): ?>

            <tr>

                <td>

                    <?php if(!empty($s['profile_image'])): ?>

                        <img
                            src="<?= base_url('uploads/profile/'.$s['profile_image']) ?>"
                            width="45"
                            height="45"
                            class="rounded-circle"
                            style="object-fit:cover;">

                    <?php else: ?>

                        <div class="supplier-avatar">
                            <?= strtoupper(substr($s['nama'],0,1)) ?>
                        </div>

                    <?php endif; ?>

                </td>

                <td><?= esc($s['nama']) ?></td>

                <td><?= esc($s['company_name']) ?></td>

                <td><?= esc($s['email']) ?></td>

                <td><?= esc($s['domisili_pelabuhan']) ?></td>

                <td>

                    <a
                        href="<?= base_url('admin/supplier/detail/'.$s['id']) ?>"
                        class="btn btn-primary btn-sm">

                        Detail

                    </a>

                </td>

            </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>

                <td colspan="6" class="text-center">

                    Tidak ada data supplier

                </td>

            </tr>

        <?php endif; ?>

        </tbody>

    </table>

</div>
 

</div>

</body>
</html>
