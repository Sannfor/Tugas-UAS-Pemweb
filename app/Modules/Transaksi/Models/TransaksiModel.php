<?php

namespace App\Modules\Transaksi\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'negotiations';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'ship_id',
        'buyer_id',
        'seller_id',
        'offer_price',
        'attempt_count',
        'status'
    ];
}