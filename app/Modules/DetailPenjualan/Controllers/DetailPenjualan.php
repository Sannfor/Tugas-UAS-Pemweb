<?php

namespace App\Modules\DetailPenjualan\Controllers;

use App\Controllers\BaseController;
use App\Modules\DetailPenjualan\Models\DetailPenjualanModel;

class DetailPenjualan extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new DetailPenjualanModel();
    }

    public function index()
    {
        $data['transaksi'] = $this->model->findAll();

        return view('App\Modules\DetailPenjualan\Views\v_detail_penjualan', $data);
    }
}