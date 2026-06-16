<?php

namespace App\Modules\Transaksi\Controllers;

use App\Controllers\BaseController;
use App\Modules\Transaksi\Models\TransaksiModel;
use App\Modules\Produk\Models\BulkCarrierModel;

class Transaksi extends BaseController
{
    protected $TransaksiModel;
    protected $bulkCarrierModel;

    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
        $this->bulkCarrierModel = new BulkCarrierModel();
    }

    public function kirim_tawaran()
    {
        // 1. Tangkap input dari form
        $ship_id = $this->request->getPost('ship_id');
        $harga_tawaran = $this->request->getPost('offer_price');

        // Validasi input
        if (empty($ship_id) || empty($harga_tawaran)) {
            return redirect()->back()->with('error', 'Data tidak lengkap. Silakan isi semua field.');
        }

        // Ambil data user yang sedang login dan data kapal
        $user_data = session()->get('user_data');
        if (!$user_data || !isset($user_data['id'])) {
            return redirect()->back()->with('error', 'Anda harus login terlebih dahulu.');
        }

        $buyer_id = $user_data['id'];
        $kapal = $this->bulkCarrierModel->find($ship_id);

        if (!$kapal) {
            return redirect()->back()->with('error', 'Data kapal tidak ditemukan.');
        }

        // Cegah pembeli menawar kapalnya sendiri
        if ($kapal['user_id'] == $buyer_id) {
            return redirect()->back()->with('error', 'Anda tidak dapat menawar kapal Anda sendiri.');
        }

        $harga_asli = $kapal['price'];

        // ----------------------------------------------------------------
        // ATURAN 1: Batas Penawaran Maksimal Turun 10% (DISEMBUNYIKAN)
        // ----------------------------------------------------------------
        $batas_minimal_tawaran = $harga_asli - ($harga_asli * 0.10);

        // Hitung persentase penurunan harga untuk menentukan reaksi
        // Rumus: ((Harga Asli - Tawaran) / Harga Asli) * 100
        $persentase_turun = (($harga_asli - $harga_tawaran) / $harga_asli) * 100;

        // Jika tawaran melanggar batas 10%, tolak tanpa menyebutkan angka batasnya
        if ($harga_tawaran < $batas_minimal_tawaran) {
            return redirect()->back()->with('error', 'Penjual: "Maaf, tawaran Anda terlalu rendah dan jauh dari harga pasar. Silakan naikkan lagi tawaran Anda."');
        }

        // ----------------------------------------------------------------
        // ATURAN 2: Penentuan Reaksi Penjual (Chat Dummy)
        // ----------------------------------------------------------------
        $reaksi_penjual = $this->getReaksiPenjual($persentase_turun);

        // ----------------------------------------------------------------
        // ATURAN 3: Batas Maksimal 2 Kali Penawaran
        // ----------------------------------------------------------------
        $cek_riwayat = $this->TransaksiModel
            ->where('ship_id', $ship_id)
            ->where('buyer_id', $buyer_id)
            ->first();

        if ($cek_riwayat) {
            if ($cek_riwayat['attempt_count'] >= 2) {
                return redirect()->back()->with('error', 'Sistem: Anda sudah mencapai batas maksimal tawar-menawar untuk kapal ini.');
            } else {
                // Update tawaran kedua
                $this->TransaksiModel->update($cek_riwayat['id'], [
                    'offer_price' => $harga_tawaran,
                    'attempt_count' => $cek_riwayat['attempt_count'] + 1,
                    'status' => 'accepted' // Langsung accepted karena masuk batas toleransi
                ]);

                // Kembalikan pesan reaksi ke tampilan chat
                return redirect()->back()->with('sukses', $reaksi_penjual);
            }
        } else {
            // Buat data baru (Tawaran Pertama)
            $this->TransaksiModel->insert([
                'ship_id' => $ship_id,
                'buyer_id' => $buyer_id,
                'seller_id' => $kapal['user_id'],
                'offer_price' => $harga_tawaran,
                'attempt_count' => 1,
                'status' => 'accepted'
            ]);

            // Kembalikan pesan reaksi ke tampilan chat
            return redirect()->back()->with('sukses', $reaksi_penjual);
        }
    }

    /**
     * Mendapatkan reaksi penjual berdasarkan persentase penurunan harga
     * 
     * @param float $persentase_turun
     * @return string
     */
    private function getReaksiPenjual($persentase_turun)
    {
        if ($persentase_turun <= 3) {
            // Diskon 0% - 3% (Mendekati harga asli -> Penjual sangat senang)
            return 'Penjual: "Wah, sepakat! Ini penawaran yang luar biasa bagus. Saya sangat senang berbisnis dengan Anda. Mari segera kita urus dokumennya."';
        } elseif ($persentase_turun > 3 && $persentase_turun <= 7) {
            // Diskon 3% - 7% (Tengah-tengah -> Penjual netral)
            return 'Penjual: "Hmm, baiklah. Harganya masih masuk akal untuk kondisi kapal ini. Saya terima tawaran Anda."';
        } else {
            // Diskon 7% - 10% (Mepet batas bawah -> Penjual tidak senang tapi menerima)
            return 'Penjual: "Waduh, sebenarnya harga segitu mepet sekali dengan hitungan rugi-laba saya. Tapi ya sudahlah, karena Anda terlihat serius, saya lepas kapalnya."';
        }
    }
}