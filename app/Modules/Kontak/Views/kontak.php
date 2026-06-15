<section id="contact" class="contact section">

  <div class="container section-title" data-aos="fade-up">
    <span>Hubungi Kami</span>
    <h2>Hubungi Kami</h2>
    <p>Punya pertanyaan seputar katalog kapal, layanan inspeksi, atau proses penawaran? Tim ahli maritim kami siap membantu Anda.</p>
  </div>
  
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">

      <div class="col-lg-5">
        <div class="info-wrap">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Kantor Pusat</h3>
              <p>Gedung Maritim Tower, Lt. 12<br>Jl. Pelabuhan Utama No. 1, Tanjung Priok<br>Jakarta Utara, 14310, Indonesia</p>
            </div>
          </div>
          
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Telepon (24/7 Support)</h3>
              <p>+62 811 2345 6789</p>
              <p>+62 21 430 9988 (Office)</p>
            </div>
          </div>
          
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email</h3>
              <p>sales@drydock.id (Sales & Bidding)</p>
              <p>support@drydock.id (Inspeksi & Legal)</p>
            </div>
          </div>
          
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.0423018865565!2d106.87895311476865!3d-6.111494995574542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1f592231e3d7%3A0x6b8bc27c653068db!2sPelabuhan%20Tanjung%20Priok!5e0!3m2!1sid!2sid!4v1680000000000!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <div class="col-lg-7">
        <form action="<?= base_url('kontak/kirim') ?>" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-4">

            <div class="col-md-6">
              <label for="name-field" class="pb-2">Nama Lengkap / Perusahaan</label>
              <input type="text" name="name" id="name-field" class="form-control" required="">
            </div>

            <div class="col-md-6">
              <label for="email-field" class="pb-2">Email Perusahaan</label>
              <input type="email" class="form-control" name="email" id="email-field" required="">
            </div>

            <div class="col-md-12">
              <label for="subject-field" class="pb-2">Subjek Pesan</label>
              <select name="subject" id="subject-field" class="form-select" required="">
                <option value="" disabled selected>Pilih Kategori Pesan...</option>
                <option value="Pertanyaan Jual Kapal">Pendaftaran Armada (Jual Kapal)</option>
                <option value="Pertanyaan Beli Kapal">Informasi Katalog (Beli Kapal)</option>
                <option value="Layanan Inspeksi">Layanan Inspeksi & Surveyor</option>
                <option value="Lainnya">Dukungan Legal & Lainnya</option>
              </select>
            </div>

            <div class="col-md-12">
              <label for="message-field" class="pb-2">Detail Pesan</label>
              <textarea class="form-control" name="message" rows="10" id="message-field" required="" placeholder="Tuliskan spesifikasi kapal yang dicari atau detail kebutuhan armada Anda di sini..."></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Memproses...</div>
              <div class="error-message"></div>
              <div class="sent-message">Pesan Anda telah terkirim. Tim Drydock akan segera menghubungi Anda. Terima kasih!</div>

              <button type="submit" class="btn btn-primary" style="background-color: #0e1d34; border: none; padding: 12px 40px; font-weight: bold; border-radius: 4px;">Kirim Pesan</button>
            </div>

          </div>
        </form>
      </div>

    </div>
  </div>

</section>
