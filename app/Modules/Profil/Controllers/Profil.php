<?php

namespace App\Modules\Profil\Controllers;

use App\Controllers\BaseController;
use App\Modules\Transaksi\Models\NegotiationModel;
use App\Modules\Auth\Models\AuthModel;
use App\Modules\Kategori\Models\KategoriModel;


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

    $kategoriModel = new KategoriModel();

    $data['kategori'] = $kategoriModel->findAll();

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

        $company = $this->request->getPost('company_name');
        $npwp = $this->request->getPost('npwp');
        $noBank = $this->request->getPost('no_bank');
        $domisili = $this->request->getPost('domisili_pelabuhan');

        $data = [
            'company_name'       => $company,
            'npwp'               => $npwp,
            'no_bank'            => $noBank,
            'domisili_pelabuhan' => $domisili
        ];

        // Upload Foto Profil
        $file = $this->request->getFile('profile_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {

            $newName = $file->getRandomName();

            $file->move(
                ROOTPATH . 'public/uploads/profile',
                $newName
            );

            $data['profile_image'] = $newName;
        }

        // Otomatis menjadi supplier
        if (
            !empty($company) &&
            !empty($npwp) &&
            !empty($noBank) &&
            !empty($domisili)
        ) {
            $data['role'] = 'supplier';

            session()->set('role', 'supplier');
        }

        $userModel->update($userId, $data);

        return redirect()->back()->with(
            'success',
            'Profil berhasil diperbarui.'
        );
    }

    
}