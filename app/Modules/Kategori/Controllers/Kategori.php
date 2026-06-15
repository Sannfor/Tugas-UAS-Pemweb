<?php

namespace App\Modules\Kategori\Controllers;

use App\Controllers\BaseController;
use App\Modules\Kategori\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Manajemen Kategori Kapal',
            'kategori' => $this->kategoriModel->findAll()
        ];

        // Sesuai aturan penamaan: v_index_kategori
        return view('App\Modules\Kategori\Views\v_index_kategori', $data);
    }
}