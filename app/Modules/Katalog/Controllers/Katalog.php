<?php

namespace App\Modules\Katalog\Controllers;

use App\Controllers\BaseController;
use App\Modules\Katalog\Models\BulkCarrierModel; // Pastikan Model juga sudah dipindah ke folder Katalog

class Katalog extends BaseController
{
    protected $bulkCarrierModel;

    public function __construct()
    {
        $this->bulkCarrierModel = new BulkCarrierModel();
    }

    // ---------------------------------------------------------
    // 1. FUNGSI INDEX (Untuk Dashboard/Admin)
    // ---------------------------------------------------------
    public function index()
    {
        $data = [
            'title' => 'Manajemen Katalog (Kapal)',
            'kapal_bulk' => $this->bulkCarrierModel->findAll()
        ];

        return view('App\Modules\Katalog\Views\index', $data);
    }

    // ---------------------------------------------------------
    // 2. FUNGSI HAPUS (Logika menghapus kapal sesuai hak akses)
    // ---------------------------------------------------------
    public function hapus($id)
    {
        $kapal = $this->bulkCarrierModel->find($id);
        
        // Ambil data user yang sedang login dari session
        $user_aktif = session()->get('user_data'); 

        // Cek apakah data kapal ada
        if (!$kapal) {
            return redirect()->back()->with('error', 'Data kapal tidak ditemukan.');
        }

        // Jika yang login adalah Admin (Bisa hapus semua)
        if ($user_aktif['role'] === 'admin') {
            $this->bulkCarrierModel->delete($id);
            return redirect()->back()->with('sukses', 'Kapal berhasil dihapus oleh Admin.');
        }

        // Jika yang login adalah User Biasa (Hanya bisa hapus kapal yang dia upload)
        if ($user_aktif['role'] === 'user' && $kapal['user_id'] == $user_aktif['id']) {
            $this->bulkCarrierModel->delete($id);
            return redirect()->back()->with('sukses', 'Kapal Anda berhasil dihapus.');
        }

        // Jika mencoba menghapus milik orang lain
        return redirect()->back()->with('error', 'Akses Ditolak! Anda bukan pemilik kapal ini.');
    }

    // ---------------------------------------------------------
    // 3. FUNGSI DETAIL KAPAL (Untuk Pembeli)
    // ---------------------------------------------------------
    public function detail($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'))->with('error', 'Silakan login terlebih dahulu untuk melihat detail dan menawar kapal.');
        }

        $kapal = $this->bulkCarrierModel->find($id);

        if (!$kapal) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data kapal tidak ditemukan");
        }

        $buyer_id = session()->get('user_data')['id'] ?? session()->get('id');
        $db = \Config\Database::connect();
        $cek_nego = $db->table('negotiations')->where('ship_id', $id)->where('buyer_id', $buyer_id)->get()->getRowArray();

        $is_blocked = false;
        if ($cek_nego && $cek_nego['attempt_count'] >= 2 && $cek_nego['status'] == 'rejected') {
            $is_blocked = true;
        }

        $this->data['title'] = 'Detail ' . $kapal['ship_name'] . ' - Drydock';
        $this->data['kapal'] = $kapal;
        $this->data['is_blocked'] = $is_blocked;

        return view('App\Modules\Katalog\Views\detail', $this->data);
    }

    // ---------------------------------------------------------
    // 4. FUNGSI KIRIM TAWARAN
    // ---------------------------------------------------------
    public function kirim_tawaran()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('auth/login'));
        }

        $ship_id = $this->request->getPost('ship_id');
        $harga_tawaran = $this->request->getPost('offer_price');
        
        $kapal = $this->bulkCarrierModel->find($ship_id);
        
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
                'offer_price' => $harga_tawaran,
                'attempt_count' => $cek_nego['attempt_count'] + 1,
                'status' => $status_tawaran
            ]);
        } else {
            $builder->insert([
                'ship_id' => $ship_id,
                'buyer_id' => $buyer_id,
                'seller_id' => $kapal['user_id'],
                'offer_price' => $harga_tawaran,
                'attempt_count' => 1,
                'status' => $status_tawaran
            ]);
        }

        if ($status_tawaran === 'rejected') {
            return redirect()->back()->with('error', $pesan_reaksi);
        } else {
            return redirect()->back()->with('sukses', $pesan_reaksi);
        }
    }
}