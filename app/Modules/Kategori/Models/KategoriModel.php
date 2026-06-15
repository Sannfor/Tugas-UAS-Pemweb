<?php

namespace App\Modules\Kategori\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'kategori_kapal';
    protected $primaryKey       = 'id_kategori';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // Kolom yang diizinkan untuk diisi
    protected $allowedFields    = ['slug_kategori', 'nama_kategori', 'ikon', 'deskripsi'];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}