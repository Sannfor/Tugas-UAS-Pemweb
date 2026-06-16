<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Admin extends BaseController
{
   public function index()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('auth/login'))
                ->with('error', 'Akses Ditolak!');
        }

        $db = Database::connect();

        // Total User
        $total_pengguna = $db->table('users')
            ->countAllResults();

        // Total Supplier
        $total_supplier = $db->table('users')
            ->where('role', 'supplier')
            ->countAllResults();

        // Total Produk
        $total_produk =
            $db->table('bulk_carriers')->countAllResults()
            +
            $db->table('passenger_ships')->countAllResults()
            +
            $db->table('tugboats')->countAllResults();

            // Total Kategori
        $total_kategori = $db->table('kategori_kapal')
            ->countAllResults();

        // Kapal Terjual
        $total_terjual = $db->table('transactions')
            ->where('status', 'completed')
            ->countAllResults();

        // Top Buyer
        $top_buyers = $db->query("
            SELECT
                u.nama,
                COUNT(t.id) AS total_transaksi
            FROM transactions t
            JOIN users u
                ON u.id = t.buyer_id
            GROUP BY t.buyer_id
            ORDER BY total_transaksi DESC
            LIMIT 5
        ")->getResultArray();

        // Grafik 6 bulan terakhir
        $bulan_grafik = [];
        $data_penjualan = [];

        for ($i = 5; $i >= 0; $i--) {

            $bulan = date('m', strtotime("-$i month"));
            $tahun = date('Y', strtotime("-$i month"));

            $jumlah = $db->query("
                SELECT COUNT(*) AS total
                FROM transactions
                WHERE status='completed'
                AND MONTH(created_at) = ?
                AND YEAR(created_at) = ?
            ", [$bulan, $tahun])->getRow()->total;

            $bulan_grafik[] = date('M', strtotime("-$i month"));
            $data_penjualan[] = $jumlah;
        }

        $data = [

            'title' => 'Dashboard Admin',

            'user' => session()->get(),

            'total_pengguna' => $total_pengguna,

            'total_supplier' => $total_supplier,

            'total_produk' => $total_produk,

            'total_kategori' => $total_kategori,

            'total_terjual' => $total_terjual,

            'top_buyers' => $top_buyers,

            'bulan_grafik' => json_encode($bulan_grafik),

            'data_penjualan' => json_encode($data_penjualan)

        ];

        return view(
            'App\Modules\Admin\Views\v_dashboard',
            $data
        );
    }

    public function supplier()
    {
        $db = \Config\Database::connect();

        $data['suppliers'] = $db->table('users')
            ->where('role', 'supplier')
            ->get()
            ->getResultArray();

        return view('App\Modules\Admin\Views\v_supplier', $data);
    }

    public function detailSupplier($id)
    {
        $db = \Config\Database::connect();

        $supplier = $db->table('users')
            ->where('id', $id)
            ->where('role', 'supplier')
            ->get()
            ->getRowArray();

        if (!$supplier) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }

        $data['supplier'] = $supplier;

        $data['total_bulk'] = $db->table('bulk_carriers')
            ->where('user_id', $id)
            ->countAllResults();

        $data['total_tugboat'] = $db->table('tugboats')
            ->where('user_id', $id)
            ->countAllResults();

        $data['total_passenger'] = $db->table('passenger_ships')
            ->where('user_id', $id)
            ->countAllResults();

        return view('App\Modules\Admin\Views\v_detail_supplier', $data);
    }

    public function produkSupplier($id)
    {
        $db = \Config\Database::connect();

        $bulk = $db->table('bulk_carriers')
            ->where('user_id', $id)
            ->get()
            ->getResultArray();

        $tugboat = $db->table('tugboats')
            ->where('user_id', $id)
            ->get()
            ->getResultArray();

        $passenger = $db->table('passenger_ships')
            ->where('user_id', $id)
            ->get()
            ->getResultArray();

        $data = [
            'bulk' => $bulk,
            'tugboat' => $tugboat,
            'passenger' => $passenger
        ];

        return view('App\Modules\Admin\Views\v_produk_supplier', $data);
    }

    public function pengguna()
    {
        $db = \Config\Database::connect();

        $keyword = $this->request->getGet('q');

        $builder = $db->table('users');

        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('nama', $keyword)
                ->orLike('email', $keyword)
                ->groupEnd();
        }

        $users = $builder
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();

        return view(
            'App\Modules\Admin\Views\v_pengguna',
            [
                'title' => 'Kelola Pengguna',
                'user' => session()->get(),
                'users' => $users
            ]
        );
    }

    public function detailPengguna($id)
    {
        $db = \Config\Database::connect();

        $pengguna = $db->table('users')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$pengguna) {
            return redirect()->back()
                ->with('error', 'User tidak ditemukan');
        }

        return view(
            'App\Modules\Admin\Views\v_detail_pengguna',
            [
                'title' => 'Detail Pengguna',
                'user' => session()->get(),
                'pengguna' => $pengguna
            ]
        );
    }

    public function hapusPengguna($id)
    {
        $db = \Config\Database::connect();

        $user = $db->table('users')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$user) {
            return redirect()->back()
                ->with('error', 'User tidak ditemukan');
        }

        // jangan sampai admin menghapus dirinya sendiri
        if ($id == session()->get('id')) {

            return redirect()->back()
                ->with(
                    'error',
                    'Admin tidak boleh menghapus akun sendiri'
                );
        }

        $db->table('users')
            ->where('id', $id)
            ->delete();

        return redirect()->to(base_url('admin/pengguna'))
            ->with('success', 'User berhasil dihapus');
    }

    

    // Placeholder agar link sidebar lain tidak error (Bisa dikembangkan nanti)
    
    public function produk() { echo "Halaman Kelola Produk (Segera Hadir)"; }
    public function kategori() { return redirect()->to(base_url('kategori')); }
}