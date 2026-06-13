<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/auth/login');
        }

        $data['title'] = 'Dashboard - Marketplace Kapal';
        return view('App\Modules\Admin\Views\dashboard', $data);
    }
}