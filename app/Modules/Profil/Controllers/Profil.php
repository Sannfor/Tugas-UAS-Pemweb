<?php

namespace App\Modules\Profil\Controllers;

use App\Controllers\BaseController;
use App\Modules\Transaksi\Models\NegotiationModel;


class Profil extends BaseController
{
   public function index()
{
    $session = session();

    $negotiationModel = new NegotiationModel();

    $userId = $session->get('id');

    $negotiations = $negotiationModel
        ->where('buyer_id', $userId)
        ->orWhere('seller_id', $userId)
        ->orderBy('created_at', 'DESC')
        ->findAll();

    $data['user'] = [
        'nama'  => $session->get('nama'),
        'email' => $session->get('email'),
        'role'  => $session->get('role'),
        'nik'   => $session->get('nik')
    ];

    $data['negotiations'] = $negotiations;

    return view('App\Modules\Profil\Views\index', $data);
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
}