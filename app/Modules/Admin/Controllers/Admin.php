<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        // Pengecekan keamanan: Pastikan hanya admin yang bisa masuk
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('auth/login'))->with('error', 'Akses Ditolak! Halaman khusus Admin.');
        }

        // Data dummy untuk grafik (Nanti bisa diganti dengan query dari PenjualanModel)
        $bulan_grafik = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];
        $data_penjualan = [12, 19, 15, 25, 22, 30]; 

        $data = [
            'title'          => 'Dasbor Admin - Drydock',
            'user'           => session()->get(), // Data admin yang sedang login
            'total_pengguna' => 145, // Nanti ganti dengan $userModel->countAllResults()
            'total_produk'   => 87,  // Nanti ganti dengan $produkModel->countAllResults()
            'total_terjual'  => 123, // Nanti ganti dengan $penjualanModel->where('status','accepted')->countAllResults()
            
            // Data untuk Chart.js
            'bulan_grafik'   => json_encode($bulan_grafik),
            'data_penjualan' => json_encode($data_penjualan)
        ];

        return view('App\Modules\Admin\Views\v_dashboard', $data);
    }

    public function supplier()
    {
        $supplierModel = new \App\Modules\Supplier\Models\SupplierModel();
        
        $data = [
            'title' => 'Kelola Supplier - Admin',
            'user'  => session()->get(),
            'supplier' => $supplierModel->findAll()
        ];
        
        // Memanggil view index supplier yang sudah kita buat sebelumnya
        return view('App\Modules\Supplier\Views\v_index_supplier', $data);
    }

    // Placeholder agar link sidebar lain tidak error (Bisa dikembangkan nanti)
    public function pengguna() { echo "Halaman Kelola Pengguna (Segera Hadir)"; }
    public function produk() { echo "Halaman Kelola Produk (Segera Hadir)"; }
    public function kategori() { return redirect()->to(base_url('kategori')); }
}