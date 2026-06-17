<?php

namespace App\Modules\Laporan\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'negotiation_id',
        'buyer_id',
        'seller_id',
        'ship_id',
        'transaction_price',
        'status',
        'created_at'
    ];

    public function getLaporan()
    {
        return $this->db->table('transactions t')
            ->select("
                t.*,
                buyer.nama AS buyer_name,
                seller.nama AS seller_name,

                COALESCE(
                    bc.ship_name,
                    tb.ship_name,
                    ps.ship_name
                ) AS ship_name
            ")
            ->join('users buyer', 'buyer.id = t.buyer_id', 'left')
            ->join('users seller', 'seller.id = t.seller_id', 'left')

            ->join('bulk_carriers bc', 'bc.id = t.ship_id', 'left')
            ->join('tugboats tb', 'tb.id = t.ship_id', 'left')
            ->join('passenger_ships ps', 'ps.id = t.ship_id', 'left')

            ->orderBy('t.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }
}