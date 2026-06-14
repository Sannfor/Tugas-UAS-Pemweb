<?php

namespace App\Modules\Dashboard\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth/login');
        }

        $role = session()->get('role');
        $data['title'] = 'Dashboard - Marketplace Kapal';
        $data['role'] = $role;
        $data['nama'] = session()->get('nama');

        return view('App\Modules\Dashboard\Views\dashboard', $data);
    }
}