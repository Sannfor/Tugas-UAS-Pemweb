<?php

namespace App\Modules\Beranda\Controllers;

use App\Controllers\BaseController;
use App\Modules\Katalog\Models\BulkCarrierModel;

class Beranda extends BaseController
{
    public function index()
    {
        $bulkCarrierModel = new BulkCarrierModel();
        
        // Masukkan data spesifik halaman ini ke wadah global $this->data
        $this->data['kapal_bulk'] = $bulkCarrierModel->where('status', 'available')->findAll();

        // Kirim $this->data ke view
        return view('App\Modules\Beranda\Views\index', $this->data);
    }
}