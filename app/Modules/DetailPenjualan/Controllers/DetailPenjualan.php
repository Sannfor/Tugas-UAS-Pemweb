<?php

namespace App\Modules\DetailPenjualan\Controllers;

use App\Controllers\BaseController;

class DetailPenjualan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('transactions t');
        
        // Memilih kolom dan mengubah nama kapal yang sesuai dari 3 tabel
        $builder->select('
            t.*, 
            b.nama as nama_pembeli, 
            s.nama as nama_penjual,
            COALESCE(bc.ship_name, ps.ship_name, tb.ship_name) as nama_kapal,
            CASE 
                WHEN bc.id IS NOT NULL THEN "Bulk Carrier"
                WHEN ps.id IS NOT NULL THEN "Passenger Ship"
                WHEN tb.id IS NOT NULL THEN "Tugboat"
                ELSE "Kapal Tidak Diketahui"
            END as kategori_kapal
        ', false); // parameter false penting agar tidak error syntax SQL
        
        // Join ke tabel users untuk pembeli dan penjual
        $builder->join('users b', 'b.id = t.buyer_id', 'left');
        $builder->join('users s', 's.id = t.seller_id', 'left');
        
        // Join ke 3 tabel kapal dengan mencocokkan ID kapal dan pemiliknya
        $builder->join('bulk_carriers bc', 'bc.id = t.ship_id AND bc.user_id = t.seller_id', 'left');
        $builder->join('passenger_ships ps', 'ps.id = t.ship_id AND ps.user_id = t.seller_id', 'left');
        $builder->join('tugboats tb', 'tb.id = t.ship_id AND tb.user_id = t.seller_id', 'left');
        
        // Urutkan dari transaksi terbaru
        $builder->orderBy('t.created_at', 'DESC');

        $data = [
            'title'     => 'Data Transaksi Penjualan',
            'transaksi' => $builder->get()->getResultArray()
        ];

        return view('App\Modules\DetailPenjualan\Views\v_detail_penjualan', $data);
    }
}