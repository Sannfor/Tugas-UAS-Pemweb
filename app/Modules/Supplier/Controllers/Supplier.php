<?php

namespace App\Modules\Supplier\Controllers;

use App\Controllers\BaseController;
use App\Modules\Supplier\Models\SupplierModel;

class Supplier extends BaseController
{
    protected $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Manajemen Supplier / Agen Kapal',
            'supplier' => $this->supplierModel->findAll()
        ];

        // Sesuai aturan penamaan: v_index_supplier
        return view('App\Modules\Supplier\Views\v_index_supplier', $data);
    }
}