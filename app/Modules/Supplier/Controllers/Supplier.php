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

    public function daftar()
    {
        return view('App\Modules\Supplier\Views\v_form_daftar');
    }

    public function simpan_pendaftaran()
    {
        $this->supplierModel->insert([
            'user_id'           => session()->get('id'),
            'nama_perusahaan'   => $this->request->getPost('nama_perusahaan'),
            'nama_kontak'       => $this->request->getPost('nama_kontak'),
            'email'             => $this->request->getPost('email'),
            'telepon'           => $this->request->getPost('telepon'),
            'alamat'            => $this->request->getPost('alamat'),
            'status_verifikasi' => 'Pending' // Admin harus verifikasi nanti
        ]);

        return redirect()->to(base_url('profil'))->with('sukses', 'Pendaftaran Supplier berhasil! Anda sekarang dapat menjual kapal.');
    }
}