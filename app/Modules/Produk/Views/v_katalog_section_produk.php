<?php 
/**
 * @var array $kapal_bulk
 * @var array $kapal_tugboat
 * @var array $kapal_passenger
 */

// CEK STATUS LOGIN PENGUNJUNG
$is_logged_in = session()->get('isLoggedIn');
?>
<section id="produk" class="pricing section">

  <div class="container section-title" data-aos="fade-up">
    <span>Katalog Kapal</span>
    <h2>Katalog Kapal</h2>
    <p>Temukan armada terbaik yang siap mendukung operasional maritim Anda</p>
  </div>
  
  <div class="container">
    
    <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="col-12">
            <ul class="nav nav-pills justify-content-center filter-nav">
                <li class="nav-item mx-2">
                    <button class="nav-link active filter-btn" data-filter="all">
                        <i class="bi bi-grid-fill" style="font-size: 32px; display: block; margin-bottom: 8px;"></i>
                        Semua Kapal
                    </button>
                </li>
                <li class="nav-item mx-2">
                    <button class="nav-link filter-btn" data-filter=".kategori-bulk">
                        <img src="<?= base_url('assets/images/icon/bulkcarier.png') ?>" alt="Bulk Carrier" style="height: 38px; display: block; margin: 0 auto 8px;">
                        Bulk Carrier
                    </button>
                </li>
                <li class="nav-item mx-2">
                    <button class="nav-link filter-btn" data-filter=".kategori-tugboat">
                        <img src="<?= base_url('assets/images/icon/tugboat.png') ?>" alt="Tugboat" style="height: 38px; display: block; margin: 0 auto 8px;">
                        Tugboat
                    </button>
                </li>
                <li class="nav-item mx-2">
                    <button class="nav-link filter-btn" data-filter=".kategori-passenger">
                        <img src="<?= base_url('assets/images/icon/passenger.png') ?>" alt="Passenger Ship" style="height: 38px; display: block; margin: 0 auto 8px;">
                        Passenger Ship
                    </button>
                </li>
            </ul>
        </div>
    </div>

    <div class="row gy-4 catalog-container">

      <?php if (!empty($kapal_bulk)) : ?>
        <?php foreach ($kapal_bulk as $kapal) : ?>
          <div class="col-lg-4 catalog-item kategori-bulk" data-aos="zoom-in">
            <div class="pricing-item">
              <div class="text-center mb-3">
               <img src="<?= base_url('assets/images/bulk_carrier/' . ($kapal['image'] ?? 'default.jpg')); ?>"
                  class="img-fluid rounded"
                  alt="<?= esc($kapal['ship_name']); ?>"
                  style="height: 250px; width: 100%; object-fit: cover;">      
              </div>
              <h3><?= esc($kapal['ship_name']); ?></h3>
              <h4><sup>$</sup><?= number_format($kapal['price'], 0, ',', '.'); ?></h4>
              <ul>
                <li><i class="bi bi-geo-alt"></i> <span><strong>Bendera:</strong> <?= esc($kapal['flag']); ?></span></li>
                <li><i class="bi bi-speedometer2"></i> <span><strong>DWT:</strong> <?= esc($kapal['dwt']); ?> T</span></li>
                <li><i class="bi bi-gear"></i> <span><strong>Mesin:</strong> <?= esc($kapal['me_brand']); ?></span></li>
              </ul>
              
              <?php $link = $is_logged_in ? base_url('kapal/detail/bulk-' . $kapal['id']) : base_url('auth/login'); ?>
              <a href="<?= $link ?>" class="buy-btn">Lihat Detail</a>
              
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if (!empty($kapal_tugboat)) : ?>
        <?php foreach ($kapal_tugboat as $kapal) : ?>
          <div class="col-lg-4 catalog-item kategori-tugboat" data-aos="zoom-in">
            <div class="pricing-item" style="border-top-color: #ff9800;"> 
              <div class="text-center mb-3">
                <img src="<?= base_url('assets/images/tugboat/' . ($kapal['image'] ?? 'default.jpg')); ?>"
                  class="img-fluid rounded"
                  alt="<?= esc($kapal['ship_name']); ?>"
                  style="height: 250px; width: 100%; object-fit: cover;">
              </div>
              <h3><?= esc($kapal['ship_name']); ?></h3>
              <h4><sup>$</sup><?= number_format($kapal['price'], 0, ',', '.'); ?></h4> 
              <ul>
                <li><i class="bi bi-geo-alt"></i> <span><strong>Bendera:</strong> <?= esc($kapal['flag']); ?></span></li>
                <li><i class="bi bi-speedometer2"></i> <span><strong>Bollard Pull:</strong> <?= esc($kapal['bollard_pull']); ?> T</span></li>
                <li><i class="bi bi-gear"></i> <span><strong>Power:</strong> <?= esc($kapal['me_power']); ?> kW</span></li>
              </ul>
              
              <?php $link = $is_logged_in ? base_url('kapal/detail/tug-' . $kapal['id']) : base_url('auth/login'); ?>
              <a href="<?= $link ?>" class="buy-btn" style="background-color: #ff9800; border-color: #ff9800;">Lihat Detail</a>
              
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
      
      <?php if (!empty($kapal_passenger)) : ?>
        <?php foreach ($kapal_passenger as $kapal) : ?>
          <div class="col-lg-4 catalog-item kategori-passenger" data-aos="zoom-in">
            <div class="pricing-item" style="border-top-color: #28a745;"> 
              <div class="text-center mb-3">
               <img src="<?= base_url('assets/images/passenger/' . ($kapal['image'] ?? 'default.jpg')); ?>"
                  class="img-fluid rounded"
                  alt="<?= esc($kapal['ship_name']); ?>"
                  style="height: 250px; width: 100%; object-fit: cover;">
              </div>
              <h3><?= esc($kapal['ship_name']); ?></h3>
              <h4><sup>$</sup><?= number_format($kapal['price'], 0, ',', '.'); ?></h4>
              <ul>
                <li><i class="bi bi-geo-alt"></i> <span><strong>Bendera:</strong> <?= esc($kapal['flag']); ?></span></li>
                <li><i class="bi bi-people"></i> <span><strong>Kapasitas:</strong> <?= esc($kapal['passengers']); ?> Penumpang</span></li>
                <li><i class="bi bi-gear"></i> <span><strong>Mesin:</strong> <?= esc($kapal['me_brand']); ?></span></li>
              </ul>
              
              <?php $link = $is_logged_in ? base_url('kapal/detail/pass-' . $kapal['id']) : base_url('auth/login'); ?>
              <a href="<?= $link ?>" class="buy-btn" style="background-color: #28a745; border-color: #28a745;">Lihat Detail</a>
              
            </div> </div> <?php endforeach; ?>
      <?php endif; ?>

      <?php if (empty($kapal_bulk) && empty($kapal_tugboat) && empty($kapal_passenger)) : ?>
        <div class="col-12 text-center">
          <p><i>Saat ini belum ada data kapal yang tersedia.</i></p>
        </div>
      <?php endif; ?>

    </div>
  </div>

</section>

<style>
  .filter-nav .nav-link {
    cursor: pointer;
    color: #6c757d;
    font-weight: 600;
    border-radius: 10px;
    padding: 10px 20px;
    transition: all 0.3s ease;
    background-color: transparent;
    border: 2px solid transparent;
  }
  .filter-nav .nav-link:hover {
    color: #0e1d34;
    background-color: #f8f9fa;
  }
  .filter-nav .nav-link.active {
    background-color: #0e1d34;
    color: white;
    box-shadow: 0 4px 15px rgba(14, 29, 52, 0.2);
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const catalogItems = document.querySelectorAll('.catalog-item');

    filterBtns.forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        
        filterBtns.forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        const filterValue = this.getAttribute('data-filter');

        catalogItems.forEach(item => {
          if (filterValue === 'all') {
            item.style.display = 'block';
          } else if (item.classList.contains(filterValue.replace('.', ''))) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  });
</script>