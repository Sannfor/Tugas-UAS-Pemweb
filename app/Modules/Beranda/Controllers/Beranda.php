<?php

namespace App\Modules\Beranda\Controllers;

use App\Controllers\BaseController;
use App\Modules\Katalog\Models\BulkCarrierModel;

class Beranda extends BaseController
{
    public function index()
    {
        $bulkCarrierModel = new BulkCarrierModel();
        
        // Gunakan variabel array lokal biasa, BUKAN $this->data
        $data = [
            'kapal_bulk' => $bulkCarrierModel->where('status', 'available')->findAll()
        ];

        // Kirim $data ke view
        return view('App\Modules\Beranda\Views\index', $data);
    }
}