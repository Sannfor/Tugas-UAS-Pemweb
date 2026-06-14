<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --------------------------------------------------------------------
// 1. Rute Utama Publik (Landing Page)
// --------------------------------------------------------------------
// Semua pengunjung yang mengakses domain utama akan diarahkan ke Beranda
$routes->get('/', '\App\Modules\Beranda\Controllers\Beranda::index');

// --------------------------------------------------------------------
// 2. Rute Autentikasi (Login/Register/Lupa Password)
// --------------------------------------------------------------------
$routes->group('auth', ['namespace' => 'App\Modules\Auth\Controllers'], function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('attemptLogin', 'Auth::attemptLogin');
    $routes->get('register', 'Auth::register');
    $routes->post('attemptRegister', 'Auth::attemptRegister');
    $routes->get('logout', 'Auth::logout');
    
    // Rute tambahan yang ditarik dari GitHub
    $routes->get('forgot-password', 'Auth::forgotPassword');
    $routes->post('update-forgot-password', 'Auth::updateForgotPassword');
});

// --------------------------------------------------------------------
// 3. Rute Dashboard & Admin
// --------------------------------------------------------------------
// Dashboard Umum (Ditarik dari GitHub)
$routes->get('dashboard', '\App\Modules\Dashboard\Controllers\Dashboard::index');

// Dashboard Khusus Admin
$routes->group('admin', ['namespace' => 'App\Modules\Admin\Controllers'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');      
});

// --------------------------------------------------------------------
// 4. Rute Katalog & Transaksi (Manajemen, Detail Kapal, Penawaran)
// --------------------------------------------------------------------
// Rute untuk manajemen (Admin/Dashboard)
$routes->get('katalog/manajemen', '\App\Modules\Katalog\Controllers\Katalog::index');
$routes->get('katalog/hapus/(:num)', '\App\Modules\Katalog\Controllers\Katalog::hapus/$1');

// Rute untuk pembeli (Melihat detail dan menawar)
$routes->get('kapal/detail/(:num)', '\App\Modules\Katalog\Controllers\Katalog::detail/$1');
$routes->post('kapal/tawar', '\App\Modules\Katalog\Controllers\Katalog::kirim_tawaran');

// Optional temporary route (Ditarik dari GitHub)
$routes->get('home', 'App\Controllers\Home::index');