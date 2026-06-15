<?php

namespace Modules\Kontak\Models; // Sesuaikan namespace dengan konfigurasi autoload module kamu

use CodeIgniter\Model;

class PesanKontakModel extends Model
{
    protected $table            = 'pesan_kontak';
    protected $primaryKey       = 'id';
    
    // Kolom yang diizinkan untuk diisi secara manual
    protected $allowedFields    = [
        'nama_pengirim', 
        'email_pengirim', 
        'kategori_pesan', 
        'isi_pesan', 
        'status'
    ];

    // Kita set false karena tabel SQL sudah menggunakan DEFAULT CURRENT_TIMESTAMP untuk created_at
    protected $useTimestamps    = false; 
}