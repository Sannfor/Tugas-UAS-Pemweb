<?php 
/**
 * @var array $kapal_bulk
 */
?>
<section id="produk" class="pricing section">

  <div class="container section-title" data-aos="fade-up">
    <span>Katalog Kapal</span>
    <h2>Katalog Kapal</h2>
    <p>Temukan armada terbaik yang siap mendukung operasional maritim Anda</p>
  </div><div class="container">
    <div class="row gy-4">

      <?php if (empty($kapal_bulk)) : ?>
        <div class="col-12 text-center" data-aos="fade-up">
          <p><i>Saat ini belum ada data kapal yang tersedia.</i></p>
        </div>
      <?php else : ?>
        
        <?php foreach ($kapal_bulk as $kapal) : ?>
          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="pricing-item">
              
              <div class="text-center mb-3">
                <img src="<?= base_url('assets/images/bulk_carrier/' . $kapal['ship_name'] . '.jpg'); ?>" 
                     class="img-fluid rounded" 
                     alt="<?= esc($kapal['ship_name']); ?>" 
                     style="height: 250px; width: 100%; object-fit: cover;">
              </div>

              <h3><?= esc($kapal['ship_name']); ?></h3>
              <h4><sup>$</sup><?= number_format($kapal['price'], 0, ',', '.'); ?></h4>
              
              <ul>
                <li><i class="bi bi-geo-alt"></i> <span><strong>Bendera:</strong> <?= esc($kapal['flag']); ?></span></li>
                <li><i class="bi bi-speedometer2"></i> <span><strong>DWT / GT:</strong> <?= esc($kapal['dwt']); ?> T / <?= esc($kapal['gt']); ?> T</span></li>
                <li><i class="bi bi-arrows-fullscreen"></i> <span><strong>Dimensi:</strong> <?= esc($kapal['loa']); ?>m x <?= esc($kapal['breadth']); ?>m</span></li>
                <li><i class="bi bi-gear"></i> <span><strong>Mesin Utama:</strong> <?= esc($kapal['me_brand']); ?> (<?= esc($kapal['me_power']); ?> kW)</span></li>
                <li><i class="bi bi-calendar-check"></i> <span><strong>Tahun Pembuatan:</strong> <?= date('Y', strtotime($kapal['built_date'])); ?></span></li>
              </ul>
              
              <a href="<?= base_url('kapal/detail/' . $kapal['id']) ?>" class="buy-btn">Lihat Detail</a>
            </div>
          </div><?php endforeach; ?>

      <?php endif; ?>

    </div>
  </div>

</section>```

---

### Langkah 2: Panggil View Tersebut dari File Beranda
Sekarang, buka file utama *landing page* kamu yang berada di **`app/Modules/Beranda/Views/index.php`**.

Cari posisi di mana letak kode katalog tadi berada, hapus kode lamanya, lalu ganti dengan satu baris perintah pemanggil *view* eksternal ini:

```