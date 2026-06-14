<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - DryDock</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/logis/css/main.css') ?>" rel="stylesheet">


    <style>
        body {
            background: #f4f7fc;
        }

        .profile-section {
            padding-top: 140px;
            padding-bottom: 80px;
            min-height: 100vh;
        }

        .profile-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }

        .profile-header {
            background: linear-gradient(135deg,#0d42ff,#001973);
            color: white;
            padding: 40px;
            text-align: center;
        }

        .profile-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: rgba(255,255,255,.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: bold;
            margin: auto;
            margin-bottom: 15px;
        }

        .form-control[readonly] {
            background: #f8f9fa;
        }

        .logout-btn {
            background: #dc3545;
            border: none;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            transition: .3s;
        }

        .logout-btn:hover {
            background: #bb2d3b;
            color: white;
        }
    </style>
</head>

<body>

<!-- HEADER -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="<?= base_url() ?>" class="logo d-flex align-items-center me-auto">
        <img src="<?= base_url('assets/images/drydock-logo-2w.png') ?>" alt="Drydock Logo" style="max-height: 140px;">
      </a>

     

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?= base_url('beranda') ?>">Beranda</a></li>
           <li><a href="#tentangkami">Tentang Kami</a></li>
          <li><a href="#produk">Katalog</a></li>
          <li><a href="#layanan">Layanan</a></li>
          <li><a href="#berita">Berita</a></li>
          <li><a href="#kontak">Kontak</a></li>
          <li><a href="#laporan">Laporan</a></li>
          <li><a href="<?= base_url('profil') ?>" class="active">Profil</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    
    </div>
  </header>

<!-- PROFILE -->
<section class="profile-section">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card profile-card">

                    <div class="profile-header">

                        <div class="profile-avatar">
                            <?= strtoupper(substr($user['nama'], 0, 1)) ?>
                        </div>

                        <h3 class="mb-1"><?= esc($user['nama']) ?></h3>
                        <p class="mb-0"><?= esc($user['role']) ?></p>

                    </div>

                    <div class="card-body p-4">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= esc($user['nama']) ?>"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= esc($user['email']) ?>"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Role</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= esc($user['role']) ?>"
                                   readonly>
                        </div>

                       <hr class="my-4">

                        <h4 class="fw-bold mb-3">
                            📄 Riwayat Transaksi
                        </h4>

                        <div class="table-responsive">

                            <table class="table table-hover align-middle">

                                <thead class="table-primary">

                                    <tr>
                                        
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Kapal</th>
                                        <th>Kategori</th>
                                        <th>Transaksi</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                    </tr>

                                </thead>

                               <tbody>

                                    <?php if (!empty($negotiations)) : ?>

                                        <?php $no = 1; ?>

                                        <?php foreach ($negotiations as $row) : ?>

                                            <tr>

                                                <td><?= $no++ ?></td>

                                                

                                                <td>
                                                    <?= date('d M Y', strtotime($row['created_at'])) ?>
                                                </td>

                                                <td>Kapal #<?= $row['ship_id'] ?></td>

                                                <td>-</td>

                                                <td>

                                                    <?php if ($row['buyer_id'] == session()->get('id')) : ?>
                                                        <span class="badge bg-success">
                                                            Pembelian
                                                        </span>
                                                    <?php else : ?>
                                                        <span class="badge bg-warning text-dark">
                                                            Penjualan
                                                        </span>
                                                    <?php endif; ?>

                                                </td>

                                                <td>
                                                    Rp <?= number_format($row['offer_price'], 0, ',', '.') ?>                           

                                                <td>

                                                    <?php if ($row['status'] == 'accepted') : ?>
                                                        <span class="badge bg-primary">
                                                            Selesai
                                                        </span>

                                                    <?php elseif ($row['status'] == 'pending') : ?>
                                                        <span class="badge bg-secondary">
                                                            Diproses
                                                        </span>

                                                    <?php else : ?>
                                                        <span class="badge bg-danger">
                                                            Ditolak
                                                        </span>
                                                    <?php endif; ?>

                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                    <?php else : ?>

                                        <tr>
                                            <td colspan="6" class="text-center">
                                                Belum ada riwayat transaksi.
                                            </td>
                                        </tr>

                                    <?php endif; ?>

                                    </tbody>

                            </table>

                        </div>

                        <?php if (!empty($user['nik'])) : ?>
                        <div class="mb-3">
                            <label class="form-label fw-bold">NIK</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= esc($user['nik']) ?>"
                                   readonly>
                        </div>

                        <?php endif; ?>

                        

                        <div style="text-align: center;">
                            <a href="<?= base_url('profil/jual-kapal') ?>" class="btn btn-primary btn-lg">
                                Jual Kapal
                            </a>

                            <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-lg">
                                Logout
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

</body>
</html>