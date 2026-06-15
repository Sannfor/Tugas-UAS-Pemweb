<?php

namespace App\Modules\Beranda\Controllers;

use App\Controllers\BaseController;

use App\Modules\Produk\Models\BulkCarrierModel;
use App\Modules\Produk\Models\TugboatModel;
use App\Modules\Produk\Models\PassengerShipModel;

class Beranda extends BaseController
{
    public function index()
    {
        $bulkCarrierModel = new BulkCarrierModel();
        $tugboatModel = new TugboatModel();
        $passengerShipModel = new PassengerShipModel(); // Inisiasi Model
        
        $data = [
            'kapal_bulk'      => $bulkCarrierModel->where('status', 'available')->findAll(),
            'kapal_tugboat'   => $tugboatModel->findAll(), // Tambahkan where('status', 'available') jika di DB Tugboat nanti kamu tambahkan kolom status
            'kapal_passenger' => $passengerShipModel->where('status', 'available')->findAll() // Panggil datanya
        ];

        return view('App\Modules\Beranda\Views\index', $data);
    }
}