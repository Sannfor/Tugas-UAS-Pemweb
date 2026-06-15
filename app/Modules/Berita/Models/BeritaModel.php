<?php

namespace App\Modules\Berita\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'judul',
        'slug',
        'isi',
        'gambar'
    ];

    protected $useTimestamps = true;
}