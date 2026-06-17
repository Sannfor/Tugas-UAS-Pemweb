<?php

namespace App\Modules\Produk\Controllers;

use App\Controllers\BaseController;
use App\Modules\Produk\Models\BulkCarrierModel;
use App\Modules\Produk\Models\PassengerShipModel;
use App\Modules\Produk\Models\TugboatModel;

class Produk extends BaseController
{
    protected $bulkCarrierModel;
    protected $passengerShipModel;
    protected $tugboatModel;

    public function __construct()
    {
        // Inisialisasi model di modul Produk
        $this->bulkCarrierModel = new BulkCarrierModel();
        $this->passengerShipModel = new PassengerShipModel();
        $this->tugboatModel = new TugboatModel();
    }

    // ---------------------------------------------------------
    // 1. FUNGSI INDEX (Untuk Dashboard/Admin)
    // ---------------------------------------------------------
    public function index()
    {
        $data = [
            'title' => 'Manajemen Produk (Kapal)',
            'kapal_bulk' => $this->bulkCarrierModel->findAll()
        ];

        // Menggunakan aturan penamaan view baru: v_index_produk
        return view('App\Modules\Produk\Views\v_index_produk', $data);
    }

    // ---------------------------------------------------------
    // 2. FUNGSI KATALOG (Tampilan Frontend Halaman Utama)
    // ---------------------------------------------------------
    public function katalog_klien()
    {
        $data = [
            'title' => 'Katalog Kapal Drydock',
            'kapal_bulk'      => $this->bulkCarrierModel->findAll(),
            'kapal_tugboat'   => $this->tugboatModel->findAll(),
            'kapal_passenger' => $this->passengerShipModel->findAll(),
        ];

        return view('App\Modules\Produk\Views\v_katalog_section_produk', $data);
    }

    // ---------------------------------------------------------
    // 3. FUNGSI FORM JUAL
    // ---------------------------------------------------------
    public function form_jual($kategori = 'bulk-carrier')
    {
        // 0. Pastikan user sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        $user_id = session()->get('id');
        $db = \Config\Database::connect();

        // 1. CEK KELENGKAPAN PROFIL (users table)
        $user = $db->table('users')->where('id', $user_id)->get()->getRowArray();

        // Jika NPWP, No Bank, atau Domisili masih kosong, lemparkan kembali ke Profil
        if (empty($user['npwp']) || empty($user['no_bank']) || empty($user['domisili_pelabuhan'])) {
            return redirect()->to(base_url('profil'))->with('error', 'Akses ditolak! Silakan isi kolom NPWP, No Rekening, dan Domisili Pelabuhan, lalu klik "Simpan Perubahan" sebelum menjual kapal.');
        }

        // 2. CEK STATUS SUPPLIER (supplier table)
        $supplier = $db->table('supplier')->where('user_id', $user_id)->get()->getRowArray();

        // Jika belum ada data di tabel supplier, lemparkan ke form pendaftaran supplier
        if (!$supplier) {
            return redirect()->to(base_url('supplier/daftar'))->with('error', 'Langkah Terakhir! Anda harus melengkapi profil Perusahaan / Agen Supplier Anda terlebih dahulu.');
        }

        // 3. JIKA LOLOS SEMUA VALIDASI, TAMPILKAN FORM JUAL KAPAL
        $data = [
            'title'    => 'Jual Kapal - ' . ucwords(str_replace('-', ' ', $kategori)),
            'kategori' => $kategori
        ];

        return view('App\Modules\Produk\Views\v_form_jual_produk', $data);
    }

