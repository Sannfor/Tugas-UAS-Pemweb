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
    
    public function kategori() { return redirect()->to(base_url('kategori')); }

    // =======================================================
    // 1. KELOLA PRODUK (CRUD)
    // =======================================================
    public function produk()
    {
        $db = \Config\Database::connect();
        
        // Perhatikan penambahan nama tabel di depan kolom 'id'
        $bulk = $db->table('bulk_carriers')
                   ->select('bulk_carriers.id, ship_name, price, users.nama as penjual, "Bulk Carrier" as kategori, "bulk_carriers" as nama_tabel')
                   ->join('users', 'users.id = bulk_carriers.user_id', 'left')
                   ->get()->getResultArray();

        $passenger = $db->table('passenger_ships')
                   ->select('passenger_ships.id, ship_name, price, users.nama as penjual, "Passenger Ship" as kategori, "passenger_ships" as nama_tabel')
                   ->join('users', 'users.id = passenger_ships.user_id', 'left')
                   ->get()->getResultArray();

        $tugboat = $db->table('tugboats')
                   ->select('tugboats.id, ship_name, price, users.nama as penjual, "Tugboat" as kategori, "tugboats" as nama_tabel')
                   ->join('users', 'users.id = tugboats.user_id', 'left')
                   ->get()->getResultArray();

        // Gabungkan semua kapal
        $semua_kapal = array_merge($bulk, $passenger, $tugboat);

        $data = [
            'title'  => 'Kelola Produk - Admin',
            'user'   => session()->get(),
            'produk' => $semua_kapal
        ];

        return view('App\Modules\Admin\Views\v_produk', $data);
    }

    // Fungsi untuk Hapus Produk Admin
    public function hapus_produk($tabel, $id)
    {
        $db = \Config\Database::connect();
        
        // Pastikan tabel yang diakses valid demi keamanan
        $tabel_valid = ['bulk_carriers', 'passenger_ships', 'tugboats'];
        if (in_array($tabel, $tabel_valid)) {
            $db->table($tabel)->where('id', $id)->delete();
            return redirect()->back()->with('sukses', 'Data kapal berhasil dihapus dari sistem!');
        }

        return redirect()->back()->with('error', 'Tabel tidak ditemukan!');
    }

    // Menampilkan Form Tambah Produk
    public function tambah_produk($kategori)
    {
        $data = [
            'title'    => 'Tambah Kapal - Admin',
            'user'     => session()->get(),
            'kategori' => $kategori,
            'produk'   => [] // Kosong karena ini form tambah
        ];
        return view('App\Modules\Admin\Views\v_form_produk', $data);
    }

    // Menampilkan Form Edit Produk
    public function edit_produk($tabel, $id)
    {
        $db = \Config\Database::connect();
        
        // Pemetaan nama tabel ke nama kategori form
        $kategori = 'bulk-carrier';
        if ($tabel == 'passenger_ships') $kategori = 'passenger-ship';
        if ($tabel == 'tugboats') $kategori = 'tugboat';

        $data = [
            'title'    => 'Edit Kapal - Admin',
            'user'     => session()->get(),
            'kategori' => $kategori,
            'tabel'    => $tabel,
            'produk'   => $db->table($tabel)->where('id', $id)->get()->getRowArray()
        ];
        return view('App\Modules\Admin\Views\v_form_produk', $data);
    }

    // Memproses Insert / Update dari Form
    public function simpan_produk()
    {
        $db       = \Config\Database::connect();
        $kategori = $this->request->getPost('kategori');
        $id       = $this->request->getPost('id'); // Jika ID ada, berarti Edit

        // Menentukan tabel berdasarkan kategori
        $tabel = 'bulk_carriers';
        $folder_foto = 'bulk_carrier';
        if ($kategori == 'passenger-ship') {
            $tabel = 'passenger_ships';
            $folder_foto = 'passenger';
        } elseif ($kategori == 'tugboat') {
            $tabel = 'tugboats';
            $folder_foto = 'tugboat';
        }

        // Ambil semua input form secara otomatis
        $data = $this->request->getPost();
        
        // Hapus variabel yang tidak ada di struktur database
        unset($data['kategori'], $data['id']);

        // Tangani Upload Foto
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/assets/images/' . $folder_foto . '/', $newName);
            $data['image'] = $newName;
        }

        if (!empty($id)) {
            // Jika ID ada, jalankan proses UPDATE
            $db->table($tabel)->where('id', $id)->update($data);
            $pesan = 'Data kapal berhasil diperbarui!';
        } else {
            // Jika tidak ada ID, jalankan proses INSERT
            $data['user_id'] = session()->get('id'); // Catat ID admin yang menambahkan
            $db->table($tabel)->insert($data);
            $pesan = 'Kapal baru berhasil ditambahkan!';
        }

        return redirect()->to(base_url('admin/produk'))->with('sukses', $pesan);
    }

    public function detail_produk($tabel, $id)
    {
        $db = \Config\Database::connect();
        
        $kategori = 'Bulk Carrier';
        if ($tabel == 'passenger_ships') $kategori = 'Passenger Ship';
        if ($tabel == 'tugboats') $kategori = 'Tugboat';

        $data = [
            'title'    => 'Detail Kapal Admin',
            'user'     => session()->get(),
            'tabel'    => $tabel,
            'kategori' => $kategori,
            'kapal'    => $db->table($tabel)->where('id', $id)->get()->getRowArray()
        ];

        return view('App\Modules\Admin\Views\v_detail_produk_admin', $data);
    }

    // =======================================================
    // 2. TRANSAKSI PENJUALAN (READ ONLY)
    // =======================================================
    public function transaksi()
    {
        $db = \Config\Database::connect();
        
        // Mengambil data transaksi dan join dengan tabel users untuk nama pembeli & penjual
        // Asumsi kolom di tabel transactions: buyer_id, seller_id, amount/price, status, created_at
        $transaksi = $db->table('transactions')
                        ->select('transactions.*, pembeli.nama as nama_pembeli, penjual.nama as nama_penjual')
                        ->join('users as pembeli', 'pembeli.id = transactions.buyer_id', 'left')
                        ->join('users as penjual', 'penjual.id = transactions.seller_id', 'left')
                        ->orderBy('transactions.created_at', 'DESC')
                        ->get()->getResultArray();

        $data = [
            'title'     => 'Riwayat Transaksi - Admin',
            'user'      => session()->get(),
            'transaksi' => $transaksi
        ];

        return view('App\Modules\Admin\Views\v_transaksi', $data);
    }
}