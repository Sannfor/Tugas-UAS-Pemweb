<?php

namespace App\Modules\Profil\Controllers;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    public function index()
    {
        $session = session();

        $data['user'] = [
            'nama'  => $session->get('nama'),
            'email' => $session->get('email'),
            'role'  => $session->get('role'),
            'nik'   => $session->get('nik')
        ];

        return view('App\Modules\Profil\Views\index', $data);
    }
}