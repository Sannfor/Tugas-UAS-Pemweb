<?php

namespace Modules\Kontak\Controllers; // Sesuaikan namespace

use App\Controllers\BaseController;
use Modules\Kontak\Models\PesanKontakModel;

class Kontak extends BaseController
{
    public function kirim()
    {
        // Panggil model
        $pesanModel = new PesanKontakModel();

        // Ambil data yang dikirim dari input form HTML
        $data = [
            'nama_pengirim'  => $this->request->getPost('name'),
            'email_pengirim' => $this->request->getPost('email'),
            'kategori_pesan' => $this->request->getPost('subject'),
            'isi_pesan'      => $this->request->getPost('message'),
            'status'         => 'Belum Dibaca' // Status default
        ];

        // Simpan data ke database
        $simpan = $pesanModel->insert($data);

        // --- PENANGANAN RESPONSE UNTUK TEMPLATE LOGIS ---
        // Template Logis bawaan BootstrapMade menggunakan AJAX (Javascript) untuk mengirim form.
        // Script mereka (biasanya di file main.js atau validate.js) mengharapkan balasan string 'OK' jika berhasil.
        
        if ($simpan) {
            return $this->response->setBody('OK');
        } else {
            return $this->response->setStatusCode(500)->setBody('Maaf, terjadi kesalahan pada server. Pesan gagal dikirim.');
        }
    }
}