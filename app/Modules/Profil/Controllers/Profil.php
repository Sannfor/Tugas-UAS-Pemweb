<?php

namespace App\Modules\Profil\Controllers;

use App\Controllers\BaseController;
use App\Modules\Transaksi\Models\NegotiationModel;
 use App\Modules\Auth\Models\AuthModel;


class Profil extends BaseController
{
   public function index()
{
    $session = session();

    $userId = $session->get('id');

    $userModel = new AuthModel();

    $user = $userModel->find($userId);

    $negotiationModel = new NegotiationModel();

    $negotiations = $negotiationModel
        ->where('buyer_id', $userId)
        ->orWhere('seller_id', $userId)
        ->orderBy('created_at', 'DESC')
        ->findAll();

    $data['user'] = $user;
    $data['negotiations'] = $negotiations;

    return view('App\Modules\Profil\Views\v_index_profil', $data);
}

    public function transaksi()
    {
        return view('App\Modules\Profil\Views\transaksi');
    }

    public function kapalDibeli()
    {
        return view('App\Modules\Profil\Views\kapal_dibeli');
    }

    public function kapalDijual()
    {
        return view('App\Modules\Profil\Views\kapal_dijual');
    }
    public function jualKapal()
{
    return view('App\Modules\Profil\Views\kategori');
}

    public function formJual($kategori)
    {
        $data['kategori'] = $kategori;

        return view('app/Modules/Produk/Views/v_form_jual_produk.php', $data);
    }

   

    public function updateProfil()
    {
        $userModel = new AuthModel();

        $userId = session()->get('id');

        $userModel->update($userId, [
            'npwp'              => $this->request->getPost('npwp'),
            'no_bank'           => $this->request->getPost('no_bank'),
            'domisili_pelabuhan'=> $this->request->getPost('domisili_pelabuhan')
        ]);

        return redirect()->back()->with(
            'success',
            'Profil berhasil diperbarui.'
        );
    }
}