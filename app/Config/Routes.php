<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --------------------------------------------------------------------
// 1. RUTE UTAMA PUBLIK (LANDING PAGE)
// --------------------------------------------------------------------
$routes->get('/', '\App\Modules\Beranda\Controllers\Beranda::index');
$routes->get('beranda', '\App\Modules\Beranda\Controllers\Beranda::index');
$routes->get('home', 'App\Controllers\Home::index');

// --------------------------------------------------------------------
// 2. MODUL AUTENTIKASI (LOGIN / REGISTER / LUPA PASSWORD)
// --------------------------------------------------------------------
$routes->group('auth', ['namespace' => 'App\Modules\Auth\Controllers'], function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('attemptLogin', 'Auth::attemptLogin');
    $routes->get('register', 'Auth::register');
    $routes->post('attemptRegister', 'Auth::attemptRegister');
    $routes->get('logout', 'Auth::logout');
    
    $routes->get('forgot-password', 'Auth::forgotPassword');
    $routes->post('update-forgot-password', 'Auth::updateForgotPassword');
});

// --------------------------------------------------------------------
// 3. MODUL ADMIN DASHBOARD
// --------------------------------------------------------------------
$routes->group('admin', ['namespace' => 'App\Modules\Admin\Controllers'], function($routes) {
    $routes->get('/', 'Admin::index');

    // Kelola Pengguna
    $routes->get('pengguna', 'Admin::pengguna');
    $routes->get('pengguna/detail/(:num)', 'Admin::detailPengguna/$1');
    $routes->get('pengguna/hapus/(:num)', 'Admin::hapusPengguna/$1');

    // Kelola Supplier
    $routes->get('supplier', 'Admin::supplier');
    $routes->get('supplier/detail/(:num)', 'Admin::detailSupplier/$1');
    $routes->get('supplier/produk/(:num)', 'Admin::produkSupplier/$1');

    // Kelola Produk Kapal (CRUD)
    $routes->get('produk', 'Admin::produk');
    $routes->get('produk/tambah/(:any)', 'Admin::tambah_produk/$1');
    $routes->get('produk/edit/(:any)/(:num)', 'Admin::edit_produk/$1/$2');
    $routes->post('produk/simpan', 'Admin::simpan_produk');
    $routes->get('produk/hapus/(:any)/(:num)', 'Admin::hapus_produk/$1/$2');
    $routes->get('produk/detail/(:any)/(:num)', 'Admin::detail_produk/$1/$2');
});

// --------------------------------------------------------------------
// 4. MODUL PROFIL & USER
// --------------------------------------------------------------------
$routes->group('profil', ['namespace' => 'App\Modules\Profil\Controllers'], function($routes){
    $routes->get('/', 'Profil::index');
    $routes->post('update', 'Profil::updateProfil');
    
    // Rute opsional bawaan
    $routes->get('jual-kapal', 'Profil::jualKapal');
    $routes->get('jual-kapal/(:segment)', 'Profil::formJual/$1');
});

// --------------------------------------------------------------------
// 5. MODUL SUPPLIER (PENDAFTARAN DARI SISI USER)
// --------------------------------------------------------------------
$routes->group('supplier', ['namespace' => 'App\Modules\Supplier\Controllers'], function($routes){
    $routes->get('/', 'Supplier::index');
    $routes->get('daftar', 'Supplier::daftar');
    $routes->post('simpan_pendaftaran', 'Supplier::simpan_pendaftaran');
});

// --------------------------------------------------------------------
// 6. MODUL PRODUK & ANTARMUKA JUAL KAPAL
// --------------------------------------------------------------------
$routes->group('produk', ['namespace' => 'App\Modules\Produk\Controllers'], function($routes){
    $routes->get('form_jual', 'Produk::form_jual');
    $routes->get('form_jualparent/(:segment)', 'Produk::form_jual/$1');
    
    $routes->get('jual', 'Produk::form_jual');
    $routes->get('jual/(:segment)', 'Produk::form_jual/$1');
});

$routes->group('kapal', ['namespace' => 'App\Modules\Produk\Controllers'], function($routes){
    $routes->get('detail/(:any)', 'Produk::detail/$1');
    $routes->post('tawar', 'Produk::kirim_tawaran');
});

// --------------------------------------------------------------------
// 7. MODUL KATALOG & KATEGORI
// --------------------------------------------------------------------
$routes->group('katalog', ['namespace' => 'App\Modules\Katalog\Controllers'], function($routes){
    $routes->get('manajemen', 'Katalog::index');
    $routes->get('hapus/(:num)', 'Katalog::hapus/$1');
    $routes->post('simpan', 'Katalog::simpan');
});

$routes->group('kategori', ['namespace' => 'App\Modules\Kategori\Controllers'], function($routes){
    $routes->get('/', 'Kategori::index');
});

// --------------------------------------------------------------------
// 8. MODUL PENJUALAN (SISI SUPPLIER)
// --------------------------------------------------------------------
$routes->group('penjualan', ['namespace' => 'App\Modules\Penjualan\Controllers'], function($routes){
    $routes->get('/', 'Penjualan::index');
    $routes->post('simpan', 'Penjualan::simpan');
    $routes->get('(:segment)', 'Penjualan::index/$1');
});

// --------------------------------------------------------------------
// 9. MODUL DETAIL PENJUALAN (TRANSAKSI ADMIN)
// --------------------------------------------------------------------
$routes->group('detailpenjualan', ['namespace' => 'App\Modules\DetailPenjualan\Controllers'], function($routes){
    $routes->get('/', 'DetailPenjualan::index');
});

// --------------------------------------------------------------------
// 10. MODUL INFORMASI (BERITA, LAPORAN, KONTAK)
// --------------------------------------------------------------------
$routes->group('berita', ['namespace' => 'App\Modules\Berita\Controllers'], function($routes){
    $routes->get('/', 'Berita::index');
    $routes->get('(:segment)', 'Berita::detail/$1');
});

$routes->group('laporan', ['namespace' => 'App\Modules\Laporan\Controllers'], function($routes){
    $routes->get('/', 'Laporan::index');
    $routes->get('cetak', 'Laporan::cetak');
});

$routes->group('kontak', ['namespace' => 'App\Modules\Kontak\Controllers'], function($routes){
    $routes->post('kirim', 'Kontak::kirim');
});