<?php

namespace App\Modules\DetailPenjualan\Models;

use CodeIgniter\Model;

class DetailPenjualanModel extends Model
{
    protected $table = 'transactions';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        '*'
    ];
}