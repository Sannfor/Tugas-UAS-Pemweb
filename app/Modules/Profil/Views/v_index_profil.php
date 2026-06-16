<?php

/**
 * @var array $kategori
 */
?>
<!DOCTYPE html>
<html lang="en">

<script>
function confirmSupplier()
{
    let npwp = document.querySelector('[name="npwp"]').value.trim();
    let rekening = document.querySelector('[name="no_bank"]').value.trim();
    let domisili = document.querySelector('[name="domisili_pelabuhan"]').value.trim();
    let company = document.querySelector('[name="company_name"]').value.trim();

    if(npwp && rekening && domisili && company)
    {
        event.preventDefault();

        Swal.fire({
            title: 'Menjadi Supplier?',
            html: `
                <p>
                    Anda akan mendapatkan akses untuk
                    <b>menjual kapal</b> di marketplace.
                </p>

                <div style="text-align:left">
                    <b>Keuntungan:</b>
                    <ul>
                        <li>Menjual kapal</li>
                        <li>Mengelola listing kapal</li>
                        <li>Menerima penawaran pembeli</li>
                    </ul>
                </div>
            `,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Ya, Jadi Supplier',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if(result.isConfirmed)
            {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data supplier sedang disimpan...',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });

                setTimeout(() => {
                    document.querySelector('form').submit();
                }, 1500);
            }

        });

        return false;
    }

    return true;
}
</script>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - DryDock</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/logis/css/main.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/logis/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="<?= base_url() ?>" class="logo d-flex align-items-center me-auto">
        <img src="<?= base_url('assets/images/drydock-logo-2w.png') ?>" alt="Drydock Logo" style="max-height: 140px;">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?= base_url('beranda') ?>">Beranda</a></li>
          <li><a href="<?= base_url('beranda#tentangkami') ?>">Tentang Kami</a></li>
          <li><a href="<?= base_url('beranda#layanan') ?>">Layanan</a></li>
          <li><a href="<?= base_url('beranda#produk') ?>">Katalog</a></li>

          <!-- Dropdown Menu Informasi -->
          <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li>
                <a href="<?= base_url('berita') ?>">Berita</a>
              </li>
              <li><a href="<?= base_url('laporan') ?>" class="active">Laporan</a></li>
              <li><a href="<?= base_url('beranda#faq') ?>">FAQ</a></li>
            </ul>
          </li>

          <li><a href="<?= base_url('beranda#contact') ?>">Kontak</a></li>
          <li><a href="<?= base_url('profil') ?>">Profil</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

<section class="profile-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card profile-card">
                    <div class="profile-header">
                        <?php if(!empty($user['profile_image'])): ?>

                            <img src="<?= base_url('uploads/profile/' . $user['profile_image']) ?>"
                                class="profile-avatar-image">

                        <?php else: ?>

                            <div class="profile-avatar">
                                <?= strtoupper(substr($user['nama'] ?? $user['username'] ?? 'U', 0, 1)) ?>
                            </div>

                        <?php endif; ?>

                        <h3 class="mb-1"><?= esc($user['nama'] ?? $user['username'] ?? 'Nama User') ?></h3>
                        <p class="mb-0"><?= esc($user['role'] ?? 'Role') ?></p>
                    </div>

                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= esc($user['nama'] ?? $user['username'] ?? '') ?>"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= esc($user['email'] ?? '') ?>"
                                   readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Role</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= esc($user['role'] ?? '') ?>"
                                   readonly>
                        </div>

                        <form action="<?= base_url('profil/update') ?>"
                            method="post"
                            enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label>NPWP</label>
                                <input type="text"
                                    name="npwp"
                                    class="form-control"
                                    value="<?= esc($user['npwp'] ?? '') ?>">
                            </div>

                            <div class="mb-3">
                                <label>No Rekening</label>
                                <input type="text"
                                    name="no_bank"
                                    class="form-control"
                                    value="<?= esc($user['no_bank'] ?? '') ?>">
                            </div>

                            <div class="mb-3">
                                <label>Domisili Pelabuhan</label>
                                <input type="text"
                                    name="domisili_pelabuhan"
                                    class="form-control"
                                    value="<?= esc($user['domisili_pelabuhan'] ?? '') ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Company</label>

                                <input type="text"
                                    name="company_name"
                                    class="form-control"
                                    value="<?= esc($user['company_name'] ?? '') ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">
                                    Foto Profil
                                </label>

                                <input type="file"
                                    name="profile_image"
                                    class="form-control"
                                    accept="image/*">
                            </div>

                            <button type="submit"
                                    class="btn btn-success px-4"
                                    onclick="return confirmSupplier(event)">
                                <i class="bi bi-building-add"></i>
                                Simpan Perubahan
                            </button>
                        </form>

                       <hr class="my-4">

                        <h4 class="fw-bold mb-3">📄 Riwayat Transaksi</h4>

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
                                                <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                                                <td>Kapal #<?= esc($row['ship_id']) ?></td>
                                                <td>-</td>
                                                <td>
                                                    <?php if ($row['buyer_id'] == session()->get('id')) : ?>
                                                        <span class="badge bg-success">Pembelian</span>
                                                    <?php else : ?>
                                                        <span class="badge bg-warning text-dark">Penjualan</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>Rp <?= number_format($row['offer_price'], 0, ',', '.') ?></td>
                                                <td>
                                                    <?php if ($row['status'] == 'accepted') : ?>
                                                        <span class="badge bg-primary">Selesai</span>
                                                    <?php elseif ($row['status'] == 'pending') : ?>
                                                        <span class="badge bg-secondary">Diproses</span>
                                                    <?php else : ?>
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Belum ada riwayat transaksi.</td>
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


                       <div class="d-flex justify-content-center gap-3 mt-4">

                            <?php if(session()->get('role') === 'supplier'): ?>

                                <a href="<?= base_url('penjualan/create') ?>"
                                class="btn btn-primary btn-lg">
                                    🚢 Jual Kapal
                                </a>

                            <?php endif; ?>

                            <a href="<?= base_url('auth/logout') ?>"
                            class="btn btn-danger btn-lg">
                                <i class="bi bi-box-arrow-right"></i>
                                Logout
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Pilih Kategori -->
<div class="modal fade" id="kategoriModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Pilih Kategori Kapal
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <?php foreach($kategori as $k): ?>

                    <a href="<?= base_url('penjualan/' . $k['slug']) ?>"
                    class="btn btn-outline-primary w-100 mb-3 p-3">

                        <?= esc($k['nama_kategori']) ?>

                    </a>

                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>

<script src="<?= base_url('assets/logis/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>