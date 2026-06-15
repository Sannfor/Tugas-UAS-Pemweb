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

// UBAH MENJADI SEPERTI INI:
$routes->get('kapal/detail/(:num)', '\App\Modules\Produk\Controllers\Produk::detail/$1');
$routes->post('kapal/tawar', '\App\Modules\Produk\Controllers\Produk::kirim_tawaran');

// Tambahkan juga rute untuk halaman Admin/Kategori/Supplier jika diperlukan:
$routes->get('kategori', '\App\Modules\Kategori\Controllers\Kategori::index');
$routes->get('supplier', '\App\Modules\Supplier\Controllers\Supplier::index');

$routes->get('profil', '\App\Modules\Profil\Controllers\Profil::index');
$routes->get('beranda', '\App\Modules\Beranda\Controllers\Beranda::index');

$routes->get(
    'produk/jual',
    '\App\Modules\Produk\Controllers\Produk::form_jual'
);

$routes->get(
    'produk/jual/(:segment)',
    '\App\Modules\Produk\Controllers\Produk::form_jual/$1'
);

$routes->get(
    'kategori',
    '\App\Modules\Kategori\Controllers\Kategori::index'
);

$routes->post('katalog/simpan', 'Katalog::simpan');
$routes->group('profil', ['namespace' => 'App\Modules\Profil\Controllers'], function($routes){

    $routes->get('/', 'Profil::index');

    $routes->get('jual-kapal', 'Profil::jualKapal');
    $routes->get('jual-kapal/(:segment)', 'Profil::formJual/$1');

    $routes->post('update', 'Profil::updateProfil');

});

// Optional temporary route (Ditarik dari GitHub)
$routes->get('home', 'App\Controllers\Home::index');


// Route khusus untuk menangani form kontak dari Module Kontak
$routes->post('kontak/kirim', '\Modules\Kontak\Controllers\Kontak::kirim');