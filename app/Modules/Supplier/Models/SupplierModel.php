<?php

namespace App\Modules\Supplier\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table            = 'supplier';
    protected $primaryKey       = 'id_supplier';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    // Tambahkan 'user_id' di dalam array
    protected $allowedFields = ['user_id', 'nama_perusahaan', 'nama_kontak', 'email', 'telepon', 'alamat', 'status_verifikasi'];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}