    // ---------------------------------------------------------
    // 4. FUNGSI DETAIL KAPAL
    // ---------------------------------------------------------
    public function detail($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'))
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        // Parse prefix untuk menentukan tabel mana yang akan di-query
        if (strpos($id, 'bulk-') === 0) {
            // Bulk Carrier
            $realId = str_replace('bulk-', '', $id);
            $kapal = $this->bulkCarrierModel->find($realId);
        } elseif (strpos($id, 'tug-') === 0) {
            // Tugboat
            $realId = str_replace('tug-', '', $id);
            $kapal = $this->tugboatModel->find($realId);
        } elseif (strpos($id, 'pass-') === 0) {
            // Passenger Ship
            $realId = str_replace('pass-', '', $id);
            $kapal = $this->passengerShipModel->find($realId);
        } else {
            // Fallback: coba cari di semua tabel (untuk URL lama)
            $kapal = $this->bulkCarrierModel->find($id);
            if (!$kapal) {
                $kapal = $this->tugboatModel->find($id);
            }
            if (!$kapal) {
                $kapal = $this->passengerShipModel->find($id);
            }
        }

        if (!$kapal) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Data kapal tidak ditemukan'
            );
        }

        $data = [
            'title' => 'Detail ' . $kapal['ship_name'],
            'kapal' => $kapal
        ];

        return view(
            'App\Modules\Produk\Views\v_detail_produk',
            $data
        );
    }

    // ---------------------------------------------------------
    // 5. FUNGSI HAPUS 
    // ---------------------------------------------------------
    public function hapus($id)
    {
        $kapal = $this->bulkCarrierModel->find($id);
        $user_aktif = session()->get('user_data');

        if (!$kapal) {
            return redirect()->back()->with('error', 'Data kapal tidak ditemukan.');
        }

        if ($user_aktif['role'] === 'admin' || ($user_aktif['role'] === 'user' && $kapal['user_id'] == $user_aktif['id'])) {
            $this->bulkCarrierModel->delete($id);
            $pesan = ($user_aktif['role'] === 'admin') ? 'Kapal berhasil dihapus oleh Admin.' : 'Kapal Anda berhasil dihapus.';
            return redirect()->back()->with('sukses', $pesan);
        }

        return redirect()->back()->with('error', 'Akses Ditolak! Anda bukan pemilik kapal ini.');
    }

    // ---------------------------------------------------------
    // 6. FUNGSI KIRIM TAWARAN
    // ---------------------------------------------------------
    public function kirim_tawaran()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        $ship_id = $this->request->getPost('ship_id');
        $harga_tawaran = $this->request->getPost('offer_price');
        $kapal = $this->bulkCarrierModel->find($ship_id);

        if (!$kapal) {
            $kapal = $this->tugboatModel->find($ship_id);
        }

        if (!$kapal) {
            $kapal = $this->passengerShipModel->find($ship_id);
        }

        if (!$kapal) {
            return redirect()->back()
                ->with('error', 'Data kapal tidak ditemukan');
        }

        $harga_asli = $kapal['price'];
        $batas_minimal_tawaran = $harga_asli - ($harga_asli * 0.10);
        $persentase_turun = (($harga_asli - $harga_tawaran) / $harga_asli) * 100;

        $buyer_id = session()->get('user_data')['id'] ?? session()->get('id');
        $db = \Config\Database::connect();
        $builder = $db->table('negotiations');
        $cek_nego = $builder->where('ship_id', $ship_id)->where('buyer_id', $buyer_id)->get()->getRowArray();

        if ($cek_nego && $cek_nego['attempt_count'] >= 2 && $cek_nego['status'] == 'rejected') {
            return redirect()->back()->with('error', 'Sistem: Anda sudah mencapai batas maksimal penolakan (2 kali). Anda tidak bisa menawar kapal ini lagi dengan akun ini.');
        }

        if ($harga_tawaran < $batas_minimal_tawaran) {
            $status_tawaran = 'rejected';
            $pesan_reaksi = 'Penjual: "Maaf, tawaran Anda terlalu rendah dan jauh dari harga pasar. Saya tolak."';
        } else {
            $status_tawaran = 'accepted';
            if ($persentase_turun <= 3) {
                $pesan_reaksi = 'Penjual: "Wah, sepakat! Ini penawaran yang luar biasa bagus. Saya sangat senang berbisnis dengan Anda."';
            } elseif ($persentase_turun > 3 && $persentase_turun <= 7) {
                $pesan_reaksi = 'Penjual: "Hmm, baiklah. Harganya masih masuk akal untuk kondisi kapal ini. Saya terima."';
            } else {
                $pesan_reaksi = 'Penjual: "Waduh, harganya mepet sekali. Tapi ya sudahlah, saya lepas kapalnya."';
            }
        }

        if ($cek_nego) {

        $builder->where('id', $cek_nego['id'])->update([
            'offer_price'   => $harga_tawaran,
            'attempt_count' => $cek_nego['attempt_count'] + 1,
            'status'        => $status_tawaran
        ]);

        $negotiationId = $cek_nego['id'];

    } else {

        $builder->insert([
            'ship_id'       => $ship_id,
            'buyer_id'      => $buyer_id,
            'seller_id'     => $kapal['user_id'],
            'offer_price'   => $harga_tawaran,
            'attempt_count' => 1,
            'status'        => $status_tawaran
        ]);

        $negotiationId = $db->insertID();
    }
        if ($status_tawaran == 'accepted') {

        $cekTransaksi = $db->table('transactions')
            ->where('negotiation_id', $negotiationId)
            ->countAllResults();

        if ($cekTransaksi == 0) {

            $db->table('transactions')->insert([
                'negotiation_id'    => $negotiationId,
                'buyer_id'          => $buyer_id,
                'seller_id'         => $kapal['user_id'],
                'ship_id'           => $ship_id,
                'transaction_price' => $harga_tawaran,
                'status'            => 'completed'
            ]);
        }
    }

        return redirect()->back()->with($status_tawaran === 'rejected' ? 'error' : 'sukses', $pesan_reaksi);
    }
}
